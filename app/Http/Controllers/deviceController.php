<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Device;

class deviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['list' => Device::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $rules = array("name"=>"required|min:2|max:20","price"=>"required");
        // $validator = Validator::make(
            // array('name' => 'required'),
            // // array('price' => array('required', 'min:4'))
            // array('price'=>'required'),
        // );
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) return $validator->errors();

        $device = new Device();
        $device->name=$req->name;
        $device->price=$req->price;
        $result = $device->save();
        return response(['message'=>$result ? "Created Data":"Some thing want wrong"],201);
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
    public function update(Request $req)
    {
        //
        $device= Device::find((int)$req->id);
        $device->name=$req->name;
        $device->price=$req->price;
        $result = $device->save();
        return response(['message' => $result ? "updated Data" : "Some thing want wrongme" ], 200);
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
        $device = Device::find($id);
        $result = $device->delete();
        return response(['message'=> $result ? "Deleted record" : "Some thing want wrong"],200);

    }

    public function search($find)
    {
        return Device::where("name","like","%".$find."%")->get();
    }

    public function delete(Request $request)
    {
        $result = Device::find($request->id)->delete();
        return response(["Result"=>$result ? "Deleted Data": "Error"],200);
    }
}