<?php
/**
 * 3/3 homework
 */
namespace App\Http\Controllers;
use App\Models\Dvd;
use App\Models\Label;
use App\Models\Genre;
use App\Models\Sound;
use App\Models\Format;
use App\Models\Rating;
//use App\Models\Dvd_validate;
use Illuminate\Http\Request;
use DB;
class DvdControllers extends Controller {
    public function createDvd() {
        $dvds = Dvd::all();
        $labels = Label::all();
        $sounds = Sound::all();
        $genres = Genre::all();
        $ratings = Rating::all();
        $formats = Format::all();
        return view('dvd_add',[
            'dvds'=> $dvds,
            'labels'=>$labels,
            'sounds'=>$sounds,
            'genres'=>$genres,
            'ratings'=>$ratings,
            'formats'=>$formats
        ]);
    }
    public function storeDvd(Request $request)
    {
        $dvd = new Dvd();
        $dvd->title = $request->input('dvd_title');
        $dvd->label_id = $request->input('label');
        $dvd->rating_id = $request->input('rating');
        $dvd->format_id = $request->input('format');
        $dvd->sound_id = $request->input('sound');
        $dvd->genre_id = $request->input('genre');
        $dvd->save();
        return redirect()->back()->with('success', 'Dvd successfully saved!');
    }
    //for future michal: everything below didn't work
    //return $dvd;
    //return DB::table('dvds')->insert($data);
//        $validation = Dvd_validate::validate($request->all());
//
//        if ($validation->passes()) {
//            //insert record into db
//            Dvd_validate::create([
//                'title' => $request->input('dvd_title'),
//                'rating_id' => $request->input('rating'),
//                'label_id' => $request->input('label'),
//                'genre_id' => $request->input('genre'),
//                'format_id' => $request->input('format'),
//                'sound_id' => $request->input('sound')
//            ]);
//            //redirect back to /dvds/. if this doesn't work, try just /dvds
//            return redirect('/dvds')->with('success', 'Dvd successfully saved!');//add html/css green to this
//        } else {
//            //redirect to /dvds/ with error messages and old input
//            return redirect('/dvds/create')
//                ->withInput()
//                ->withErrors($validation); //this is flash messaging...
//        }
    public function displayGenres($name){
        //needs to eagerly load rating, genre, and label
        $dvds = Dvd::with('genre')
            ->whereHas('genre', function($query) use ($name){
                $query->where('genre_name', '=', $name);
            })
            ->get();
        return view('display_genres',[
            'dvds'=> $dvds,
            'genre_name' => $name
        ]);
    }
}