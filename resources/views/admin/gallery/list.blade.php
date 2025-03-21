@extends('admin.layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
</div>
@endif

<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gallery / List</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Gallery Items Table -->
    <h2>Gallery Items</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gallery Title</th>
                <th>Images Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->title }}</td>
                    <td>{{ $gallery->images->count() }}</td>
                    <td>
                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Gallery Form -->
    <h2>Create Gallery</h2>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Gallery Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Create Gallery</button>
    </form>
</div>
@endsection
