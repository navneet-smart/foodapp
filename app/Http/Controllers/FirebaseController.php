<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public $database;

    public function __construct(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/../Firebase/firebase.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://food-delivery-app-e7995.firebaseio.com/')->create();
        $this->database = $firebase->getDatabase();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $newPost = $this->database->getReference('blog/posts')->push([
    //         'title' => 'Laravel FireBase Tutorial' ,
    //         'category' => 'Laravel'
    //     ]);
    //     echo '<pre>';
    //     print_r($newPost->getvalue());
    // }

    public function show(){
        $reference = $this->database->getReference('combos');
        $value = $reference->getValue();
        print_r(json_encode($value));
    }

    public function real(){
        return view('admin.firebase.real');
    }

}