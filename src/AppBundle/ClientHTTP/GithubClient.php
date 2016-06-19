<?php
namespace AppBundle\ClientHTTP;

use Guzzle\Http\Client;

class GithubClient
{
    const GITHUB_API_URL = "https://api.github.com";
    
    private $githubAPIResource;
    private $guzzleClient;

    public function __construct($resource)
    {
        $this->guzzleClient = new Client(GithubClient::GITHUB_API_URL);
        $this->githubAPIResource = $resource;
    }

    public function get()
    {
        $request = $this->guzzleClient->get($this->githubAPIResource);

        $response = $request->send();

        return $response->getBody(true);
    }
}