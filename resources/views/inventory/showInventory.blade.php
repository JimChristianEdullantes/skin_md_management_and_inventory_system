@extends('layouts.app')

@section('title')
      Inventory
@endsection

@section('content')

@if(session('productAdded'))
	<script>
        alert('Product has been added successfully');
    	</script>
@endif

@if(session('productDeleted'))
	<script>
        alert('Product has been deleted successfully');
    	</script>
@endif

@if(session('productUpdated'))
	<script>
        alert('Product has been updated successfully');
    	</script>
@endif



      <div class="main-content">                        
            <div class="search-user">
                   <form action="/search_product" method="GET" class="search-name">
                        <input type="text" name="name" placeholder="Search Product">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add_product"><a href="{{route('inventory.create')}}">ADD PRODUCT</a></button>

            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Price</th>
                              <th>quantity</th>
                              <th>Actions</th>
                        </tr>
                  </thead>

                  <tbody>

                        @forelse($products as $product)
                              <tr>
                                    <td class="p_name">{{$product->product_name}}</td>
                                    <td class="description">{{$product->product_description}}</td>
                                    <td>Php {{$product->product_price}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    
                                    <td>
                                          <form id="delete-user" action="{{route('inventory.destroy', $product->id)}}" method="POST">
                                                @csrf 
                                                {{method_field('DELETE')}}

                                                <a href="{{route('inventory.edit', $product->id)}}"><i class='bx bx-edit'></i></a>
                                                <button type="submit">
                                                            <i class='bx bxs-trash' ></i>
                                                </button>
                                          </form>
                                    
                                    </td>
                              </tr>
                                    @empty
                                    <tr>
                                          <td> <h2>No products available!</h2></t>
                                    </tr>
                                   
                        @endforelse

                  </tbody>
      
            </table>

            <div class="paginate">

            </div>

      </div>


@endsection