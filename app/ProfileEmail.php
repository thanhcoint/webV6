<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileEmail extends Model
{
    //
    protected $table = "profile_mail";
    public function email()
    {
        $this->hasMany('App\Email','id_pm','id');
    }
}
