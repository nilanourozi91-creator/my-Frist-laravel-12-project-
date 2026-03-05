<?php

namespace App\Http\Controllers;

use App\Models\authore;
use Illuminate\Http\Request;

class AuthoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $author=authore::all();
       return response()->json(
        [
            'author'=>$author
        ]
       );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // مطمئن شو مدل Author درست است و حرف اول بزرگ است
    $author = authore::create([
        'name' => $request->name,
        'bio' => $request->bio,
        'nationality' => $request->nationality,
    ]);

    return response()->json([
        'new' => $author
    ]);
}
    // public function store(Request $request)
    // {
    //     //
    //         $author=authore::created([
    //         'name'=> $request->name,
    //         'bio'=>$request->bio,
    //         'nationality'=>$request->nationality,
    //     ]);
    //     return response()->json(
    //         [
    //             'new'=>$author
    //         ]
    //     );
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
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
