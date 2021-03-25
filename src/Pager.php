<?php

namespace ApplicantTask;

/**
 * Calculate the number of pages
 */
class Pager
{
    private $totalRecords;
    private $perPage;
    private $linkTemplate;

    public function __construct($totalRecords, $perPage, $linkTemplate)
    {
        $this->totalRecords = $totalRecords;
        $this->perPage = $perPage;
        $this->linkTemplate = $linkTemplate;
    }

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
