<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //create user view
    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $submitBody = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
            'address' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $submitBody['password'] = bcrypt($submitBody['password']);

        $user = User::create($submitBody);

        //create a cart for user
        Cart::create(['user_id' => $user->id]);

        auth()->login($user);
        return redirect('/')->with('message', "Welcome " . $user->name . ", you have been registered!");
    }

    public function logout(Request $request)
    {
        //remove auth info
        auth()->logout();

        //invalidate session token and regenerate clean token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'you have been logged out');
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $submitBody = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($submitBody))
        {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput("email");
    }


    //Manager elevation
    
    //panel view
    public function index()
    {
        //make sure user is manager
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaothrized action');
        }
        
        $users = User::All();
        $books = Book::ALl();
        $tags = Tag::all();

        $managementData = ['users' => $users, 'books' => $books, 'tags' => $tags];
        return view('user.panel', ['managementData' => $managementData]);
    }

    //show user
    public function show($userid)
    {
        //make sure user is manager
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaothrized action');
        }
        $user = User::find($userid);;
        // dd(CartBook::where('cart_id', $user->cart->id)->get()->count());
        return view('user.show', ['user' => $user]);
    }
    //delete user
    public function destroy($userid)
    {
        $user = User::find($userid);
        //make sure user is man ager
        if(auth()->user()->elevation != 1)
        {
            abort(403, 'unaothrized action');
        }
        //make sure user doesn't delete themselves
        if(auth()->id() == $user->id)
        {
            abort(403, 'unaothrized action');
        }

        $user->delete();

        return redirect('/panel')->with('message', 'User has been deleted successfully');
    }
}
