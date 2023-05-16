<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        table{
            margin: auto;
            width:100%;
            border: 1px solid lightblue;
           
        }
        th{
            padding: 20px;
            font-weight: 600;
            text-align: center;
            border: 3px solid white;
            background-color: lightblue;
        }
        td{
            font-weight: 300;
           
            text-align: center;
            border: 1px solid lightblue;
        }
        img{
            margin: auto;
            width: 200px;
            height: 200px;
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

            <h1 style="text-align:center; font-size:25px; font-weight:bold;">All orders</h1>

            <div style="float:right; padding:15px;">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" name="search" placeholder="Search for something..." style="color:black;">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Devivery Status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                    <th>Print</th>
                    <th>Email</th>
                    
                </tr>
                @forelse($order as $orders)
                <tr>
                    <td>{{$orders -> name}}</td>
                    <td>{{$orders -> email}}</td>
                    <td>{{$orders -> address}}</td>
                    <td>{{$orders -> phone}}</td>
                    <td>{{$orders -> product_title}}</td>
                    <td>{{$orders -> quantity}}</td>
                    <td>${{$orders -> price}}</td>
                    <td>{{$orders -> payment_status}}</td>
                    <td>{{$orders -> delivery_status}}</td>
                    <td><img src="/product/{{$orders -> image}}" alt=""></td>
                    <td>
                        @if($orders->delivery_status == 'processing')
                        <a href="{{url('delivered',$orders->id)}}" onclick="return confirm('Are you sure this order is already delivered?')"  class="btn btn-danger"> 
                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 15px;padding:5px;margin:auto;"></i></a>
                        
                        @else
                        <h1 class="btn btn-success">
                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 15px;padding:5px;margin:auto;"></i>
                        </h1>
                       
                        @endif
                    </td>
                    <td>
                        <a href="{{url('print_pdf', $orders->id)}}" class="btn btn-primary" ><i class="fa fa-upload" style="font-size: 15px;padding:5px; margin:auto;"></i></a>
                    </td>
                    <td>
                        <a href="{{url('send_email',$orders->id)}}" class="btn btn-info"><i class="fa fa-envelope" style="font-size: 15px;padding:5px; margin:auto;"></i></a>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="13" style="padding:20px;">No Data Found</td>
                </tr>

                @endforelse
            </table>
            


          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>