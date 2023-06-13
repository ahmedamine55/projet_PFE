<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddbBijoux;
use App\Models\Bijoutier;
use App\Models\Categorie;
use App\Models\Type;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = AddbBijoux::select()->where('verified', "old") ->get();
        $categories = Categorie::all();
        $types = Type::all();
        return view("client.products",compact('products','categories','types'));
    }


    public function filtredProducts(Request $request){

        if(!isset($_GET["type"]))
            $products = AddbBijoux::select()->where('verified', "old") ->get();
        else{
        $type = $_GET["type"];
        $products = AddbBijoux::whereHas('types', function($q) use ($type){
            $q->whereIn('name', $type);
        })->get();
        }
        return view("client.categories_veiw",compact('products'));

    }

    public function home()
    {
        return view("client.home");
    }

    public function products()
    {
        $products = AddbBijoux::select()->where('verified', "old") ->get();
        $categories = Categorie::all();
        $types = Type::all();
        return view("client.products",compact('products','categories','types'));
    }

    public function pdetails(AddbBijoux $addbBijoux,$id){

        $addbBijoux=AddbBijoux::find($id);
        return view("client.productdetails",compact('addbBijoux'));

    }

    public function shops(Bijoutier $bijoutiers){

        $bijoutiers = Bijoutier::all();
        return view("client.shop",compact('bijoutiers'));

    }

    public function shop_details(AddbBijoux $articles,$id){

        $articles=AddbBijoux::select()->where('bijoutier_id',$id) ->get();
        // dd($articles);
        return view("client.shopdetails",compact('articles'));

    }



}
