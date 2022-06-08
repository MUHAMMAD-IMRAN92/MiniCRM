@extends('admin.layout.default')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Company</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Employee</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Company</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee First Name</label>
                                        <input type="text" class="form-control" id="exampleInputfName1" name="fname"
                                            placeholder="Employee First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputlName1" name="lname"
                                            placeholder="Employee Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Employee Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            placeholder="Employee Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Employee Phone</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone"
                                            placeholder="Employee Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Company</label>
                                        <select class="form-control"  name="company" id="">
                                            @foreach ($companies as $key => $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <!-- general form elements -->

                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
