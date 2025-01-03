<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model 
{
    use HasTranslations;

    protected $table = 'grades';
    public $timestamps = true;
    protected $fillable=['name','notes'];

    public $translatable = ['name'];


    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }
}