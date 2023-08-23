<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('cars.cars', ['cars' => $cars]);
    }

    public function carinfo($id){
        $car = Car::find($id);
        return view('cars.show', ['car' => $car]);
    }
}
