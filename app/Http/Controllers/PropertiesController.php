<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Users_Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Property;
use App\Models\User;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        $users = User::all();
        return  view('properties.index', compact('properties', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $properties = new Property;
    
        $properties->title = strtoupper($request->title);
        $properties->address = $request->address;
        $properties->state = ucwords($request->state);
        $properties->municipality = ucwords($request->municipality);
        $properties->typepost = $request->typepost;
        $properties->price = $request->price;
        $properties->currency = $request->currency;
        $properties->description = ucwords($request->description);
        $properties->typeproperty = $request->typeproperty;
        $properties->bedrooms = $request->bedrooms;
        $properties->bathrooms = $request->bathrooms;
        $properties->halfbath = $request->halfbath;
        $properties->parking = $request->parking;
        //$properties->path = strtoupper(trim($request->title . '-' . $request->state . '-' . $request->municipality));
        $properties->path = '';
        
        if($properties->save()) {
            $request->session()->flash('mensaje', 'Inmueble insertado correctamente');
            $request->session()->flash('color-class', 'success');
        } else {
            $request->session()->flash('mensaje', 'Ocurrió un error');
            $request->session()->flash('color-class', 'danger');
        }
  
        return redirect('/properties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $properties = Property::findOrFail($id);
        return  view('properties.edit', compact('properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $properties = Property::findOrFail($id);
    
        $properties->title = strtoupper($request->title);
        $properties->address = $request->address;
        $properties->state = ucwords($request->state);
        $properties->municipality = ucwords($request->municipality);
        $properties->typepost = $request->typepost;
        $properties->price = $request->price;
        $properties->currency = $request->currency;
        $properties->description = ucwords($request->description);
        $properties->typeproperty = $request->typeproperty;
        $properties->bedrooms = $request->bedrooms;
        $properties->bathrooms = $request->bathrooms;
        $properties->halfbath = $request->halfbath;
        $properties->parking = $request->parking;
        //$properties->path = strtoupper(trim($request->title . '-' . $request->state . '-' . $request->municipality));
        $properties->path = '';

        if($properties->save()) {
            $request->session()->flash('mensaje', 'Inmueble actualizado correctamente');
            $request->session()->flash('color-class', 'success');
        } else {
            $request->session()->flash('mensaje', 'Ocurrió un error');
            $request->session()->flash('color-class', 'danger');
        }
  
        return redirect('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $properties = Property::findOrFail($id);

        # Eliminar el usuario
        if($properties->delete()) {
          Session::flash('mensaje', 'Inmueble eliminado correctamente');
          Session::flash('color-class', 'danger');
          return redirect('/properties');
        } else {
          return response()->json([
            "message" => "Error al eliminar el usuario"
          ]);
        }
    }

    public function addProperty(Request $request) {
        $exist_id = Users_Properties::where('property_id', $request->property_id)->first();
        
        if(!is_object($exist_id)) {
            $user_property = new Users_Properties;
            $user_property->user_id = $request->user_id;
            $user_property->property_id = $request->property_id;

            if($user_property->save()) {
                Session::flash('mensaje', 'Usuario asignado al Inmueble correctamente');
                Session::flash('color-class', 'success');
                return redirect('/properties');
            } else {
                Session::flash('mensaje', 'Ocurrio un error al asignar al Usuario, intente nuevamente');
                Session::flash('color-class', 'danger');
                return redirect('/properties');
            }
        } else {
            Session::flash('mensaje', 'El Inmueble ya tiene un propietario');
            Session::flash('color-class', 'danger');
            return redirect('/properties');
        }
    }
}
