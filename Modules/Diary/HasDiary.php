<?php

namespace Modules\Diary;

trait HasDiary
{
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }

    public function createDiary($data = null)
    {
        $diary = new Diary;
        $diary->data = $data;
        
        $this->diaries()->save($diary);

        return new DiaryWriter($diary);
    }
}