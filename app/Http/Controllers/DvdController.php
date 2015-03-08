<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/16/15
 * Time: 9:17 PM
 */
namespace App\Http\Controllers;
//use App\Models\Song;
//use App\Models\Artist;
use App\Models\DvdQuery;
use App\Models\review_validate;
use Illuminate\Http\Request;
use DB;

class DvdController extends Controller {
    public function search()
    {
        $dvdQuery = new DvdQuery();
        $genres = $dvdQuery->searchGenre();
        $ratings = $dvdQuery->searchRating();
        return view('dvd_search',[
            'genres'=> $genres,
            'ratings'=>$ratings
        ]);
    }
    public function results(Request $request)
    {
        $query = new DvdQuery();
        $dvds = $query->search($request->input('title'), $request->input('genre'), $request->input('rating'));
        $genres = $query->searchGenre();
        if (!$request->input('title')){
            $dvds = (new DvdQuery())->search('', 'All', 'All');
            return view('dvd_results', [
                'title'=>'',
                'genres'=> $genres,
                'dvds'=> $dvds
            ]);
        }
        return view('dvd_results', [
            'title'=>$request->input('title'),
            'genres'=> $genres,
            'dvds'=> $dvds
        ]);
    }
    public function reviews($id){
        $query = new DvdQuery();
        $dvdDetails = $query->dvdDetails($id);
        $dvdReviews = $query->dvdReviews($id);
        return view('reviews',[
            'dvdDetails'=> $dvdDetails,
            'dvdReviews'=> $dvdReviews]);
    }
    public function storeReview(Request $request)
    {
        $validation = review_validate::validate($request->all());
        if ($validation->passes()) {
            //insert record into db
            review_validate::create([
                'title' => $request->input('review_title'),
                'rating' => $request->input('rating'),
                'dvd_id' => $request->input('dvd_id'),
                'description' => $request->input('review')
            ]);
            //redirect back to /dvds/
            return redirect('/dvds/'.$request->input('dvd_id'))->with('success', 'Review successfully saved!');
        } else {
            //redirect to /dvds/ with error messages and old input
            return redirect('/dvds/'.$request->input('dvd_id'))
                ->withInput()
                ->withErrors($validation); //this is flash messaging...
        }
    }

//    public function displayTomatoes($title = 'Harry+Potter')
//    {
//
//        if (Cache::has("{dvd}-$title")) {
//            $json_string = Cache::get("{dvd}-$title");
//            //echo('cached!');
//        } else {
//
//            $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=7ns39f9m6jenae7bkmvzpgtb&q=$title";
//            //the ? makes it optional in laravel
//            $session = curl_init($url);
//            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
//            $json_string = curl_exec($session);
//            curl_close($session);
//            //$json_string = file_get_contents($url);//will read it out as a string and then you have access to it. let's convert to json
//            //need to convert it into arrays and objects.
//            Cache::put("{dvd}-$title", $json_string, 60);//3rd argument is minutes
//            //echo('Not cached!');
//        }
//
//        $rottentomatoesData = json_decode($json_string);
//        //curl is another library for http requests from php. post, put and delete.
//    //var_dump($rottentomatoesData);
//        return view('rottenT', [
//            'rottentomatoes' => $rottentomatoesData->movies
//        ]);
//    }
}