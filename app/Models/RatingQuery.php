<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/17/15
 * Time: 1:19 PM
 */

namespace App\Models;
use DB;

class RatingQuery {
    public function search()
    {
        $query = DB::table('ratings')
            ->select('rating_name')
            ->orderBy('rating_name', 'asc')
            ->get();
            return $query;


    }
}
