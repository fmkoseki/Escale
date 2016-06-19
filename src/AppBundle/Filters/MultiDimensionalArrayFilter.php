<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 6/18/16
 * Time: 9:43 PM
 */

namespace AppBundle\Filters;


class MultiDimensionalArrayFilter
{
    private $multiDimensionalArray;

    public function __construct(array $multiDimensionalArray)
    {
        $this->multiDimensionalArray = $multiDimensionalArray;
    }

    public function filter($keyName, $keyValue) {

        foreach ($this->multiDimensionalArray as $key => $value) {

            if ($value[$keyName] != $keyValue) {

                unset($this->multiDimensionalArray[$key]);

            }

        }

        return $this->multiDimensionalArray;

    }
}