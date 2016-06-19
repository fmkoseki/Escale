<?php
namespace AppBundle\Sorters;


class GitHubSorter
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function sortResults($responseDecoded)
    {
        if (!empty($this->request->get("name"))) {

            if ($this->request->get("name") == "alphabetical") {

                $arraySorter = new MultiDimensionalArraySorter($responseDecoded);

                $responseDecoded = $arraySorter->sort("name", SORT_ASC);

            }

        }

        if (!empty($this->request->get("stars"))) {

            if ($this->request->get("stars") == "desc") {

                $arraySorter = new MultiDimensionalArraySorter($responseDecoded);

                $responseDecoded = $arraySorter->sort("stargazers_count", SORT_DESC);

            }

            if ($this->request->get("stars") == "asc") {

                $arraySorter = new MultiDimensionalArraySorter($responseDecoded);

                $responseDecoded = $arraySorter->sort("stargazers_count", SORT_ASC);

            }

        }

        if (!empty($this->request->get("openIssues"))) {

            if ($this->request->get("openIssues") == "desc") {

                $arraySorter = new MultiDimensionalArraySorter($responseDecoded);

                $responseDecoded = $arraySorter->sort("open_issues", SORT_DESC);

            }

            if ($this->request->get("openIssues") == "asc") {

                $arraySorter = new MultiDimensionalArraySorter($responseDecoded);

                $responseDecoded = $arraySorter->sort("open_issues", SORT_ASC);

            }

        }

        return $responseDecoded;
    }
    
}