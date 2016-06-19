<?php
namespace AppBundle\Filters;


class GithubFilter
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function filterResults($responseDecoded)
    {
        if (!empty($this->request->get("language"))) {

            $filter = new MultiDimensionalArrayFilter($responseDecoded);

            $responseDecoded = $filter->filter("language", $this->request->get("language"));

        }

        return $responseDecoded;
    }
}