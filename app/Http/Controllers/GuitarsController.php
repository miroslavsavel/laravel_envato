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
        //guitars/create
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
        //strip_tags because you should ever trust user input
        //but user can also provide invalid value for input, ie. blank form
        //client side validation can be circumvented!!! out app is the gatekeeper
        $request->validate(
            [
                'guitar-name'=> 'required',
                'brand'=> 'required',
                'year'=> ['required','integer'],
            ]
            );


        //POST - here we create resource in DB
        $guitar = new Guitar();


        $guitar -> name = strip_tags($request->input('guitar-name'));
        $guitar -> brand = strip_tags($request->input('brand'));
        $guitar -> year_made = strip_tags($request->input('year'));

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
        //fetch data from database, query the model
        //we use find(), with parameter ID and it will return if is in DB or not
        //or in this case is better findOrFail()
        return view('guitars.show', [
            'guitar' => Guitar::findOrFail($guitar)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($guitar)
    {
        //GET show
        return view('guitars.edit', [
            'guitar' => Guitar::findOrFail($guitar)
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guitar)
    {
        //updating an item
        //POST, PUT, PATCH

        //first we have to fetch the data
        $request->validate(
            [
                'guitar-name'=> 'required',
                'brand'=> 'required',
                'year'=> ['required','integer'],
            ]
            );


        //POST - here we create resource in DB
        $record = Guitar::findOrFail($guitar);


        $record -> name = strip_tags($request->input('guitar-name'));
        $record -> brand = strip_tags($request->input('brand'));
        $record -> year_made = strip_tags($request->input('year'));

        $record -> save();

        //we want redirect
        return redirect()->route('guitars.show', $guitar);
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
