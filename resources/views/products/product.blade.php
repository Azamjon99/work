@extends('layouts.app')
 
@section('content')

<div class="container">

 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="myTable">

@foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td><a href="{{route('products.show', ['id'=>$product->id])}}">{{$product->name}}</a></td>
      <td>{{$product->price}}</td>
      <td class="text-nowrap">
    <div class="inline-block">
        <form action="{{route('products.destroy', ['id'=>$product->id])}}" class="dib" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <div class="inline-block">
            <button class="btn btn-sm btn-danger"   data-toggle="tooltip" data-placement="top" >
                <i class="fa fa-trash "></i>
            </button>
        </div>
        </form>
    </div>
</td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection

