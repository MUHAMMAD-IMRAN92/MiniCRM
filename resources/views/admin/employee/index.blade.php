@extends('admin.layout.default')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">

                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if (session('msg'))
            <div class="alert alert-success">
                {!! session('msg') !!}
            </div>
        @endif
        <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                           
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($emploies as $employee)
                                            <tr>
                                                <td>{{ $employee->first_name . '' . $employee->last_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                               
                                                <td>
                                                    {{-- <a href="" class="btn btn-primary"></a> --}}
                                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">Del</a>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                          
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
