<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/dvds/search', 'DvdController@search');
////the below route may cause a conflict
Route::get('/dvds', 'DvdController@results');
//you can use the same url multiple times as long as it's different verbs

//why do these two conflict with the next two??
Route::get('/dvds/{id}', 'DvdController@reviews');
Route::post('/dvds/submit', 'DvdController@storeReview');

//start mar 3 hw
//Route::get('/dvds/create' , 'DvdControllers@createDvd');
//Route::post('/dvds', 'DvdControllers@storeDvd');

Route::get('/genres/{name}/dvds', 'DvdControllers@displayGenres');

//apis: update with rotten tomatoes api
//Route::get('/dvds/{id}/{tag?}', 'DvdController@displayRottenTomatoes');

//when I try to bring this into the controller, it says that the cache class cannot be found.
// even when I try to put use App\Http\Controllers\Cache; in the controller, it still gives that error.
//also is there a way to even use the same URI/URL as the dvd details page (line 21 above) and still display the Rotten Tomatoes API stuff?
// Or do you just want us to display that same dvd details information but on this page (in addition to the RT API stuff)?
// Or when you say DVD Details page, do you mean (line 17 above) dvd results page?
Route::get("/rottentomatoes/{dvd?}", function($title = 'Harry+Potter'){

    if(Cache::has("{dvd}-$title")){
        $json_string = Cache::get("{dvd}-$title");
        //echo('cached!');
    }
    else {

        $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=7ns39f9m6jenae7bkmvzpgtb&q=$title";
        //the ? makes it optional in laravel
        $session = curl_init($url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $json_string = curl_exec($session);
        curl_close($session);
        //$json_string = file_get_contents($url);//will read it out as a string and then you have access to it. let's convert to json
        //need to convert it into arrays and objects.
        Cache::put("{dvd}-$title", $json_string, 60);//3rd argument is minutes
        //echo('Not cached!');
    }

    $rottentomatoesData = json_decode($json_string);
    //curl is another library for http requests from php. post, put and delete.
//var_dump($rottentomatoesData);




    return view('rottenT', [
        'rottentomatoes' =>  $rottentomatoesData->movies
    ]);
});

//search for the dvd title == api's title