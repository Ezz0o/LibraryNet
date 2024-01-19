<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.books-index', ['books' => Book::latest()->filter(request(['tag', 'search']))->paginate(4)]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', ['book' => $book]);
    }
    
    public function create()
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'Unauthorized Action');
        }

        return view('books.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'Unauthorized Action');
        }
        $submitBody = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'dateofpublishing' => 'required',
            'price' => 'required',
            'tags' => 'required',
        ]);
        
        //create book in database
        Book::create($submitBody);

        return redirect('/panel')->with('message', 'book Added successfully');
    }
    public function update(Request $request, $id)
    {
        $book = Book::Find($id);
         //make sure logged in user is manager
         if(auth()->user()->elevation != 1)
         {
             abort(403, 'Unauthorized Action');
         }

         //setup submit body(with validation)
         $submitBody = $request->validate([
             'name' => 'required',
             'author' => 'required',
             'dateofpublishing' => 'required',
             'price' => 'required',
             'tags' => 'required',
         ]);
         
         //create book in database
         $book->update($submitBody);

         return redirect('/panel')->with('message', 'book updated successfully');
    }
}
