<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Weight;
use App\Http\Resources\BreedCollection;
use App\Http\Resources\BreedResource;
use Illuminate\Support\Facades\DB;
use App\Services\PayUService\Exception;




class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    private function store ($array)
    {
        foreach ($array as $breed) {
            if(isset($breed["weight"])){
                $weight = Weight::create($breed["weight"]);
                $breed['weight_id'] = $weight->id;
            }
            unset($breed['weight']);
            Breed::create($breed);
        }
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
        return new BreedResource($breed);
    }
    private function findByNameOrId($request){
        if($request->name){
            $return = Breed::where('name', 'like', '%' . $request->name . '%')->get();
        }elseif ($request->id) {
            $return = Breed::where('id',  $request->id)->get();
        }else{
            $return = false; 
        }
        return $return;
    }

    public function find(Request $request)
{
    try {
        $breeds = $this->findByNameOrId($request);
        if($breeds == false){
            return response()->json([], 400);
        }
        if($breeds->isNotEmpty()) {
        return new BreedCollection($breeds);
        } else {
            $client = new \GuzzleHttp\Client();
            if(Breed::all()->isEmpty()){
                $response= $client->request('GET' , 'https://api.thecatapi.com/v1/breeds');
                $array = json_decode($response->getBody(), true);
                $this->store($array);
                $breeds = $this->findByNameOrId($request);
                return new BreedCollection($breeds);
            }else{
                $values = array_values($request->all());
                $url = 'https://api.thecatapi.com/v1/breeds/search?q='.implode($values, ",");
                $response= $client->request('GET' , $url);
                $array = json_decode($response->getBody(), true);
                if(empty($array)){
                    return response()->json([], 404);
                }else{
                    $this->store($array);
                    return new BreedCollection($array);
                } 
                    
                }
            }
        }catch(\Exception $e){
            return response()->json([], 403);
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


