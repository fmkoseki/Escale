<?php
namespace AppBundle\Sorters;

class MultiDimensionalArraySorter
{
    private $multiDimensionalArray;

    public function __construct(array $multiDimensionalArray)
    {
        $this->multiDimensionalArray = $multiDimensionalArray;
    }

    public function sort($indexName, $sortType = SORT_ASC) {

        $indexToBeSorted = [];

        foreach ($this->multiDimensionalArray as $key => $row) {
            $indexToBeSorted[$key] = $row[$indexName];
        }

        array_multisort($indexToBeSorted, $sortType, SORT_NATURAL | SORT_FLAG_CASE , $this->multiDimensionalArray);

        return $this->multiDimensionalArray;

    }
}