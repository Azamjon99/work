@extends('layouts.app')
 
@section('content')
<body>
<form method="POST" action="{{ route('products.store') }}">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
    @if($errors->has('name'))
    <span class="text-danger">{{$errors->first('name')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Price</label>
    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" >
  </div>
  @if($errors->has('price'))
    <span class="text-danger">{{$errors->first('price')}}</span>
    @endif
  <select class="form-select" aria-label="Default select example" name="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>  
</body>
@endsection