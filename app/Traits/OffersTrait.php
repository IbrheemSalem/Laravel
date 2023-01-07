<?php

namespace App\Traits;



Trait OffersTrait
{
    protected function saveimages($request, $folder){

        $file_extension = $request->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $request->move($path, $file_name);

        return $file_name;
    }

}
