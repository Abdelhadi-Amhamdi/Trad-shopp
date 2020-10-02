<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Item ;
use App\Save ;
use App\Card ;
use Auth ;

class WelcomeController extends Controller
{



    public function index(){
        return view('layouts.app');
    }
    public function GetPro() {
        $products = Item::all();
        return $products;
    }

    public function save(Request $request) {

        $itemSave = new Save();
        $itemSave->user_id = Auth::user()->id;
        $itemSave->title = $request->title;
        $itemSave->price = $request->price;
        $itemSave->photo = $request->photo;

        $itemSave->save();

        return Response()->json(['etat' => true]);
    }

    public function add(Request $request) {
        $cardItem = new Card();
        $cardItem->user_id = Auth::user()->id;
        $cardItem->title = $request->title;
        $cardItem->price = $request->price;
        $cardItem->photo = $request->photo;

        $cardItem->save();

        return Response()->json(['etat' => true]);
    }

    
}
