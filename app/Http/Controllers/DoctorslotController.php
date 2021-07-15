<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSlots;
use Auth;


class DoctorslotController extends Controller
{
    
    public function __construct(DoctorSlots $model)
   {

    $this->model= $model;

    $this->view ='admin/doctorslots/';


   }


    public function index()
    {
        
       $slots = $this->model->where('user_id',Auth::user()->id)->get(); 

       return view ($this->view .'index',compact('slots'));

    }


     public function profile()
     
     {
        
       return view('admin.dashboard');
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->view .'create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $insertslot = $this->model->create($request->all());

      if($insertslot)
      {

         return redirect('/doctors/slots')->with('success', 'Slots inserted!');

      }

      else

      {
         return redirect('/doctors/slots')->with('error', 'Slots not  inserted!');

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
         
         $row =$this->model->find($id);

         return view ($this->view .'edit',compact('row'));
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
    
     $update = $this->model->find($id)->update($request->all());

      if($update)
      {


       return redirect('/doctors/slots')->with('success', 'Slots inserted!');

      }

      else

      {
         return redirect('/doctors/slots')->with('error', 'Slots not  inserted!');

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
     $delete= $this->model->destroy($id);

      if($delete)
      {


       return redirect('/doctors/slots')->with('success', 'Slots Deleted');

      }

      else

      {
         return redirect('/doctors/slots')->with('error', 'Slots not Deleted');

      }

    }



}
