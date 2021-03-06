<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $car=DB::select('select * from cars');
        return view('cars.index',compact('car'));
    }

    public function show(Car $car)
    {
        $car = DB::select('select * from cars where id = ?', [$car->id]);
  
        return view('cars.show', ['car'=>$car[0]]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $datos_frm = $request->except('_token','_method');
        DB::table("cars")->insertGetId(['make'=>$datos_frm['make'],'model'=>$datos_frm['model'],'produced_on'=>$datos_frm['produced_on']]);
        return redirect('/cars');
        /*$car = Request::all();
        Car::create($car); // <-- Change this
        return $car;*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */

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
        $car = DB::select('delete from cars where id = ?', [$car->id]);
        return redirect('/cars');
    }
}