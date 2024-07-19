<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('throttle:reviews')->only(['store']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        return view('books.reviews.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        #returns the validated data
        $data = $request->validate([ #the properties must have a protected fillable in review model
            'review' => 'required|min:15',
            'rating' => 'required|min:1|max:5|integer'
        ]);

        $book->reviews()->create($data); #scoped create - create a new instance of the review and will automatically associate with the $book

        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
