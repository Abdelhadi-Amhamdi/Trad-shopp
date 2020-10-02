<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Item ;
use App\Save ;
use App\Card ;
use App\Order ;
use App\User ;
use App\Message ;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::user()->is_admin){
            $this->authorize('view' , 'home');
        }
        return view('home');


    }

    public function cards() {
        if(Auth::user()->is_admin){
            $this->authorize('view' , 'home.cards');
        }
        return view('home.cards');
    }
    public function Getcards() {
        $cards = Card::where('user_id' , Auth::user()->id)->get();
        return $cards;
    }
    public function saves() {
        $saves = Save::where('user_id' , Auth::user()->id)->get();
        return view('home.saves');
    }
    public function getSaves() {
        $saves = Save::where('user_id' , Auth::user()->id)->get();
        return $saves;
    }

    public function getItems() {
        $items = Item::all();
        return $items;
    }


    public function addItem(Request $request) {
        $item = new Item();

        $item->photo = $request->image->store('image');
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->save();

        return $item;
    }



    public function delete($id) {
        $item = Item::find($id);
        $item->delete();
        return Response()->json(['etat' => true ]);
    }

    public function update(Request $request) {
        $item = Item::find($request->id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        if($request->hasFile('image')){
            $item->photo = $request->image->store('images');
        }
        $item->save();
        return Response()->json(['etat' => true , 'title' => $request  ]);
    }
    public function deletesaved($id) {
        $item = Save::find($id);
        $item->delete();
        return Response()->json(['etat' => true ]);
    }

    public function deletecard($id) {
        $card = Card::find($id);
        $card->delete();
        return Response()->json(['etat' => true]);
    }
    public function makeOrder(Request $request) {
        $cards = Card::where('user_id' , Auth::user()->id)->get();

        foreach ($cards as $card => $order) {
            $orders = new Order();

            $orders->title = $order->title;
            $orders->price = $order->price;
            $orders->photo = $order->photo;
            $orders->user_id = Auth::user()->id;
            $orders->name = $request->name;
            $orders->city = $request->city;
            $orders->email = $request->email;
            $orders->phone = $request->phone;
            $orders->adresse = $request->adresse;

            $orders->save();
        }
        return Response()->json(['etat' => true]);
    }
    public function DeleteOrder($id) {
        $order = Order::find($id);
        $order->delete();
        return Response()->json(['etat' => true]);
    }
    public function order() {
        if(!Auth::user()->is_admin){
            $this->authorize('view' , 'home.orders');
        }
        return view('home.orders');
    }
    public function getOrders() {
        $orders = Order::all();
        return $orders;
    }

    // infos

    public function info(Request $request) {
        return view('home.infos');
    }
    public function sendInfo(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->phone = $request->phone;
        $user->adresse = $request->adresse;
        $user->city = $request->city;
        $user->name = $request->name;

        $user->save();
        return Response()->json(['etat' => true]) ;
    }
    public function getInfo(){
        $id = Auth::user()->id;

        $user = User::find($id);

        return $user ;
    }

    public function Show($id){
        $item = Item::find($id);
        $items = Item::all();

        return view('items.show' , ['item' => $item , 'items' => $items]);
    }


}
