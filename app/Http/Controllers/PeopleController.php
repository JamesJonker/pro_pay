<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

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
        $data['interests'] = implode(',', $request->interests);
        if($newPerson = People::create($data)){
            Mail::to($data['email'])->send(new Email($data));
        };
        return redirect(route('people.index'));

    }

    public function edit(People $person){
        
        $list = ['Hunting','Fishing','Tracking','Cooking','Cars','Other'];

        $listItem = [
            ['name'=>'hunting', 'sel'=>'' ],
            ['name'=>'fishing', 'sel'=>'' ],
            ['name'=>'tracking', 'sel'=>'' ],
            ['name'=>'cooking', 'sel'=>'' ],
            ['name'=>'cars', 'sel'=>'' ],
            ['name'=>'other', 'sel'=>'' ],
            
        ];

        $langList = [
            ['lang'=>'english', 'select'=>''],
            ['lang'=>'afrikaans', 'select'=>''],
            ['lang'=>'xhosa', 'select'=>''],
            ['lang'=>'venda', 'select'=>''],
            ['lang'=>'zulu', 'select'=>''],
            ['lang'=>'other', 'select'=>''],
        ];
        foreach($langList as $langkey=> $langitem){
            if($langitem['lang'] == $person['language']){
                $langList[$langkey]['select'] = 'selected';
            }
        }
        $person['langList'] = $langList;
        //dd($person);
       $person['interests'] = explode(',', $person->interests);

        foreach($listItem as $lkey=>$lItem){
            
            foreach($person['interests'] as $interest){
                if($lItem['name']== $interest){
                    $listItem[$lkey]['sel'] = 'selected';
                    
                }
            }
        }
        $person['list'] = $listItem;
        //dd($person);
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

        $data['interests'] = implode(',', $request->interests);
        $person->update($data);
        return redirect(route('people.index'))->with('success', 'Person information has been updated');
    }

    public function delete(People $person){
        $person->delete();
        return redirect(route('people.index'))->with('success', 'Person information has been removed');
    }
}

