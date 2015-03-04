<?php
/**
 * Created by PhpStorm.
 * User: mmeyers
 * Date: 3/3/15
 * Time: 11:22 AM
 */

namespace App\Models;
use DB;
use Validator;

class Dvd_validate {
    public static function validate($input)
    {
        $validation = Validator::make($input, [ //expects an associative array of all your data
            'dvd_title'=>'required',
            'rating'=> 'required',
            'label'=> 'required',
            'sound'=> 'required',
            'format'=> 'required',
            'genre'=> 'required'
        ]);
        return $validation;
    }
    public static function create($data)
    {
        return DB::table('dvds')->insert($data);
    }
}