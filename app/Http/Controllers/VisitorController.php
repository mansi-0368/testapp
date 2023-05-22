<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::where('status', 1)->get();
        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age'  => 'required',
            'email'=> 'required',

        ]);

        $file = $request->file('image');
        $image = rand().''.$file->getClientOriginalExtension();
        $destinationpath = '/uploads';
        $file->move($destinationpath, $file->getClientOriginalName());
        
        $store = Visitor::create([
            'name' => $request->name,
            'age'  => $request->age,
            'image'=> $image,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        if($store){
            Session::flash('message', 'Saved Successfully');
            Session::flash('alert-class', 'success');
        }

        else{
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'danger');
        }

        return redirect()->back();
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
        $visitor = Visitor::where('id', $id)->get();
        return view('visitors.edit', compact('visitor'));
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
        $request->validate([
            'name' => 'required',
            'age'  => 'required',
            'email'=> 'required',

        ]);

        $file = $request->file('image');
        $image = rand().''.$file->getClientOriginalExtension();
        $destinationpath = '/uploads';
        $file->move($destinationpath, $file->getClientOriginalName());

        $update = Visitor::where('id', $id)->update([
            'name' => $request->name,
            'age'  => $request->age,
            'image'=> $image,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        if($update){
            Session::flash('message', 'Updated Successfully');
            Session::flash('alert-class', 'success');
        }

        else{
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'danger');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visitor::destroy($id);
        Session::flash('message', 'Deleted Successfully');
    }
}
