<?php

namespace ApplicantTask;

class Pager
{
    private $totalRecords;
    private $perPage;
    private $linkTemplate;

    /**
     * @param $linkTemplate e.g. '/category/page/'
     */
    public function __construct(int $totalRecords, int $perPage, string $linkTemplate)
    {
        $this->totalRecords = $totalRecords;
        $this->perPage = $perPage;
        $this->linkTemplate = $linkTemplate;
    }

    /**
     * Calculate the total number of pages
     */
    public function getTotalPages()
    {
        return ceil($this->totalRecords / $this->perPage);
    }

    public function getLinkForPage($page)
    {
        return $this->linkTemplate . $page;
    }

    public function getPages()
    {
        $result = [];
        for ($i = 1; $i <= $this->getTotalPages(); $i++) {
            $result[$i] = $this->getLinkForPage($i);
        }

        return $result;
    }
}
