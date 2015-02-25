<?php namespace App\Models;
use DB;
use Validator;
class review_validate {
    public static function validate($input)
    {
        $validation = Validator::make($input, [ //expects an associative array of all your data
            'review_title'=>'required',
            'rating'=> 'required|numeric',
            'review'=> 'required|between:20,1000'
        ]);
        return $validation;
    }
    public static function create($data)
    {
        return DB::table('reviews')->insert($data);
    }
}