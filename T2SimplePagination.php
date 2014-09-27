<?php

class T2SimplePagination
{
    public $total;
    public $page = 1;
    public $per_page = 10;
    public $num_page = 0;
    public $offset = 0;

    public function __construct($page, $per_page, $total) 
    {
        $this->setPage($page);
        $this->setPerPage($per_page);
        $this->setTotal($total);
        $this->calculate();
    }

    public function setPage($page)
    {
        // page is +int
        if ($page > 0) {
            $this->page = (int) $page;
        }
    }

    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function calculate()
    {
        if ($this->total > $this->per_page) {
            $this->num_page = ceil($this->total / $this->per_page);
        }

        $this->offset = $this->per_page * ($this->page - 1);
    }
}


