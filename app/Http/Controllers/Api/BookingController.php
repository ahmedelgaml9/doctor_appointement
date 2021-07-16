<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DoctorSlots;
use App\Models\Book;
use Validator;

class BookingController extends Controller
{
   
   
    public function availabletimeslots()
    {

       $slots = DoctorSlots::where('status','active')->get();

         return response()->json(['data'=>$slots, 200]);

    }

    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [

             'day' => 'required|date_format:Y-m-d|after:yesterday',
             'slot_id' => 'required',
             'user_id' => 'required',

         ]);
        
         if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);
         } 

         $slot= DoctorSlots::where('id',$request->slot_id)->first();

         if(empty($slot))
         {


           return response()->json(['status'=>'false','error'=>'this slot not found']);


         }

         else{

         $insert= new Book;
         $insert->day= $request->day;
         $insert->slot_id = $request->slot_id;
         $insert->user_id = $request->user_id;
         $insert->save();

        
        }


         if($insert)

         {

         
         $slot->status="unactive";
         $slot->save();

         return response()->json(['status'=>'true','success'=>'data inserted successfully']);

         }

         else{

         return response()->json(['status'=>'false','error'=>'data  not inserted successfully']);

         }

    }


}
