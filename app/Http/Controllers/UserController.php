<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = request('name');
        $user->email = request('email');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombre_imagen = Str::slug(Auth::user()->name) . '.' . $imagen->getClientOriginalExtension();
            $ruta = public_path('img/post/');

            copy($imagen->getRealPath(), $ruta . $nombre_imagen);

            $user->foto = $nombre_imagen;
            $user->foto_aceptada = null;
        }

        $user->save();
        return back();
    }

    public function fotos()
    {
        if (Auth::user()->admin == 1) {
            $users = DB::table('users')->orderBy('updated_at', 'asc')->get();
            return view('fotos', compact('users'));
        }else{
            return back();
        }
    }

    public function aceptarFoto()
    {
        $user = User::where('email', request('email'))->first();
        $user->foto_aceptada = true;
        $user->save();
        return back();
    }

    public function rechazarFoto()
    {
        $user = User::where('email', request('email'))->first();
        $user->foto_aceptada = 3;
        $user->save();
        return back();
    }
}
