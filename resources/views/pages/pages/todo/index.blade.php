@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">My ToDo List</h1>
        </div>
    </div>
</div>
<form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form">
    @csrf
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="Enter the task" >
                </div>
            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                    <table class="table table-success table-striped-columns">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>

                        @foreach ($tasks as $key =>$task )
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task->done == 0)
                                    <span class="badge bg-warning">Not Completed</span>
                                @else
                                <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task-> id) }}" class="btn btn-danger"> <i class="fa-solid fa-delete-left"></i></a>
                                <a href="{{ route('todo.done', $task-> id) }}" class="btn btn-success"> <i class="fa-solid fa-circle-check"></i></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection


@push('css')
    <style>
        .page-title{
            padding: 5vh;
        }
        .form-group input{
            margin-left: 15vh;
            border: 2px solid #171d20; /* Set the border color to your desired color (e.g., #3498db) */
            border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        }
        .row button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 25vh;
        }
        .table {
            width: 70%; /* Adjust the width of the table as needed */
            margin: auto; /* Set left and right margins to auto */
        }

        body{
            background: linear-gradient(0.33turn, #3f87a6, #ebf8e1, #f69d3c, #16493e);
            background-size: cover;
        }
    </style>
@endpush
