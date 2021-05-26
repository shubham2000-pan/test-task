<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
         
        $save= Item::get();
        
       return response()->json($save);
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
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
        $array = [
            'name' =>  $request->name,
            'price' => $request->price,
            
        ]; 
            
            
        
        $save= Item::insert($array);
        if($save){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
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
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
         
        $save= Item::where('id','=',$id)->first();
         if($save){
            $responce['status'] = true;
            $responce['message'] = 'added successfully';

         }
       return response()->json($save);
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
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
        $id=$request->id;
        $array = [
            'name' =>  $request->name,
            'price' => $request->price,
            
        ];    
        
        $save= Item::where('id','=',$id)->update($array);
        if($save){
            $responce['status'] = true;
             $responce['message'] = 'update successfully';
         }
       return  $responce;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
         
        $save= Item::where('id','=',$id)->delete();
         if($save){
            $responce['status'] = true;
            $responce['message'] = 'Delete successfully';

         }
       return response()->json($save);
    }
}
