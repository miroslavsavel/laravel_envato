<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//include our model for Guitar
use App\Models\Guitar;

class GuitarsController extends Controller
{
    private static function getData(){
        return [
            ['id'=> 1, 'name' => 'American Standard Strat', 'brand' => 'Fender'],
            ['id'=> 2, 'name' => 'Starla 2', 'brand' => 'PRS'],
            ['id'=> 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id'=> 4, 'name' => 'Talman', 'brand' => 'Ibanez'],
        ];
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dispalay all guitars in DB
        //GET request
        //it is in guitars folder

            // 'guitars' => self::getData(),
            //with method all we are now reading all data from database
        return view('guitars.index', [
            'guitars' => Guitar::all(),
            'userInput' => '<Script>alert("hello")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST - here we create resource in DB
        $guitar = new Guitar();

        $guitar -> name = $request->input('guitar-name');
        $guitar -> brand = $request->input('brand');
        $guitar -> year_made = $request->input('year');

        $guitar -> save();

        //we want redirect
        return redirect()->route('guitars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($guitar)
    {
        //fetch propriate record from db
        //GET
        $guitars = self::getData();
        //it is multidimensional array
        $index = array_search($guitar, array_column($guitars, 'id'));

        if($index===false)
        {
            //if index is exactly false and not 0
            abort(404);
        }
        return view('guitars.show', [
            'guitar' => $guitars[$index]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //GET show 
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
        //updating an item
        //POST, PUT, PATCH
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting a record from DB
        //DELETE
    }
}
