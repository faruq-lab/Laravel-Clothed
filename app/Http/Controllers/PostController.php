<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //to view homepage
    public function homePage(){
        return view('cloth.homePage',[
            'postings'=> Posting::latest()->filter
            (request(['type']))->paginate(6)
        ]);
    }

    public function show(Posting $posting){
        return view('cloth.show',[
            'posting' => $posting
        ]);
    }

    public function create(){
        return view('cloth.sellForm');
    }

    public function store(Request $request){
        // dd($request);
        $formFields = $request->validate([
            'title' =>'required',
            'type' =>'required',
            'brand' =>'required',
            'location' =>'required',
            'price' =>'required|numeric',
            'color' =>'required',
            'description' =>'required',
        ]);

        if($request->hasFile('picture')){
            $formFields['picture']= $request->file('picture')->store('pictures','public');      //logos here will be a folder that store logo in storage->app->public
        }

        $formFields['user_id'] = auth()->id();  //to insert user id in posting table

        Posting::create($formFields);       //store all fields in database, create () is from DatabaseSeeder.php
        
        
        return redirect('/')->with('message', 'Congratulation ! Your item is now listed for sale');
    }

    public function edit(Posting $posting){
        return view('cloth.edit',[
            'posting' => $posting
        ]);
    }

    public function update(Request $request, Posting $posting){
        $formFields = $request->validate([
            'title' =>'required',
            'type' =>'required',
            'brand' =>'required',
            'location' =>'required',
            'price' =>'required|numeric',
            'color' =>'required',
            'description' =>'required',
        ]);

        if($request->hasFile('picture')){
            $formFields['picture']= $request->file('picture')->store('pictures','public');      //logos here will be a folder that store logo in storage->app->public
        }

        $posting->update($formFields);

        return back()->with('message', 'Item updated succesfull');

    }

    public function delete(Posting $posting){
        $posting->delete();

        return back()->with('message', 'Item deleted succesfully');
    }
    
    public function manage(){
        return view('cloth.manage', [
            'postings'=>auth()->user()->postings()->get()
        ]);
    }

    
}