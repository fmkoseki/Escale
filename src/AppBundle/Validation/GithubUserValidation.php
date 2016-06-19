<?php
namespace AppBundle\Validation;

class GithubUserValidation
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function isValid()
    {

        if (!empty($this->request->get("name"))) {

            if ($this->request->get("name") != "alphabetical") {

                throw new \InvalidArgumentException("Not a valid sort type for name.");

            }

        }

        if (!empty($this->request->get("stars"))) {

            if ($this->request->get("stars") != "desc" && $this->request->get("stars") != "asc") {

                throw new \InvalidArgumentException("Not a valid sort type for stars.");

            }

        }

        if (!empty($this->request->get("openIssues"))) {

            if ($this->request->get("openIssues") != "desc" && $this->request->get("openIssues") != "asc") {

                throw new \InvalidArgumentException("Not a valid sort type for openIssues.");

            }

        }

    }

}