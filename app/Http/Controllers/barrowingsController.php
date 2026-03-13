<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;
use App\Http\Requests\bookrequest;
use App\Http\Requests\BorrowingRequest;
use App\Http\Resources\authorResours;
use App\Http\Resources\bookresours;
use App\Http\Resources\BorrowingResource;
use App\Models\authore;
use App\Models\barrowing;
use App\Models\book;
use App\Models\member;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class barrowingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
    $response = book::with('member')->get();
    return BorrowingResource::collection($response);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowingRequest $request){
        $book=book::findOrFail($request->book_id);
        if ($book->avalible_copies>0) {
           $bo= barrowing::create($request->validated());
           $bo->load(['member','book']);
           $bo->book->barrow();
           return new bookresours($bo);

        }
    }
    public function returnedbook(barrowing $request){
        if ($request->stutas!=="barrowed") {
            return response()->json([
                'respone'=>'book is been locked',
            ]);
        }
    $request->update([
        'bring_date'=>now(),
        'stutas'=>'returned'

    ]);
    
      $request->book-> returnbook();
      $request->load(['book','barrrow']);
      return new bookresours($request);
    }

    //returned books
    public function overdue(){
        $b=barrowing::with('book','member')->when('stutas',"barrowed")->Where('due_date','<',now())->get();
         barrowing::where('stutas','barrowed')->Where('due_date','<',now())->update(['stutas'=>'overdue']);
           return BorrowingResource::collection($b);
         }


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
