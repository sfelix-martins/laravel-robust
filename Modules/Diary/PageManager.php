<?php

namespace Modules\Diary;

class PageManager
{
    protected $note;

    protected $page;

    public function __construct(DiaryPage $page)
    {
        $this->page = $page;
    }

    public function writeNote($subject, $data = null)
    {
        $note = new DiaryPageNote;
        $note->noteable()->associate($subject);
        $note->data = $data;
        $this->page->notes()->save($note);
        $this->note = $note;

        return $this->note;
    }

    public function data()
    {
        return $this->page;
    }

    public function note()
    {
        return $this->note;
    }
}