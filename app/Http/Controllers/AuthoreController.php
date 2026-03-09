<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;
use App\Http\Resources\authorResours;
use App\Models\authore;
use App\Models\book;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    $authors=authore::with("book");
    //    return new authorResours($authors);
    $author=authore::all();
    return response()->json(
        [
           'allAuthor'=>$author
        ]
    );
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorInsertRequest $request)
{
   
    $author = authore::create($request->validated());

    return  authorResours::collection($author);
    
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $responses= authore::findOrfail($id);
    //   return new authorResours($responses);
          return response()->json(
           [
            'showauthor'=>$responses
           ]
          );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( authorResours $request, string $id)
    {
       $author= authore::findOrFail($id);
       $author::update($request->validated());
       return response()->json(
        [
            'update'=>$author
        ]
       );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $author= authore::findOrFail($id);
       $author::delete();
       return Response()->json([
         'one author deleted'=>$author
       ]);
    }
}
