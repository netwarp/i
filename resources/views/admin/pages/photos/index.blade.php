@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            Photos
        </li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ action('Admin\PhotosController@create') }}" class="btn btn-success {{ ! $showrooms_count ? 'disabled' : '' }}"><i class="fa fa-plus-circle"></i> &nbsp; Create new photo</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Preview</td>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Order</td>
                                <td>Showroom_id</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($photos as $photo)
                                <tr>
                                    <td><img src="/file/{{ $photo->path }}" alt="" style="width: 100px;"></td>
                                    <td>{{ $photo->id }}</td>
                                    <td>{{ $photo->title }}</td>
                                    <td>{{ $photo->description }}</td>
                                    <td>{{ $photo->order }}</td>
                                    <td>{{ $photo->showroom_id }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ action('Admin\PhotosController@edit', $photo->id) }}" class="btn btn-primary" style="margin-right: 1rem;"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ action('Admin\PhotosController@destroy', $photo->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No photos</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection