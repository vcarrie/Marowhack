<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{

    public function index()
    {
        $array_real = array();

        $array_real[] = array('List\'in', 'http://listin.arkanii.fr', '../../images/listin_logo.png');
        $array_real[] = array('Drifblim', '/drifblim', '../../images/drifblim.png');
        $array_real[] = array('Dunsparce', '/dunsparce', '../../images/dunsparce.png');
        $array_real[] = array('Brawl', '/choice', '../../images/brawl.png');
        $array_real[] = array('SHrandom', '/shrandom', '../../images/pkball.png');
        $array_real[] = array('Transfert', '/files', '../../images/file_mini.png');
        $array_real[] = array('My files', '/freedl', '../../images/dl_arrow.png');


        return view('accueil', compact('array_real', $array_real));
    }

    public function about()
    {

        return view('about');
    }
}
