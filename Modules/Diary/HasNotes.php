<?php

namespace Modules\Diary;

trait HasNotes
{
    public function notes()
    {
        return $this->morphMany(DiaryPageNote::class, 'noteable');
    }
}