<?php

namespace Modules\Diary;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

    public function pages()
    {
        return $this->hasMany(DiaryPage::class);
    }
}
