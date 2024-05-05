<?php

namespace App\Http\Controllers;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('logged_in');
        $this->authorizeResource(Owner::class, 'owner');
    }
    public function create(){
        return view("owners.create");
    }

    public function store(OwnerRequest $request) {
        $owner = new Owner();
        $this->authorize('create', $owner);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('owner.index');
    }

    public function index(){
        //$this->authorize('viewAny');
        return view('owners.index', [
            'owners' => Owner::with('cars')->get()
        ]);
    }

    public function edit(Owner $owner){
        //$owner = Owner::find($id);
        $this->authorize('update', $owner);
        return view('owners.edit', [
            'owner' => $owner
        ]);
    }

    public function save(Owner $owner, OwnerRequest $request){
        //$owner = Owner::find($id);

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
