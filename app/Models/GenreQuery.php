<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/17/15
 * Time: 1:18 PM
 */

namespace App\Models;
use DB;

class GenreQuery {
    public function search()
    {
        $query = DB::table('genres')
            ->select('genre_name')
            ->orderBy('genre_name', 'asc')
            ->get();
        return $query;
    }
}
//is this page even necessary?