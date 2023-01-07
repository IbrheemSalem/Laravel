<?php

namespace App\Http\Controllers;

use App\Http\Requests\Offers;
use App\Models\Offrts;
use App\Traits\OffersTrait;
use Illuminate\Http\Request;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AjaxOffersController extends Controller
{
    use OffersTrait;

    public function create(){

    return view('AjaxOffers.create');
    }

    public function store(Offers $request){

        $file_name = $this->saveimages($request->photo, 'images/offers');

        $offer = Offrts::create([
            'name' => $request->name_en,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'details' => $request->details,
        ]);

        if($offer){

            return response()->json([
                'status' => true,
                'msg' => __('messges.Done save successfuly'),
            ]);
        }
    }

    public function table(){
        $Offers = offrts::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'photo', 'details')->paginate(5);
        return view('AjaxOffers.table', compact('Offers'));
    }

    public function delete(Request $request){

        $offers_delete = Offrts::find($request->id);
        $offers_delete->delete();

        if($offers_delete){

            return response()->json([
                'status' => true,
                'msg' => __('messges.Done save successfuly'),
                'id' =>  $request -> id,
            ]);
        }else{

            return response()->json([
                'status' => false,
                'msg' => __('messges.Not saved'),
            ]);
        }
    }

    public function edit(Request $request){

        $offer = offrts::find($request->Offers_id);
        if(!$offer){

            return response()->json([
                'status' => false,
                'msg' => __('messges.Not saved'),
            ]);
        }

        $offer = offrts::select('id', 'name_en', 'name_ar', 'price', 'photo', 'details')->find($request->Offers_id);
        return view("AjaxOffers.edit", compact('offer'));
    }

    public function upDate(Request $request){

        $offer = offrts::find($request->id_edit);
        if(!$offer)
            return response()->json([
                'status' => false,
                'msg' => __('messges.Not saved'),
            ]);
            $offer->update([
                'name' => $request->name_en,
                'name_en' => $request->name_en,
                'price' => $request->price,
                #'photo' => $file_name,
                'name_ar' => $request->name_ar,
                'details' => $request->details,
                'updated_at' =>  $request,
            ]);
            return response()->json([
                'status' => true,
                'msg' => __('messges.Done save successfuly'),
            ]);
    }
}
