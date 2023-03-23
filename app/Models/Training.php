<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Training extends Model
{
    use HasFactory;

    private static $training,$image,$directory,$extension,$imageUrl,$imageName;

    private static function getImageUrl($request){
        self::$image            =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName        =time().'.'.self::$extension;
        self::$directory        ='teacher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         =self::$directory.self::$imageName;

        return self::$imageUrl;
    }



    public static function newTraining($request){
        self::$training = new Training();

        self::$training->category_id    = $request->category_id ;
        self::$training->teacher_id    = Session::get('teacher_id') ;
        self::$training->title    = $request->title;
        self::$training->description    = $request->description;
        self::$training->starting_date    = $request->starting_date;
        self::$training->price    = $request->price;
        self::$training->image    = self::getImageUrl($request);

        self::$training->save();

    }

    public static function updateTraining($request,$id){
        self::$teacher = Teacher::find($id);
        if($request->file('image')){
            if(file_exists(self::$teacher->image)){
                unlink(self::$teacher->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$teacher->image;
        }

        self::$teacher->category_id    = $request->category_id ;
        self::$teacher->teacher_id    = Session::get(teacher_id) ;
        self::$teacher->title    = $request->title;
        self::$teacher->description    = $request->description;
//        self::$teacher->password    =bcrypt($request->password);
        self::$teacher->starting_date    = $request->starting_date;
        self::$teacher->price    = $request->price;
        self::$teacher->image    = self::$imageUrl;

        self::$teacher->save();

    }

    public static function  deleteTraining($id){
        self::$training = Training::find($id);
        if(file_exists(self::$training->image)){
            unlink(self::$training->image);
        }
        self::$teacher->delete();

    }

}
