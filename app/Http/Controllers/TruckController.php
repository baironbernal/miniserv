<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;



class TruckController extends Controller
{

    private $rulesValidator = [
        'name' => 'bail | required | string | max:350',
        'mark' => 'bail | required | string | max:350',
        'license_plate' => 'bail | required | string',
        'type_truck_id' => 'bail | required| numeric',
        'weight' => 'bail | required | numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('operator')) {
            $trucks = Truck::where('user_id', Auth::id())->get();

            return view('users.operator.trucks.index',compact('trucks'));    
        }

        $trucks = Truck::all();
        return view('users.operator.trucks.index',compact('trucks'));    
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
        
        $validator = Validator::make($request->all(),$this->rulesValidator);

        if ($validator->fails()) {
            return redirect('/home')
                        ->withErrors($validator)
                        ->withInput();
        }

            $truck = new Truck();
            $truck->name = $request->name;
            $truck->mark = $request->mark;
            $truck->license_plate = $request->license_plate;
            $truck->type_truck_id = $request->type_truck_id;
            $truck->weight = $request->weight;
            $truck->user_id = Auth::id();
            $truck->save();

            return back()->with('status', '¡Saved truck!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        //
    }
}
