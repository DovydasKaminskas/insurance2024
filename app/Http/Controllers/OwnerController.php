<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function create(){
        return view("create");
    }

    public function store(Request $request) {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('index');
    }

    public function index(){
        return view('index', [

            'owners' => Owner::all()

        ]);
    }

    public function edit($id){
        $owner = Owner::find($id);
        return view('edit', [

            'owner' => $owner

        ]);
    }

    public function save($id, Request $request){
        $owner = Owner::find($id);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('index');
    }

    public function delete($id){
        Owner::destroy($id);
        return redirect()->route('index');
    }
}
