<?php namespace App\Http\Controllers;
use App\Models\SongQuery;
use Illuminate\Http\Request;
use DB;//class laravel provides that's in the global namespace. not in app\http\whatever.

//default namespace is App
//uses same psr-4 stuff as before
//controllers and views folders are where you will be working most
class SongControllers extends Controller {
    //create a method to render a view
    public function search()
    {
        //need to render an html view. both 'search'es don't need to bethe same name
        return view('search');
    }
    public function results(Request $request)//type hinting
    {
        if (!$request->input('song_title')){
            return redirect('/songs/search');
        }
        $query = new SongQuery();
        $songs = $query->search($request->input('song_title'));
        //query builder. the framework uses pdo

//        dd($songs);
        //dd($songs); //dump and die. laravel function
        //var_dump($request->input('song_title'));
        return view('results', [
            'song_title'=> $request->input('song_title'),
            'songs' => $songs
        ]);//second argument passes information...? array.. instead of $_[GET]
    }
}