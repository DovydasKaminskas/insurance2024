<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function create(){
        return view("owners.create");
    }

    public function store(Request $request) {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('owner.index');
    }

    public function index(){
        return view('owners.index', [
            'owners' => Owner::with('cars')->get()
        ]);
    }

    public function edit($id){
        $owner = Owner::find($id);
        return view('owners.edit', [

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
        return redirect()->route('owner.index');
    }

    public function delete($id){
        Owner::destroy($id);
        return redirect()->route('owner.index');
    }
}
