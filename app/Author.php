<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'surname', 'patronymic', 'birth_country'];
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "$this->surname $this->first_name $this->patronymic";
    }
}
