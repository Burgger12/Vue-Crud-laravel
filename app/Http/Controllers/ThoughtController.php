<?php

namespace App\Http\Controllers;

use App\Thought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //devolvemos los pensamientos del usuario
        return Thought::where('user_id',auth()->id())->orderBy('id', 'DESC')->get();//obtiene los pensamiento de un usuario en especifico
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //creo un almacenamiento
         $thought = new Thought();
         $thought->description = $request->description;
         $thought->user_id = auth()->id();
         $thought->save();
         
         return $thought;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thought  $thought
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizo
        $thought = Thought::find($id); //busco el pensamiento
        $thought->description = $request->description; //cambio la desciption
        $thought->save();

        return $thought;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thought  $thought
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //elimino un pensamiento
        $thought = Thought::find($id);;
        $thought->delete();
        return $thought;
    }
}
