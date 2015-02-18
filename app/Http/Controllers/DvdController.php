<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 2/16/15
 * Time: 9:17 PM
 */
namespace App\Http\Controllers;
use App\Models\DvdQuery;
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
        //dd($dvds);
        if (!$request->input('title')){
            $dvds = (new DvdQuery())->search('', 'All', 'All');
            return view('dvd_results', [
                'title'=>'',
                'dvds'=> $dvds
            ]);
        }
        return view('dvd_results', [
               'title'=>$request->input('title'),
                'dvds'=> $dvds
            ]);

    }
}