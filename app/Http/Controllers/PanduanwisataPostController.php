<?php

namespace App\Http\Controllers;
use App\Models\PanduanwisataPost;
use App\Models\DestinasiwisataPost;
use App\Models\FasilitasPost;
use App\Models\FaqPost;
use Illuminate\Http\Request;

class PanduanwisataPostController extends Controller
{
    public function index()
    {
    $panduanWisataPost = PanduanwisataPost::all();
    $destinasiWisataPost = DestinasiwisataPost::all();
    $fasilitasPost = FasilitasPost::all();
    $faqPost = FaqPost::all();

    return view('index', compact(['panduanWisataPost', 'destinasiWisataPost', 'fasilitasPost', 'faqPost'] ));
    }

}
