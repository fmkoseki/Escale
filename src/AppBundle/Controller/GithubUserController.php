<?php

namespace AppBundle\Controller;

use AppBundle\Filters\GithubFilter;
use AppBundle\Filters\MultiDimensionalArrayFilter;
use AppBundle\Sorters\GitHubSorter;
use AppBundle\Sorters\MultiDimensionalArraySorter;
use Guzzle\Http\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\ClientHTTP\GithubClient;
use AppBundle\Validation\GithubUserValidation;

/**
 * @Route("/api/v1")
 */
class GithubUserController extends Controller
{
    /**
     * @Route("/starred")
     */
    public function indexAction(Request $request)
    {

        try {

            $requestValidation = new GithubUserValidation($request);

            $requestValidation->isValid();

        } catch (\InvalidArgumentException $e) {

            $response = [
                "message" => $e->getMessage()
            ];

            return new Response(json_encode($response, 400));

        }

        $githubGuzzleClient = new GithubClient("/users/devdrops/starred");

        $response = $githubGuzzleClient->get();

        $responseDecoded = json_decode($response, true);

        $githubFilter = new GithubFilter($request);
        $githubSorter = new GitHubSorter($request);

        $responseDecoded = $githubFilter->filterResults($responseDecoded);

        $responseDecoded = $githubSorter->sortResults($responseDecoded);

        return new Response(json_encode($responseDecoded), 200);

    }

}
