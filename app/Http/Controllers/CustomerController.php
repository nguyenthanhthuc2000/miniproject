<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use URL;
class CustomerController extends Controller
{
    public function getCustomer(Request $request){
        $customers = Customer::orderby('id','DESC')->get();
        $output = "";
        foreach($customers as $key => $customer){
            $output .= '<tr><th scope="row">'.$customer->id.'</th>
            <td><img class="avatar__customer"  src="'.asset('public/uploads/avatars/').'/'.$customer->avatar.'" alt=""></td>
            <td>'.$customer->name.'</td>
            <td>'.$customer->phone.'</td>
            <td>'.$customer->email.'</td>
            <td>'.$customer->address.'</td>
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
        $customers = Customer::orderby('id','DESC')->get();
        return view('pages.customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource....
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
            'name' => 'required|max:33',
            'phone' => 'required|max:12',
            'file' => 'required',
            'email' => 'required|max:66',
            'address' => 'required|max:254',
        ]);

        //check phone
        $getCustomers = Customer::orderby('id','DESC')->get();
        foreach($getCustomers as $key => $getCustomer){
            if($data['phone'] == $getCustomer->phone){
                return 2;
                break;
            }
        }

        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];
        $customer->address = $data['address'];

        $file = $request->file('file');
        $fullNameFile = $file->getClientOriginalName();
        $nameFile = current(explode('.',$fullNameFile));
        $extensionFile =  $file->extension();
        $newNameFile = $nameFile.'-'.date("s-i-H").'-'.date("d-m-Y").'.'.$extensionFile;
        $file->move('public/uploads/avatars',$newNameFile);

        $customer->avatar = $newNameFile;
        if($customer->save()){
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
