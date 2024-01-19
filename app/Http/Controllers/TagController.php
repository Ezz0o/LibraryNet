<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Book;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('books.tags', [
            'tags' => Tag::paginate(4)
        ]);
    }

    public function show($id)
    {
        $books = Book::where('tags', 'like', '%' .Tag::find($id)->name. '%')->paginate(2);
        return view('books.index-in-tag', ['books' => $books]);
    }

    public function store(Request $request)
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaotherized action');
        }
        $submitBody = $request->validate([
            'name' => 'required'
        ]);

        Tag::create($submitBody);

        return back()->with('message', 'Tag added successfully');
    }


    public function edit($id)
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaotherized action');
        }
        return view('books.tag-edit', ['tag' => Tag::Find($id)]);
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaotherized action');
        }

        $submitBody = $request->validate([
            'name' => 'required'
        ]);

        Tag::Find($id)->update($submitBody);

        return redirect('/panel')->with('message', 'Tag updated successfully');
    }
    public function destroy($id)
    {
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaotherized action');
        }
        $tag = Tag::Find($id);
        $tag->delete();

        return back()->with('message', 'Tag deleted successfully');
    }
}
