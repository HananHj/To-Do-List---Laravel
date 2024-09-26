@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body bg-white">
            <form action="{{route('updateTask')}}" method="post">
                @csrf 
                <div class="row mt-3 text-center">
                    <input type="hidden" name="id" value = "{{$Task['id']}}"> 
                    <div class="col"> <label for="title">Task Title:</label> <input type="text" name="title" class = "form-control p-1" id = "title" value = "{{$Task['title']}}"> </div> 
                    <div class="col"> <label for="description">Task Description:</label> <input type="text" name="description" class = "form-control p-1" id = "description" value = "{{$Task['description']}}"> </div> 
                 </div>
                 <div class="row mt-3">
                    <div class="col text-center"> <button class = "btn btn-success" type = "submit"> Save</button></div>
                 </div>
            </form>
        </div>
    </div>
 </div>
@endsection
