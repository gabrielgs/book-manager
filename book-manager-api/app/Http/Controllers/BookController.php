<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('category'))
        {
            return new BookCollection(
                Book::where('category_id', $request->category)->paginate(7)
            );
        }

        if ($request->has('search'))
        {
            return new BookCollection(
                Book::where('name', 'like', '%'. $request->search . '%')->paginate(7)
            );
        }

        return new BookCollection(Book::paginate(7));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:books,name',
            'author' => 'required',
            'status' => 'required',
            'publication_date' => 'required|date_format:Y-m-d',
            'category_id' => 'required'
        ]);

        return new BookResource(Book::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BookResource(Book::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
    }
}
