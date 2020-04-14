<?php

namespace App\Http\Controllers;

use App\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
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

        $duplicate = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id == $request->product_id;
        });
        if($duplicate->isNotEmpty()){
            return redirect()->route('products.index')->with('warning', 'Le produit à ete deja ajoute dans le panier');
        }
        else{
           // $product = Products::find($request->product_id);
             $product = Products::find($request->product_id);
             Cart::add($product->id, $product->title, 1 ,  $product->price)->associate("App\Products");
         //dd($test);
            return redirect()->route('products.index')->with('success', 'Le produit à ete bien ajoute dans le panier');
        }

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
    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validates = Validator::make($request->all(), [
           'qty' => 'numeric|required|between:1,10',
       ]);

       if ($validates->fails()) {
           Session::flash('error', 'La quantité doit est comprise entre 1 et 10.');
           return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
       }

       Cart::update($rowId, $data['qty']);

       Session::flash('success', 'La quantité du produit est passée à ' . $data['qty'] . '.');
       return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'les produit à ete bien supprime');

    }
}
