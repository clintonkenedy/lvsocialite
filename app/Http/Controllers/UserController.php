<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Postimage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $data= new Postimage();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nombres = $request->input('nombres');
        $user->apellidos = $request->input('apellidos');
        $user->celular = $request->input('celular');
        $user->direccion = $request->input('direccion');
        $user->f_nacimiento = $request->input('f_nacimiento');
        $user->genero = $request->input('genero');
        if($request->file('img_avatar')){
            // if(unlink($user->avatar)) unlink($user->avatar);
            $file = $request->file('img_avatar');
            $filename = substr(str_shuffle($str_result), 0, 8)."_".$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = $filename;
            $user->avatar = '/image/'.$filename;
            $data->save();
        }
        $user->save();

        return redirect('/profile/edit');
    }

    public function edit_pass()
    {
        $user = Auth::user();
        return view('profile.edit_pass', compact('user'));
    }

    public function update_pass(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);
        $input = $request->all();

        if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
            return;
        }
        $user = Auth::user();
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->input('new_password_confirmation'))
        ]);

        auth()->logout();
        return redirect('/login');

    }

    // public function update_avatar(Request $request)
    // {
    //     $user = Auth::user();
    //     $data= new Postimage();
    //     // dd($request->file('image'));
    //     if($request->file('image')){
    //         $file= $request->file('image');
    //         $filename= date('YmdHi').$file->getClientOriginalName();
    //         $file->move(public_path('image'), $filename);
    //         $data['image']= $filename;
    //         $user->avatar = '/image/'.$filename;
    //     }
    //     $data->save();
    //     $user->save();
    //     return redirect()->route('images.view');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
