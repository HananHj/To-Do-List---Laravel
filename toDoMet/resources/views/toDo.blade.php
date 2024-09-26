@extends('layouts.app')
@section('content')
<style>
  .card {
    background-color: #808080;
  }
</style>
    <div class="container py-5 h-100">
      <div class="card rounded-3 ">
        <div class="card-body p-4">
          <span class="h2 justify-content-center align-items-center h-100"> My to Do List </span><i class="fa fa-check bg-primary text-white rounded p-2"></i>
        <form action = "{{route('addTask')}}" method="post" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" >
          @csrf
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form1" class="form-control" name = "title" />
                <label class="form-label" for="form1">Enter a task title</label>
              </div>
            </div>
            <div class="col">
                <div class="form-outline">
                  <input type="text" id="form2" class="form-control" name = "description"/>
                  <label class="form-label" for="form2">Enter a task decription</label>
                </div>
              </div>

            <div class="col">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Save</button>
            </div>
          </form>

          <table class = "table">
            <thead class = "text-center">
             <th></th>
              <th>Title</th>
              <th>Decription</th>
              <th colspan="2"></th>
            </thead>
            <tbody class = "text-center">
              @foreach($Task as $Task)
              <tr> 
                <td><input type="checkbox" /></td>
                <td>{{$Task->title}}</td>
                <td>{{$Task->description}}</td> 
                <td> <a href = "{{route('deleteTask',['id'=>$Task['id']])}}"> <i class="fa fa-trash text-danger" aria-hidden="true"></i> </a> </td>  <!-- الباراميتر هو الاي دي اللي من الرو يعني شيل معاك الاي دي اللي يضغط عليها المتسخدم -->
                <td><a href="{{route('editTask',['id'=>$Task['id']])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
              </tr>
              @endforeach
            </tbody> 
          </table>
    </div>
      </div>
    </div>
    @endsection