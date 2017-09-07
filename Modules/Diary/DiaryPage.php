<?php

namespace Modules\Diary;

use Illuminate\Database\Eloquent\Model;

class DiaryPage extends Model
{
    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function notes()
    {
        return $this->hasMany(DiaryPageNote::class);
    }
}
