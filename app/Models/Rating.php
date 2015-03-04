<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 3/2/15
 * Time: 11:40 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Rating extends Model{
    public function dvds(){
        return $this->hasMany('App\Models\Dvd');
    }
}