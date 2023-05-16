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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br><br>
               <div>
                  <form action="{{url('view_product_search')}}" method="GET">
                     @csrf
                     <input type="text" name="search" placeholder="Search for something..." style="width:500px; border-radius:10px;">
                     <input type="submit" value="Search">
                  </form>
               </div>
            </div>
            @if(session()->has('message'))
            
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

        @endif
            <div class="row">


               @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1" style="font-size:large;">
                           Product Details
                           </a> <br>
                           <form action="{{url('add_cart', $products->id)}}" method="POST">

                           @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:100px;height:45px; border-radius:20px; align-items:center; margin-top:2%;">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" style="border-radius:25px;" value="Add To Cart">
                                 </div>
                              

                              </div>
                             
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" style="width: 100%;aspect-ratio:3/4; object-fit:contain;" alt="">
                     </div>
                     <div class="detail-box">
                        <h4 style="white-space:normal;">
                        {{$products->title}}
                        </h4>

                        @if($products->discount_price != null)
                        <h6>
                           ${{$products->discount_price}}
                        
                        
                        <div style="text-decoration: line-through; color:lightblue;">
                            ${{$products->price}} 
                        </div>
                        </h6>
                        
                        @else
                        <h6 style="color:darkblue;">
                           ${{$products->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
               
               @endforeach
               <div style="text-align:center;margin:auto; margin-top:2%; padding:20px">
               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </div>
               

         </div>
      </section>
      <!-- end product section -->

      <!-- Comment and reply system -->
      @include('home.comment')
      <!-- End comment and reply system -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
            
         }

         function reply_close(caller)
         {
            $('.replyDiv').hide();
         }
      </script>

      <script>
         document.addEventListener("DOMContentLoaded", function(event)
         {
            var scrollpos = localStorage.getItem('scrollpos');
            if(scrollpos) window.scrollTo(0, scrollpos);
         });
         window.onbeforeunload = function(e)
         {
            localStorage.setItem('scrollpos', window.scrollY);
         };
      </script>
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