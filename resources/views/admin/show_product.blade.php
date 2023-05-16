<!DOCTYPE html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: auto;
            text-align: center;
            border: 2px solid lightblue;
            margin-top: 40px;
        }
        .h2_font{
        font-size: 30px;
        padding-top: 20px;
        text-align: center;
        }
        .image_size{
            width: 150px;
            height: 150px;
        }
        .th_css{
            background: lightblue;
        }
        .th_deg{
            padding: 25px;
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

            <h2 class="h2_font">All Products</h2>

            <table class="center">
                <tr class="th_css">
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Category</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Discount Price</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Action</th>
                </tr>
                @foreach($product as $product)
                <tr>
                    
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="image_size" src="/product/{{$product->image}}">
                    </td>
                    <td class="td_action">
                        <a onclick="return confirm('Are you sure to delete {{$product->title}}?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                        <a class="btn btn-secondary" href="{{url('edit_product',$product->id)}}">Edit</a>
                    </td>
                   
                </tr>
                @endforeach
            </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>