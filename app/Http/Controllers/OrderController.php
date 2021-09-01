<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends Controller
{
    public function getCart(Request $request){
        $cart = Session::get('cart');
        $output = "";
        $stt = 0;
        foreach($cart as $key => $c){
            $stt++;
            $output .= '<tr><th scope="row">'.$stt.'</th>
            <td><img class="avatar__customer"  src="'.asset('public/uploads/products/').'/'.$c['product_photo'].'" alt=""></td>
            <td>'.$c['product_name'].'</td>
            <td>'.number_format($c['product_price'],'0',',','.').'</td>   
            <td> <input class="input-number" style="max-width:40px;" type="number" value="'.$c['product_quantily'].'"></input></td>
            <td >'.number_format($c['product_price']*$c['product_quantily'],'0',',','.').'</td>
            <td><button type="button" data-id="'.$c['product_id'].'" class="btn btn-danger btn-del">Xóa</button></td>
            </tr>';
        }
        echo $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_product session
     * @return \Illuminate\Http\Response
     */
    public function delCart(Request $request){
        $cart = Session::get('cart');
        if($cart){
            if($request->id){
                foreach($cart as $key => $c){
                    if($request->id == $c['product_id']){
                        unset($cart[$key]);
                    }
                }
                Session::put('cart',$cart);
                return 1;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_product
     * @param  string  $order_code session
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request){
        $order_code = Session::get('order_code');
        $product = Product::find($request->id);
        $cart = Session::get('cart');

        //them sp vao gio hang
       if($cart == true){
           //kiem tra sp co trong gio hang chua neu co thi update sl, k thi them sp do vao gio hang
            $isAvaible = 0;
            foreach($cart as $key => $c){
                if($c['product_id'] == $product->id){
                    $isAvaible++;
                    $cart[$key] = array(
                        'order_code' => $order_code,
                        'product_photo' => $product->photo,
                        'product_name' => $product->name,
                        'product_id' => $product->id,
                        'product_price' => $product->price,
                        'product_quantily' => $c['product_quantily'] + $request->quantily,
                    );
                    Session::put('cart',$cart);
                }
            }
            if($isAvaible == 0){
                $cart[] = array(
                    'order_code' => $order_code,
                    'product_photo' => $product->photo,
                    'product_name' => $product->name,
                    'product_id' => $product->id,
                    'product_price' => $product->price,
                    'product_quantily' => $request->quantily,
                );
                Session::put('cart',$cart);
            }
       }
       //chua co session cart
       else{
            $cart[] = array(
                'order_code' => $order_code,
                'product_photo' => $product->photo,
                'product_name' => $product->name,
                'product_id' => $product->id,
                'product_price' => $product->price,
                'product_quantily' => $request->quantily,
            );
            Session::put('cart',$cart);
       }
       return 1;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::get('order_code')){
            $order_code = substr(md5(microtime()),rand(0,26),8);
            // dd($order_code);
            Session::put('order_code',$order_code);
        }
        $getCustomers = Customer::orderby('id','DESC')->get();
        $getProducts = Product::orderby('id','DESC')->get();
        return view('pages.create_order',compact('getProducts','getCustomers'));
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
