<!DOCTYPE html>
<html lang="en">
<head>

    <title>Order PDF</title>
</head>
<body>
    <h1>Order Details</h1><br>
    Customer Name: <h3>{{$order->name}}</h3>
    Customer Email: <h3>{{$order->email}}</h3>
    Customer Address: <h3>{{$order->address}}</h3>
    Customer Phone: <h3>{{$order->phone}}</h3>
    Customer Order: <h3>{{$order->product_title}}</h3>
    Quantity: <h3>{{$order->quantity}}</h3>
    Price: $<h3>{{$order->price}}</h3>
    Status: <h3>{{$order->payment_status}}</h3>
    Product: <br><img src="product/{{$order->image}}" height="300" width="300" alt="">
</body>
</html>