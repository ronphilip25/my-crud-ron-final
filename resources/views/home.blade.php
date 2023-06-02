@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                <a href="{{ route('student.create') }}" class="btn btn-success btn-sm" title="Add New Student">Add New</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                    <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Mobile</th>
                    <th>Actions<th>
                </thead>
                <tbody>
                  @foreach ($stud as $stud_info)
                    <tr>

                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $stud_info->name }}</td>
                       <td>{{ $stud_info->section }}</td>
                       <td>{{ $stud_info->mobile }}</td>

                       <td>

                        <a href="{{ url('student/'. $stud_info->id) }}" title="View Student"><button class="btn btn-info btn-sm " style="margin-right: 6px;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            View  </button></a>

                         <a href="{{ url('/student/'.$stud_info->id.'/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm " style="margin-right: 6px;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit  </button></a>

                            <form action="{{ url('/student'.'/'.$stud_info->id) }}" method="POST"
                            accept-charset="UTF-8" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <button title="Delete Student" type="submit" class="btn btn-danger btn-sm " style="margin-right: 6px;"
                            onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i> Delete</button>
                               

                            </form>


                       </td>

                    </tr>
                  @endforeach
                </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection