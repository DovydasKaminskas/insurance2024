<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarControllerAPI extends Controller
{

    public function __construct()
    {

    }

    public function cars(){
        return Car::all();
    }

    public function car($id){
        $car= Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        return $car;
    }

    public function store(CarRequest $request){
        $car= new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        //$car->image_file->request->image_file;
        //$car->image_name->request->image_name;
        $car->user_id=$request->user_id;
        $car->save();
        return $car;
    }

    public function update(CarRequest $request,$id){
        $car=Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->user_id=$request->user_id;
        //$car->update($request->all());
        if($request->image_file !== null) {
            $file = $request->image_file;
            $car->image_file = $car->image_file . ' ' . hash('sha256', $file);
            $car->image_name = $car->image_name . ' ' . $file;
        }
        /*if ($request->file('image')!==null){
            $file=$request->file('image');
            $file->store('images', 'public');
            $car->image_file = $car->image_file . ' ' . $file->hashName();
            $car->image_name = $car->image_name . ' ' . $file->getClientOriginalName();
        }*/

        $car->save();
        return $car;
    }

    public function destroy($id){

        $car=Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->delete();
        return $car;
    }

}
