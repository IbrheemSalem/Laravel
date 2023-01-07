<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Patinent;
use App\Models\phones;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    ############################################################
    ######################## one to one ########################
    ############################################################
    public function RelationHasOne(){
        /*
        $user = \App\Models\User::find(11);
        return$user->phone;
        return response()-> json($user);
        */

        #$user = \App\Models\User::with('phone')->find(11);  // phones ==> phone


        $user = User::with(['phone' => function($q){
            $q->select('code', 'phone', 'user_id');  // user_id ==> hidden models Phones
        }])->find(11);

        return response()->json($user);
    }

    public function hasOneRelationReverse(){

        $phone = phones::with(['user' => function($q){
            $q->select('id', 'mobile', 'name');
        }])->find(1);

        // $phone->makeVisible('user_id'); //show user_id
        // $phone->makeHidden('code');     //hidden code

        return response()->json($phone);
    }

    public function getUserHasPhone(){

        $user = User::whereHas('phone')->get();
        return response()->json($user);
    }

    public function getUserNotHasPhone(){

        $user = User::whereDoesntHave('phone')->get();
        return response()->json($user);
    }

    public function getUserWhereHasPhoneWithCondition(){

        $user = User::whereHas('phone', function($q){
            $q->where('code', '04');})->get();

        return response()->json($user);
    }
    ############################################################
    ######################## End one to one ####################
    ############################################################

    ############################################################
    ######################## one to Many #######################
    ############################################################

    public function RelationHasOneMany(){
        $Doctor = Hospital::with(['Doctor' => function($q){
            $q->select('name', 'address', 'Hospital_id');  // user_id ==> hidden models Phones
        }])->find(2);

        return response()->json($Doctor);
    }

    public function RelationHasOneManyReverse(){
        $Doctor = Doctor::with(['Hospitals' => function($q){
            $q->select('name', 'address', 'id');  // user_id ==> hidden models Phones
        }])->find(1);

        return response()->json($Doctor);
    }

    public function TableHospital(){

        $hospital = Hospital::select()->get();

        return view('Doctors.table_hospital', compact('hospital'));
    }

    public function TableDoctor($doctors_id){

        $hospital = Hospital::find($doctors_id);

        $doctor =  $hospital->Doctor;

        return view('Doctors.table_showDoctors', compact('doctor'));
    }

    public function HospitalDoctor(){

        return  Hospital::whereHas('Doctor')->get();
    }

    public function HospitalDoctorMale(){
        /*
        return Hospital::whereHas('Doctor', function($q){
            $q->where('gender', 1);
        })->get();
        */
        return Hospital::whereHas('Doctor', function($q){
            $q->where('gender', 2);
        })->get();

                /*
        return Hospital::with(['Doctor' => function($q){
        $q->select('name', 'address', 'Hospital_id');  // user_id ==> hidden models Phones
        }])->whereHas('Doctor', function($q){ $q->where('gender', 2);})->get();
        */
    }

    public function HospitalDoctorNotMale(){

        return Hospital::whereDoesntHave('Doctor', function($q){
            $q->where('gender', 1);
        })->get();

        /*
        return Hospital::with(['Doctor' => function($q){
        $q->select('name', 'address', 'Hospital_id');  // user_id ==> hidden models Phones
        }])->whereDoesntHave('Doctor', function($q){
            $q->where('gender', 1);
        })->get();
        */
    }

    public function HospitalDelete($Hdelete_id){

        $hospital = Hospital::find($Hdelete_id);
        if(!$hospital){
            return abort('404');
        }

        $hospital->Doctor()->delete();
        $hospital->delete();

        return redirect()->route('table.hospital');
    }
    ############################################################
    ######################## End one to Many ###################
    ############################################################

    ############################################################
    ######################### Many to Many #####################
    ############################################################
    public function RelationMany(){
        $doctor = Doctor::with('services')->find(6);

        return $doctor;
    }

    public function RelationManyGetDoctors(){
        $doctors = Service::with('doctors')->find(5);

        return  $doctors;
    }

    public function RelationManyGetDoctorsServeiceCreate($service_id){

        $doctor = Doctor::find($service_id);
        $service =  $doctor->services;


        $doctors = Doctor::select('id', 'name')->get();
        $allservices = Service::select('id', 'name')->get();

        return view('Doctors.table_service', compact('service', 'doctors', 'allservices'));
    }

    public function RelationManyInsert(Request $request){

        $doctor = Doctor::find($request->doctor_id);
        if(!$doctor){
            return abort('404');
        }

        // $doctor->attach($request->servicesIds); // error where insert data ?? function services in Model Doctor is many to many
        //$doctor->services()->attach($request->servicesIds); //function services() in model doctor // for loop insert in the error sol =>>
        //$doctor->services()->sync($request->servicesIds); // delete all and insert new
        $doctor->services()->syncWithoutDetaching($request->servicesIds);
        return redirect()->back();
    }
    ############################################################
    ####################### End Many to Many ###################
    ############################################################

    ############################################################
    ####################### has one Through ####################
    ############################################################
    public function RelationThrough(){

        $Patinent = Patinent::find(1);

        return $Patinent->doctor;
    }

    ############################################################
    ##################### End  has one Through #################
    ############################################################

    ############################################################
    ####################### has one Through ####################
    ############################################################
    public function RelationManyThrough(){

        $Country = Country::find(2);

        return $Country->doctor;
    }
    ############################################################
    ##################### End  has one Through #################
    ############################################################


    public function getDoctors()
    {
        return $doctors = Doctor::select('id', 'name', 'gender')->get();

        // The normal and unprofessional method should not be followed in the event that there is no one time to write this code
        /* if (isset($doctors) && $doctors->count() > 0) {
            foreach ($doctors as $doctor) {
                $doctor->gender = $doctor->gender == 1 ? 'male' : 'female';
                // $doctor -> newVal = 'new';
            }
        }
        return $doctors;*/
    }




}
