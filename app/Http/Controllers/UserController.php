<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Users_Properties;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = ucwords($request->name);
        $user->lastName = ucwords($request->lastName);
        $user->motherName = ucwords($request->motherName);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(10);

        if($user->save()) {
            $request->session()->flash('mensaje', 'Usuario insertado correctamente');
            $request->session()->flash('color-class', 'success');
        } else {
            $request->session()->flash('mensaje', 'Ocurrió un error');
            $request->session()->flash('color-class', 'danger');
        }
  
        return redirect('/users');
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
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
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
        $user = User::findOrFail($id);

        $user->name = ucwords($request->name);
        $user->lastName = ucwords ($request->lastName);
        $user->motherName = ucwords ($request->motherName);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;

        if($user->save()) {
            $request->session()->flash('mensaje', 'Usuario actualizado correctamente');
            $request->session()->flash('color-class', 'success');
        } else {
            $request->session()->flash('mensaje', 'Ocurrió un error');
            $request->session()->flash('color-class', 'danger');
        }
  
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relation = Users_Properties::where('user_id', $id)->first();
        $user = User::findOrFail($id);

        if(!is_object($relation)) {
            # Eliminar el usuario
            if($user->delete()) {
                Session::flash('mensaje', 'Usuario eliminado correctamente');
                Session::flash('color-class', 'danger');
                return redirect('/users');
            } else {
                return response()->json([
                  "message" => "Error al eliminar el usuario"
                ]);
            }
        } else {
            Session::flash('mensaje', 'Usuario no puede ser eliminado ya que tiene Inmuebles a su nombre.');
            Session::flash('color-class', 'danger');
            return redirect('/users');
        }
    }
}
