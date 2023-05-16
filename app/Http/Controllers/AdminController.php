<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use PDF;
use Illuminate\Support\Facades\Auth;




class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id())
        {
            $data=category::all();

            return view('admin.category', compact('data'));
        }
        else
        {
            return view('login');
        }
       

    }

    public function add_category(Request $request)
    {
        if(Auth::id())
        {
            $data=new category;

            $data-> category_name = $request -> category;

            $data->save();

            return redirect()->back()->with('message','Category Added Successfully!');
        }
        else
        {
            return view('login');
        }
    }

    public function delete_category($id)
    {
        if(Auth::id())
        {
            $data = category::find($id);
            $data->delete();
            return redirect()->back()->with('message','Category Deleted Successfully!');
        }
        else
        {
            return view('login');
        }
    }

    public function view_product()
    {
        if(Auth::id())
        {
            $category=category::all();
            return view('admin.product', compact('category'));
        }
        else
        {
            return view('login');
        }
    }

    public function add_product(Request $request)
    {
        if(Auth::id())
        {
            $product= new product;

            $product-> title = $request -> title;
            $product-> description = $request -> description;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product' , $imagename);
            $product-> image = $imagename;
            $product-> category = $request -> category;
            $product-> quantity = $request -> quantity;
            $product-> price = $request -> price;
            $product-> discount_price = $request -> discount;

            $product-> save();
            return redirect()->back()->with('message','Product Added Successfully!');
        }
        else
        {
            return view('login');
        }
    }

    public function show_product()
    {
        if(Auth::id())
        {
            $product=product::all();
            return view('admin.show_product', compact('product'));
        }
        else
        {
            return view('login');
        }
    }

    public function delete_product($id)
    {
        if(Auth::id())
        {
            $product = product::find($id);
            $product->delete();
            return redirect()->back()->with('message','Product Deleted Successfully!');
        }
        else
        {
            return view('login');
        }
    }

    public function edit_product($id)
    {
        if(Auth::id())
        {
            $product=product::find($id);
            $category=category::all();
            return view('admin.edit_product',compact('product','category'));
        }
        else
        {
            return view('login');
        }
    }

    public function update_product(Request $request, $id)
    {
        if(Auth::id())
        {
            $edit_product = product::find($id);

            $edit_product-> title = $request -> title;
            $edit_product-> description = $request -> description;
            $image=$request->image;
            if(!empty($image))
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product' , $imagename);
                $edit_product-> image = $imagename;
            }
            
            $edit_product-> category = $request -> category;
            $edit_product-> quantity = $request -> quantity;
            $edit_product-> price = $request -> price;
            $edit_product-> discount_price = $request -> discount;

            $edit_product-> save();

            $product = product::all();
            return view('admin.show_product', compact('product'))->with('message','Product Edited Successfully!');
        }
        else
        {
            return view('login');
        }
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $order = order::paginate(4);

            return view('admin.order', compact('order'));
        }
        else
        {
            return view('login');
        }
    }

    public function delivered($id)
    {
        if(Auth::id())
        {
            $order = order::find($id);

            $order -> delivery_status = "delivered";
            $order -> payment_status = "Paid";

            $order -> save();

            return redirect()->back()->with('message','Order Status Successfully Updated!');
        }
        else
        {
            return view('login');
        }
    }

    public function print_pdf($id)
    {
        if(Auth::id())
        {
            $order = order::find($id);
            
            $pdf = PDF::loadView('admin.pdf', compact('order'));
            

            return $pdf->download('order_details.pdf');
        }
        else
        {
            return view('login');
        }
    }

    public function send_email($id)
    {
        if(Auth::id())
        {
            $order = order::find($id);
            return view('admin.email_info', compact('order'));
        }
        else
        {
            return view('login');
        }
    }

    public function send_user_email(Request $request, $id)
    {
        if(Auth::id())
        {
            $order = order::find($id);

            $details = [
                'greeting' => $request -> greeting,
                'firstline' => $request -> firstline,
                'body' => $request -> body,
                'button' => $request -> button,
                'url' => $request -> url,
                'lastline' => $request -> lastline,
            ];

            Notification::send($order,new SendEmailNotification($details));

            return redirect()->back();
        }
        else
            {
                return view('login');
            }
    }

    public function searchdata(Request $request)
    {
        if(Auth::id())
        {
            $search = $request -> search;
            $order = order::where('name', 'LIKE', "%$search%")->orWhere('phone', 'LIKE', "%$search%")->orWhere('product_title', 'LIKE', "%$search%")->get();

            return view('admin.order', compact('order'));
        }
        else
        {
            return view('login');
        }

    }
}
