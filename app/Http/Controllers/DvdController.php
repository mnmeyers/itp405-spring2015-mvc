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
use Cache;
use App\Services\RottenTomatoes;

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
        $dvd = $dvdDetails[0];
        $tomatoTruth = RottenTomatoes::search(str_replace(' ','+', $dvd->title));
//        if($tomatoTruth){
//            return view('reviews',[
//                'dvd'=> $dvd,
//                'dvdReviews'=> $dvdReviews,
//                'tomato' => $tomatoTruth]);
//        }else {
//            return view('reviews',[
//                'dvd'=> $dvd,
//                'dvdReviews'=> $dvdReviews]);
//        }
        return view('reviews',[
                'dvd'=> $dvd,
                'dvdReviews'=> $dvdReviews,
                'tomato' => $tomatoTruth]);
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
//        return view('rottenT', [
//            'rottentomatoes' => RottenTomatoes::search($title)
//        ]);
//    }
}