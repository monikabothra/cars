<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Car_type;
use App\Models\Car_image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->id);
        $type = Car_type::all();
        $cars = Car::where('owner', Auth::user()->id)->get();
        return view('cars.index', compact('type', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car;
        $car->name = $request->name;
        $car->type = $request->type;
        $car->price = $request->price;
        $car->speed = $request->speed;
        $car->owner = Auth::user()->id;
        $car->save();
        $images = $request->image;
        // dd($images);
        if ($images) {
            foreach ($images as $image) {
                $carimg = new Car_image;

                if ($image) {
                    $imageName = 'Collection/' . Str::random(40) . '.' . strtolower($image->getClientOriginalExtension());
                    $filePath = $image->storeAs('public/', $imageName);
                }
                $carimg->image = $imageName;
                $carimg->car_id = $car->id;
                $carimg->save();
            }
        }
        return redirect()->route('car.index')->with('message', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        // dd($car);
        $car = Car::with(['car_type', 'car_images'])->where('id', $car->id)->first();
        // dd($car);
        return view('cars.view', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
    public function dashboard()
    {
        $car = Car::with(['car_type', 'car_images', 'owners'])->get();
        return view('dashboard', compact('car'));
    }
}
