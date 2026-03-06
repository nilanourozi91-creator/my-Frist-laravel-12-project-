<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;
use App\Http\Resources\authorResours;
use App\Models\authore;
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
       $authors=authore::all();
       return new authorResours($authors);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorInsertRequest $request)
{
   
    $author = authore::create($request->validated());

    return new authorResours($author);
    
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $responses= authore::findOrfail($id);
      return Response()->json([
          'showdata'=>$responses
      ]);
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
