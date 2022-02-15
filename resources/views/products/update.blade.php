@extends('layouts.app')
@section('content')
<body>
<form method="post" action="{{ route('categories.update', ['id'=>$product->id]) }}" enctype="multipart/form-data">      
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$product->name}}" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Price</label>
    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" value="{{$product->price}}" >
  </div>
  <select class="form-select" aria-label="Default select example" name="category_id" >
     @foreach($categories as $category)
    <option  value="{{$category->id}}"
    @isset($category)
    @if ($category->id==$product->category_id))
    selected
    @endif
    @endisset
        >{{$category->name}}</option>
        @endforeach
        </select>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>  
    </body>
    @endsection