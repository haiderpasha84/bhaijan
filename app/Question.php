<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','body'];

    public function user(){
        return $this->belongsTo(User::class);

    }



          
    public function str_slug($value = '-', $language = 'en')
        {
            return Str::slug( $value, $language);
        }
    

    public function setTitleAttribute($value){
        $this->attributes['title']= $value;
        $this->attributes['slug']= str_slug($value);
    }

    public function getUrlAttribute(){
        return route("questions.show", $this->id);
    }

}
