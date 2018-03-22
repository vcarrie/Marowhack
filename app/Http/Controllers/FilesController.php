<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index(){
        return view('files_home');
    }

    public function myfiles(){
        return view('freedl');
    }

    public function getmyfiles(){

        $dir = "storage/app/freedl";
        $files1 = scandir($dir);

        $return =  json_encode($files1);
        return $return;
    }

    public function gettransfert(){

        $dir = "storage/app/transfert";
        $files1 = scandir($dir);

        $return =  json_encode($files1);
        return $return;
    }



}
