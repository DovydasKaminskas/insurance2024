<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;

class OwnerControllerAPI extends Controller
{

    public function __construct()
    {

    }

    public function owners(){
        return Owner::all();
    }

    public function owner($id){
        $owner= Owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        return $owner;
    }

    public function store(OwnerRequest $request){
        $owner= new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return $owner;
    }

    public function update(OwnerRequest $request, $id){
        $owner=Owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return $owner;
    }

    public function destroy($id){

        $owner=Owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->delete();
        return $owner;
    }

}
