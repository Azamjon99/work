@extends('layouts.app')
 
@section('content')

<form method="POST" action="{{ route('categories.store') }}">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput2" >
    @if($errors->has('name'))
    <span class="text-danger">{{$errors->first('name')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea2" rows="3"></textarea>
    @if($errors->has('description'))
    <span class="text-danger">{{$errors->first('description')}}</span>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>  

@endsection