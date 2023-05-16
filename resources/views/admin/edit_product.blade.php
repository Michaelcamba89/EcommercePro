<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

  <base href="/public">

    @include('admin.css')
    <style>
    .div_center{
            text-align: center;
            padding: 40px;
        }
    .h2_font{
        font-size: 30px;
        padding-bottom: 40px;
    }
    .input_color{
            color:black;
            padding: 20px;
        }

    .input_color_select{
        color:black;
       
    }

    label{
        display: inline-block;
        width: 200px;
        }

    .div_design{
        padding-bottom: 15px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))
            
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

        @endif

            <div class="div_center">

            <h2 class="h2_font">Edit Product</h2>

            <form action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="div_design">
                <label for="">Product Title: </label>
                <input type="text" class="input_color" name="title" placeholder="Write a title" value="{{$product->title}}" required>

            </div>
            <div class="div_design">
                <label for="">Product Description: </label>
                <input type="text" class="input_color" name="description" placeholder="Write a Description" value="{{$product->description}}" required>

            </div>
            <div class="div_design">
                <label for="">Product Price: </label>
                <input type="number" class="input_color" name="price" placeholder="Write a Price" value="{{$product->price}}" required>

            </div>
            <div class="div_design">
                <label for="">Discount Price: </label>
                <input type="number" min="0" class="input_color" name="discount" value="{{$product->discount_price}}" placeholder="Write a Discount">

            </div>
            <div class="div_design">
                <label for="">Product Quantity: </label>
                <input type="number" class="input_color" name="quantity" placeholder="Write a Quantity" value="{{$product->quantity}}" required>

            </div>
            
            <div class="div_design">
                <label for="">Product Category: </label>
                <select name="category" class="input_color_select" required>
                    <option  value="{{$product->category}}"> {{$product->category}}</option>
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                   
                </select>

            </div>

            <div class="div_design">
                <label for="">Current Product Image: </label>
                <img style="width:100px;height:100px;margin:auto;" src="/product/{{$product->image}}" alt="">
            </div>

            <div class="div_design">
                <label for="">Change Product Image: </label>
                <input type="file" name="image" value="{{$product->image}}" >
            </div>
            <div>
                
                <input type="submit" name="submit" value="Update Product" class="btn btn-primary">
            </div>
               
                
            </form>

            </div>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>