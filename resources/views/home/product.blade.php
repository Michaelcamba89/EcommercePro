<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br><br>
               <div>
                  <form action="{{url('product_search')}}" method="GET">
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