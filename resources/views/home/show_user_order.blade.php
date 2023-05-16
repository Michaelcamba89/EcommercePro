<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style>

        table, th, td{
            margin: auto;
            padding:  25px;
            border: 1px solid lightblue;
        }
        th{
            font-size: 15px;
            font-weight: 600;
           background-color: lightblue;
           border: 1px solid white;
           text-align: center;
        }
        td{
            font-size: 15px;
            font-weight: 300;
           text-align: center;
        }


      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        <h1 style="font-size:25px; padding:25px; font-weight:bold; text-align:center;">Product Orders</h1>
         <div>
            <table>
               <tr>
                  <th>Product Title</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Payment Status</th>
                  <th>Delivery Status</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>
               @foreach($order_data as $order_data)
               <tr>
                  <td>{{$order_data->product_title}}</td>
                  <td>{{$order_data->quantity}}</td>
                  <td>{{$order_data->price}}</td>
                  <td>{{$order_data->payment_status}}</td>
                  <td>{{$order_data->delivery_status}}</td>
                  <td>
                     <img src="/product/{{$order_data->image}}" alt="" height="150" width="150">
                  </td>
                  <td>
                     @if($order_data->delivery_status == 'processing')
                     <a href="{{url('cancel_order',$order_data->id)}}" onclick="return confirm('Are you sure you want to cancel your order [{{$order_data->product_title}}]?')" class="btn btn-danger">Cancel</a>
                     @elseif($order_data->delivery_status == 'delivered')
                     <a href="#" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true" style="font-size: 15px;margin:auto;"></i></a>
                     @elseif($order_data->delivery_status == 'canceled')
                     <a href="#" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true" style="font-size: 15px;margin:auto;"></i></a>
                     @endif
                  </td>
               </tr>
               @endforeach
            </table>
            <br><br>
         </div>
        
      </div>
     
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>