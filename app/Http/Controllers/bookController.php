<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookrequest;
use App\Http\Resources\bookresours;
use App\Models\book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $allbooks= book::with('author')->get();
       return  bookresours::collection($allbooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(bookrequest $request)
    {
        $sbooks=book::created($request->validated());
        return bookresours::collection($sbooks);
         $sbooks::load('author');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $showbooks= book::findOrFail($id);
       return new bookresours($showbooks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(bookrequest $request, string $id)
    {
      $updatebook=book::FindOrFail($id);
      $updatebook::update($request->validated());
      return response()->json(
        [
          'book updated seccessfuly'=>$updatebook
        ]
      );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletebook=book::FindOrFail($id);
        $deletebook->delete();
        return response()->json([
           'book deleted seccsesfuly'
        ]);
    }
}
