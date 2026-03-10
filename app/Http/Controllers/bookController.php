<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookrequest;
use App\Http\Resources\authorResours;
use App\Http\Resources\bookresours;
use App\Models\book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
    $Qurrry = Book::with('author');

if ($request->has('search')) {
    $search = $request->search;

    $Qurrry->where(function ($books) use ($search) {
        $books->where('title', 'like', "%{$search}%")
            ->orWhere('isbn', 'like', "%{$search}%")
            ->orWhereHas('author', function ($authorQ) use ($search) {
                $authorQ->where('name', 'like', "%{$search}%");
            });
    });
}

$books = $Qurrry->get();

return bookresours::collection($books);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(bookrequest $request)
    {
        $sbooks=book::created($request);
        return  bookresours::collection($sbooks);

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
