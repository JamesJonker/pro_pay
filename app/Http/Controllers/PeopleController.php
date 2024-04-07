<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){
        $people = People::all();
        return view('people.index', ['people' => $people]);
    }

    public function create(){
        
        return view('people.createperson');

        
    }

    public function saveperson(Request $request){

        $data= $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'id_number' => 'required',
            'contact_number'=> 'required',
            'email'=>'required',
            'dob'=> 'required',
            'language'=>'required',
            'interests'=>'required'

        ]);

        //dd($request);
        $newPerson = People::create($data);
        return redirect(route('people.index'));
        
    }

    public function edit(People $person){
        //dd($person->name);
        return view('people.edit', ['person'=> $person]);
    }

    public function update(People $person, Request $request){
        $data= $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'id_number' => 'required',
            'contact_number'=> 'required',
            'email'=>'required',
            'dob'=> 'required',
            'language'=>'required',
            'interests'=>'required'

        ]);

        $person->update($data);
        return redirect(route('people.index'))->with('success', 'Person information has been updated');
    }

    public function delete(People $person){
        $person->delete();
        return redirect(route('people.index'))->with('success', 'Person information has been removed');
    }
}

