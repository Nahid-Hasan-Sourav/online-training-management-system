<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$directory,$extension,$imageUrl,$imageName;

    private static function getImageUrl($request){
        self::$image            =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName        =time().'.'.self::$extension;
        self::$directory        ='category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         =self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function addNewCategory($request){
        self::$category = new Category();
        self::$category->category_title    = $request->category_title;
        self::$category->image    = self::getImageUrl($request);

        self::$category->save();

    }
}
