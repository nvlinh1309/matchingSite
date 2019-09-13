<?php

namespace App\Http\Controllers\user;

use App\Category;
use App\Currency;
use App\Message;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ProductController extends Controller
{
    public function addnew()
    {
        $currencies = Currency::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('user.addNewProduct')
            ->with('currencies', $currencies)
            ->with('categories', $categories);
    }

    public function products()
    {
        if (Auth::check()) {
            $products = Product::where('status', '>', 0)->paginate(10);
            return view('user.products')->with('products', $products);
        } else {
            return view('user.login');

        }
    }

    public function detail($id)
    {
        $categories = Category::where('status', 1)->get();
        $product = Product::where('id', $id)->where('status', 1)->first();
        $message=Message::where('product_id',$id)->get();
        $message=count($message);
        $products = Product::where('status', 1)
            ->where('id', '<>', $id)
            ->where('category_id', $product->category_id)
            ->orderBy('id', 'DESC')
            ->get();
        if ($products) {
            return view("user.detail")
                ->with('product', $product)
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('message', $message);
        } else {
            return "Product deleted";
        }

    }

    public function send_contact(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'content' => 'required|min:3',
        ];
        $messages = [
            'name.required' => 'You must enter your name',
            'email.required' => 'You must enter your email',
            'email.email' => 'Email is not valid',
            'phone.numeric' => 'Phone is not valid',
            'phone.required' => 'You must enter your name',
            'content.required' => 'You must enter your name',
            'content.min' => 'Password must contain at least 3 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
//            dd(Auth::user()->id);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $messages = new Message();
            $messages->name = $request->name;
            $messages->email = $request->email;
            $messages->phone = $request->phone;
            $messages->content = $request->content;
            $messages->product_id=$id;
            $messages->user_id_from=Auth::user()->id;
            $messages->user_id_from_type=0;
            $messages->user_id_to=$request->id_to;
            $messages->user_id_to_type=$request->user_type;
            $messages->status=0;
            $messages->approve=0;
            $messages->reply_id=0;
            $messages->save();
            $errors = new MessageBag(['sendSuccess' => 'Send successfully!']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
