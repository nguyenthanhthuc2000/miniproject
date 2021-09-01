<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function getProduct(Request $request){
        $Products = Product::orderby('id','DESC')->get();
        $output = "";
        foreach($Products as $key => $Product){
            $output .= '<tr><th scope="row">'.$Product->id.'</th>
            <td><img class="avatar__customer"  src="'.asset('public/uploads/products/').'/'.$Product->photo.'" alt=""></td>
            <td>'.$Product->name.'</td>
            <td>'.$Product->price.'</td>   
            </tr>';
        }
        echo $output;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.products');
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
        $data = $request->all();
        $validated = $request->validate([
            'name' => 'required|max:254',
            'price' => 'required|numeric',
            'file' => 'required',
        ]);

        //check phone
        $getProducts = Product::orderby('id','DESC')->get();
        foreach($getProducts as $key => $getProduct){
            if($data['name'] == $getProduct->name){
                return 2;
                break;
            }
        }

        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];

        $file = $request->file('file');
        $fullNameFile = $file->getClientOriginalName();
        $nameFile = current(explode('.',$fullNameFile));
        $extensionFile =  $file->extension();
        $newNameFile = $nameFile.'-'.date("s-i-H").'-'.date("d-m-Y").'.'.$extensionFile;
        $file->move('public/uploads/products',$newNameFile);

        $product->photo = $newNameFile;
        if($product->save()){
            return Response()->json([
                "success" => true,
            ]);
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
