<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use  Gloudemans\Shoppingcart\Facades\Cart;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->categories) {
            $produit = Products::with('categories')->whereHas('categories',function ($query)
            {
                $query->where('slug','=',request()->categories);
            })->orderBy('created_at', 'DESC')->paginate(8);
        }else{
        $produit = Products::with('categories')->orderBy('created_at', 'DESC')->paginate(8);
        }
         //dd($produit);
        return view('products.index',compact('produit'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Products::where('slug',$slug)->firstOrFail();
         return view('products.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search()
    {
        request()->validate([
            'q' => 'required|min:3',
            ]);
        $q = request()->input('q');
        $produit = Products::where('title','like', "%$q%")
           ->orWhere('description','like', "%$q%")
           ->paginate(6);
           return view('products.search',compact('produit'))
           ->with('search', 'Vous avez rien saisie dans la barre rechercher');
    }
}
