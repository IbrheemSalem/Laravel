<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index(){

        $video = Video::first();
        event(new VideoViewer($video));
        return view('Offers.youtube')->with('video', $video);
    }
}
