<?php

namespace Modules\Diary;

use Carbon\Carbon;

class DiaryWriter
{
    protected $diary;

    protected $page;

    public function __construct(Diary $diary)
    {
        $this->diary = $diary;

        return $this;
    }

    public function newPage()
    {
        $page = new DiaryPage();
        $page->date = Carbon::today()->toDateString();
        $this->diary->pages()->save($page);
        $this->page = $page;

        return new PageManager($page);
    }

    public function storeData($data)
    {
        $this->diary->data = $data;
        $this->diary->save();

        return $this;
    }

    public function data()
    {
        return $this->diary;
    }

    public function getPage()
    {
        return $this->page;
    }
}