<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/10/15
 * Time: 7:32 PM
 */


namespace App\Models;
use DB;


class SongQuery {

    public function search($term)
    {
//        if ($term){
//            $query->where('title', 'LIKE', '%' . $term . '%')
//        }
        $query = DB::table('songs')
            ->join('artists', 'artists.id', '=', 'songs.artist_id')
            ->join('genres', 'genres.id', '=', 'songs.genre_id')//method chaining.
            ->where('title', 'LIKE', '%' . $term . '%')
            ->orderBy('artist_name', 'asc')
            ->get();//called a termination method
        return $query;
    }
}