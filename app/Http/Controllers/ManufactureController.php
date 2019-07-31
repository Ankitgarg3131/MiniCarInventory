<?php

namespace App\Http\Controllers;
use App\Manufacture;
use Validator;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function showManufactureScreen()
    {
        return view('pages.manufacture');
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
        return response()->json(['message'=>'Successfully Added'],200);
    }

    public function showManufactureList()
    {
        return view('pages.manufacturelist');
    }

    public function manufactureList()
    {
        $manufatures = Manufacture::all();
        return $manufatures;
    }
    public function showModalScreen()
    {
        return view('pages.showmodal');
    }
}
