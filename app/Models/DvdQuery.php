<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/16/15
 * Time: 9:21 PM
 */
namespace App\Models;
use DB;

class DvdQuery {
    public function search($term, $genre, $rating)
    {
        $query = DB::table('dvds')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id');

            //conditional logic that only applies genre and rating conditions if the fields are not 'ALL'

        if($term) {
            $query->where('title', 'LIKE','%'. $term .'%');
        }
        if($genre != 'All'){
            $query->where('genre_name', $genre);
        }
        if($rating != 'All'){
            $query->where('rating_name', $rating);
        }
            $query->orderBy('title', 'asc');

        return $query->get();
    }

    public function searchGenre()
    {
        $query = DB::table('genres')
            ->orderBy('genre_name')
            ->get();
        return $query;
    }

    public function searchRating()
    {
        $query = DB::table('ratings')
            ->orderBy('rating_name')
            ->get();
        return $query;
    }

}

