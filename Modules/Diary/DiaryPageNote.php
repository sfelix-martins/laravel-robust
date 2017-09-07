<?php

namespace Modules\Diary;

use Illuminate\Database\Eloquent\Model;

class DiaryPageNote extends Model
{
    public function page()
    {
        return $this->belongsTo(DiaryPage::class);
    }

    public function noteable()
    {
        return $this->morphTo();
    }
}
