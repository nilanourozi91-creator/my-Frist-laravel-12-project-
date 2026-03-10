<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;
use App\Http\Requests\bookrequest;
use App\Http\Resources\authorResours;
use App\Http\Resources\BorrowingResource;
use App\Models\authore;
use App\Models\barrowing;
use App\Models\book;
use App\Models\member;
use Illuminate\Http\Request;

class barrowingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
    $response = member::with('book','member')->get();
    return BorrowingResource::collection($response);
}
    // public function index(bookrequest $request)
    // {
    //     $respone=barrowing::with('books','member')->get();
    //     return BorrowingResource::collection($respone);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorInsertRequest $request)
    {
       $respone= authore::created($request->validated());
       return authorResours::collection($respone);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $respon =authore::findOrFail($id);
        // return new authorResours($respon);
        return new authorResours($respon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorInsertRequest $request, string $id)
    {
       $auth= authore::findOrFail($id);
       $auth::update($request->validated());
        return response()->json(
            [
                'update'=>$auth
            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $barp=authore::findOrfail($id);
      $barp::delete();
      return response()->json([
        'delete'=>$barp,
      ]);
    }
}
