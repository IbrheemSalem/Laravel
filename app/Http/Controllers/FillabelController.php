<?php

namespace App\Http\Controllers;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Requests\Offers;
use App\Models\Offrts;
use App\Traits\OffersTrait;
use App\Models\Scopes\AncientScope;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class FillabelController extends Controller
{
    use OffersTrait;

    public function fillabel()
    {
        return Offrts::select()->get();
    }
    /*
    public function store(){

        Offrts::create([
            'name' => 'Ofers3',
            'price' => '300',
            'photo' => 'Ofers3 Ofers3 Ofers3 Ofers3',
        ]);
    }
    */
    public function create(){

        return view("Offers.create");
    }


    public function store(Offers $request){
        /*
        $data =  $this->getFormData();
        $messages = $this->getMessages();


        $validat = Validator::make($request->all(),$messages);
        if ($validat->fails())
        {
            return  redirect()->back()->withErrors($validat)->withInput($request->all());
        }
        */

        $file_name = $this->saveimages($request->photo, 'images/offers');

        Offrts::create([
            'name' => $request->name_en,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'details' => $request->details,
        ]);
        return  redirect()->back()->with('success', 'Create successfuly');
    }
    /*
    public function getMessages(){
        return $message =[
            'name.unique' => __('messges.The Name is valid'),
            'name.required' => __('messges.This field is required'),
            'price.numeric' =>__('messges.The Price rquierd th number'),
            'price.required' =>__('messges.This field is required'),
            'photo.required' =>__('messges.This field is required'),
        ];
    }

    public function getFormData(){
        return $data = [
            'name' => 'required|unique:offrts,name|max:100',
            'price' => 'required|numeric',
            'photo' => 'required',
        ];
    }

    protected function saveimages($request, $folder){

        $file_extension = $request->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $request->move($path, $file_name);

        return $file_name;
    }
*/
    public function table(){

        $Offers = offrts::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'photo', 'details')->paginate(5);
        return view("Offers.table", compact('Offers'));
    }

    public function edit($Offers_id){

        $offer = offrts::find($Offers_id);
        if(!$offer){
            return redirect()->back();
        }

        $offer = offrts::select('id', 'name_en', 'name_ar', 'price', 'photo', 'details')->find($Offers_id);
        return view("Offers.edit", compact('offer'));
    }

    public function upDate(Offers $request, $Offers_id){

        $offer = offrts::find($Offers_id);
        if(!$offer){
            return redirect()->back();
        }

        //$offer->update($request->all());

        //OR

        $offer->update([
            'name' =>   $request->name_en,
            'name_ar' =>   $request->name_ar,
            'name_en' =>   $request->name_en,
            'details' => $request->details,
            'photo' =>   $request->photo,
            'price' =>   $request->price,
            'updated_at' =>  $request,
        ]);


        return redirect()->back()->with('success', 'Create successfuly');
    }

    public function delete($Offers_id){

        //Offrts::where('id', '$Offers_id')->first(); OR --->
        $offers_delete = Offrts::find($Offers_id);
        if(!$offers_delete){
            return redirect()->back()->with('erroe', __('An error occurred during the deletion process'));
        }

        $offers_delete->delete();

        return redirect()->route('offers.table')->with('success', __('The item has been deleted successfully'));
    }

    public function scope(){


        // where , whereNull , whererNotNull , whereIn

        //Local Scope
        //$inactiveOfeers = Offrts::inactive()->get();
        //$inactiveOfeers = Offrts::invaled()->get();

        //Gloabal Scope
        $inactiveOfeers = Offrts::get();

        //Remove Globale Scope
        //$inactiveOfeers = Offrts::withoutGlobalScope(AncientScope::class)->get();

        return $inactiveOfeers ;

    }


}
