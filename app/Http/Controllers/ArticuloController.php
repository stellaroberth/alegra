<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Articulo;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7;

class ArticuloController extends Controller
{

    public function index(Request $request)
    {

    $paso=0; 
    $client = new Client([
    // Base URI is used with relative requests
    'base_uri' => '',
    // You can set any number of default request options.
    'timeout'  => 200,
    ]);
    $response = $client->request('GET', 'https://app.alegra.com/api/v1/items/:id', [ 'auth'  =>  [ 'roberth.stella@gmail.com:2a0bf0809344bd02e99d' ,  '2451985' ]]);  

    //dd($response->getBody()->getContents()); 
    $posts=json_decode(($response->getBody()->getContents())); 
    return view('index',compact('posts'),['paso'=>$paso]);
    }

    public function create(Request $request)
    {       
    return view('create');
    }

    public function edit($id)
    {  
    $client = new Client([
    'base_uri' => 'https://app.alegra.com/api/v1/items/',
    'timeout'  => 200,
    ]);
    $response = $client->request('GET',$id ,[ 'auth'  =>  [ 'roberth.stella@gmail.com:2a0bf0809344bd02e99d' ,  '2451985' ]]); 
     //dd($response->getBody()->getContents());  
    $posts=json_decode(($response->getBody()->getContents()));
       return view('edit',compact('posts'));
    }   

    public function delete($id)

    { 
    $paso=1;    
    $client = new Client([
    'base_uri' => 'https://app.alegra.com/api/v1/items/',
    'timeout'  => 200,
    ]);    
    $request = $client->delete($id, [ 'auth'  =>  [ 'roberth.stella@gmail.com:2a0bf0809344bd02e99d' ,  '2451985' ]]);
   // $response = $request->send();
   // dd($request);
    $response = $client->request('GET', 'https://app.alegra.com/api/v1/items/:id', [ 'auth'  =>  [ 'roberth.stella@gmail.com:2a0bf0809344bd02e99d' ,  '2451985' ]]);  
    //dd($response->getBody()->getContents()); 
    $posts=json_decode(($response->getBody()->getContents()));
    return view('index',compact('posts'),['paso'=>$paso]);
    }   
}
