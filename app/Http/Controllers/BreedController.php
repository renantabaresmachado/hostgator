<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Weight;
use App\Http\Resources\BreedCollection;
use App\Http\Resources\BreedResource;
use Illuminate\Support\Facades\DB;



class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $response= $client->request('GET' , 'https://api.thecatapi.com/v1/breeds');
        $array = json_decode($response->getBody(), true);
            if(Breed::all()->count() < count($array)){
                foreach ($array as $breed) {
                    $obj = Breed::where('id' , $breed['id'])->first();
                    if(!$obj){
                        $weight = Weight::create($breed["weight"]);
                        $breed['weight_id'] = $weight->id;
                        unset($breed['weight']);
                        Breed::create($breed);
                    }   
                }
            }
            $breeds = Breed::all();
            return new BreedCollection($breeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breed = Breed::where('id' , $id)->first();
        $breed->id = $id;
        return new BreedResource($breed); 
    }

    public function findbyname($name)
    {
        $breed = Breed::where('name' , $name)->first();
        if($breed){
            return new BreedResource($breed);
        }else{
            $client = new \GuzzleHttp\Client();
            $response= $client->request('GET' , 'https://api.thecatapi.com/v1/breeds/search?q='.$name);
            $array = json_decode($response->getBody(), true);
            if(empty($array)){
                return response()->json(['data' => 'Resource not found'], 400);
            }else{
                    $breed = Breed::where('id' ,$array[0]['id'])->first();
                if($breed){
                    return new BreedResource($breed);
                }else {
                    $weight = Weight::create($array[0]["weight"]);
                    $array[0]['weight_id'] = $weight->id;
                    unset($array[0]['weight']);
                    $breed = new Breed($array[0]);
                }
                $breed->save();
                return new BreedResource($breed);
            }
            

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
