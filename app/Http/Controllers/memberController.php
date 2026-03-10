<?php

namespace App\Http\Controllers;

use App\Http\Requests\memberRquest;
use App\Http\Resources\memberRsoures;
use App\Models\member;
use Exception;
use Illuminate\Http\Request;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      $member=  member::all();
      return memberRsoures::collection($member);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(memberRquest $request)
    {
         
    $author = member::create($request->validated());

    return memberRsoures::collection($author);
    

        
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $member= member::findOrfail($id);
       return new memberRsoures($member);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $member= member::findOrfail($id);
         $member::update($request->validated());
         return new memberRsoures($member);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $membr= member::findOrFail($id);
            $membr->delete();
            return response()->json(
                [
                      'member'.$membr->id.'deleted',
                ],210
            );
        }
        catch(Exception $error){
            return response()->json([
             'error'=> $error->getMessage('samething went worng'),
            ],404);
        }
    }
}
