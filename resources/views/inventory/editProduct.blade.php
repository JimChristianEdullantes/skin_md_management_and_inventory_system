@extends('layouts.app')

@section('title')
      Edit/Product
@endsection

@section('content')
<div class="main-content">

      <div class="regform">
            <h2>Product Information</h2>                        
      </div>

      <div class="main">
            <form action="{{route('inventory.update', $product->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
                        <h3 class="product_name">Name</h3>
                        <input class="address" type="text" name="name" value="{{$product->product_name}}"/>

                        <h3 class="product_name">Description</h3>
                        <input class="email" type="text" name="description" value="{{$product->product_description}}"/>

                        <h3 class="product_name">Price</h3>
                        <input class="email" type="text" name="price" value="{{$product->product_price}}"/> 

                         <h3 class="product_name">Quantity</h3>
                        <input class="email" type="text" name="quantity" value="{{$product->product_quantity}}"/>     

                         <h3 class="product_name">Critical </br> Quantity</h3>
                        <input class="product_critical_quantity" type="text" name="critical_quantity" value="{{$product->product_critical_quantity}}"/>                            
                  
                        <input class="register" type="submit" value="Update"/>
            

                        <div class="cancel">
                              <a href="{{route('inventory.index')}}">Cancel</a>
                        </div>
            </form>

      </div>
</div>
@endsection