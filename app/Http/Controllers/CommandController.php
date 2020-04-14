<?php

namespace App\Http\Controllers;

use App\Command;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $command = new Command();
        $produits = [];
        $i = 0;
         foreach (Cart::content() as $produit){
            $produits['product_'.$i][] = $produit->model->title;
            $produits['product_'.$i][] = $produit->model->price;
            $produits['product_'.$i][] = $produit->qty;
            $i++;
           // dd($produits);
         }
       //  dd($produits);
         //$command->price = $request->price;
         //$command->qty = $request->qty;
         $command->produits = serialize($produits);
         $command->user_id = 15;
         // dd($command);
         $command->save();
         Cart::destroy();
         return redirect()->route('products.index')->with('success', 'Votre commande a été traitée avec succès');
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
}
