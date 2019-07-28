<?php

namespace App\Http\Controllers;
use App\Manufacture;
use Validator;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function showManufactureScreen()
    {
        return view('pages.add-manufacture-screen');
    }

    public function addManufacture(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:manufactures',
        ]);
        
        if ($validator->fails()) {
            return response(['errors' => $validator->errors(), 'status' => false, 'message' => ''], 422);
        }

        $data =[
            'name'=> $request->name
        ];
        $manufature = Manufacture::Create($data);
        return response()->json(['Message'=>'Successfully Added'],200);
    }

    public function showModelScreen()
    {}
    public function addModel(Request $request)
    {

    }
}
