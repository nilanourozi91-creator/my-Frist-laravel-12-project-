<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Http\Resources\userResours;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        return response()->json(
           [
             'Userdate'=>$user
           ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userRequest $request)
    {
       $allu= User::created($request);
       return response()->json(
        [
          'user'=>$allu 
        ]
       );
    }

    /**
     * Display the specified resource.
     */
    public function show(userResours $id)
    {
        // $user=User::all($id);
        // return 
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
