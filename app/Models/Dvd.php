<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 3/2/15
 * Time: 10:40 PM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Dvd extends Model{
    public function label(){
        //song belongs to an artist
        return $this->belongsTo('App\Models\Label');
    }
    public function sound(){
        //song belongs to an artist
        return $this->belongsTo('App\Models\Sound');
    }
    public function genre(){
        //song belongs to an artist
        return $this->belongsTo('App\Models\Genre');
    }
    public function format(){
        //song belongs to an artist
        return $this->belongsTo('App\Models\Format');
    }
    public function rating(){
        //song belongs to an artist
        return $this->belongsTo('App\Models\Rating');
    }
}