<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 3/24/15
 * Time: 10:03 AM
 */

namespace App\Services;
use Cache;


class RottenTomatoes {

    public static function search($title)
    {

        if (Cache::has("$title")) {
            $json_string = Cache::get("$title");
            //echo('cached!');
        } else {

            $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=7ns39f9m6jenae7bkmvzpgtb&q=$title";
            //the ? makes it optional in laravel
            $session = curl_init($url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
            $json_string = curl_exec($session);
            curl_close($session);
            //$json_string = file_get_contents($url);//will read it out as a string and then you have access to it. let's convert to json
            //need to convert it into arrays and objects.
            Cache::put("$title", $json_string, 60);//3rd argument is minutes
            //echo('Not cached!');
        }

        $rottentomatoesData = json_decode($json_string);
        //curl is another library for http requests from php. post, put and delete.
        //var_dump($rottentomatoesData);
        //dd($rottentomatoesData->movies);
        $tomatoes = $rottentomatoesData->movies;
        foreach ($tomatoes as $tomato) {

            return $tomato;
        }
    }
}