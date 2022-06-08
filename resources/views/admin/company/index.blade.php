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
                            <li class="breadcrumb-item active">Companies</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('companies.create') }}" class="btn btn-success">Add Company</a>
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
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Logo</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->email }}</td>
                                                <td>{{ $company->website }}</td>
                                                <td> <img src="{{ url('storage/images/' . $company->logo) }}" alt="">
                                                </td>
                                                <td>
                                                    {{-- <a href="" class="btn btn-primary"></a> --}}
                                                    <a href="{{ route('companies.edit', $company->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('companies.destroy', $company->id) }}"
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
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Logo</th>
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
