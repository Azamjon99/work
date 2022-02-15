@extends('layouts.app')
 
@section('content')
<div class="container">
    <p>Type something in the input field to search the table for names or description:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Delete</th>
                    <th scope="col">edit</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                @foreach($datas as $data)
                    <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td> <a href="{{route('getProductById', $data->id)}}">{{$data->name}}</a></td>
                    <td>{{$data->description}}</td>
                    <td class="text-nowrap">
                        <div class="inline-block">
                            <form action="{{route('categories.destroy', ['category'=>$data->id])}}" class="dib" method="POST">
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
                    <td class="text-nowrap">
                        <a href="{{route('categories.edit', ['category'=>$data->id])}}"><i class="fa fa-edit"></i></a>  
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
@endsection