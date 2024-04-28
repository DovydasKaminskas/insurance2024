<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('logged_in');
    }
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::with('owner')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create', [
            'owners'=>Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car=Car::create($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', [
            'car'=>$car,
            'owners' => $owners
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->all());
        if ($request->file('image')!==null){
            $file=$request->file('image');
            $file->store('images', 'public');
            $car->image_file = $car->image_file . ' ' . $file->hashName();
            $car->image_name = $car->image_name . ' ' . $file->getClientOriginalName();
        }
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
    public function image($id) {
        $car = Car::find($id);
        //dd($car->image_file);
        $images = explode(' ', $car->image_file);
        $paths = array_map(function($image) {
            return asset('storage/app/public/images/' . $image);
        }, $images);
        session(['image_paths' => $paths]);
        //dd($car->images);
        return ['car' => $car];
    }



    public function imageDelete($id){
        $car=Car::find($id);

        unlink(storage_path()."app/public/images/".$car->image_file);

        $car->image_file=null;
        $car->image_name=null;
        $car->save();

        return redirect()->route('cars.edit',$id);
    }

}
