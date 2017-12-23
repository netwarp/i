@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/admin/photos">Photos</a>
        </li>
        <li class="breadcrumb-item">
            Create
        </li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Create new photo
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @php
                        $form_type = Route::currentRouteAction();
                        $form_type = explode('@', $form_type)[1];

                        if ($form_type == 'create') {
                            $action = 'Admin\PhotosController@store';
                        }
                        else if ($form_type == 'edit' && isset($photo)) {
                            $action = 'Admin\PhotosController@update';

                        }
                    @endphp
                    <form action="{{ action($action, isset($photo) ? $photo->id : '') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($form_type != 'create')
                            {{ method_field('put') }}
                        @endif
                        <div class="form-group">
                            <label for="#">Title</label>
                            <input type="text" class="form-control" autofocus name="title" value="{{  $photo->title ?? '' }}" >
                        </div>
                        <div class="form-group">
                            <label for="#">Description</label>
                            <input type="text" class="form-control" name="description" value="{{  $photo->description ?? '' }}" >
                        </div>
                        <div class="form-group">
                            <label for="#">Order</label>
                            <input type="number" class="form-control" name="order" value="{{  $photo->order ?? '' }}" >
                        </div>
                        <div class="form-group">
                            @if ($form_type != 'create')
                                <img src="/file/{{ $photo->path }}" alt="" style="max-width: 100%">
                            @endif
                            <input type="file" name="file" accept="image/*" >
                        </div>
                        <div class="form-goup">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="h4">Every fields must to be completed</h1>

                    <h2 class="h3">How to resize image or decrease size ?</h2>
                    <ul>
                        <li>Download <a href="https://www.designer.io/">Gravit designer</a></li>
                        <li>New file</li>
                        <li>Size: 800x600</li>
                        <li>Export to format <strong>jpeg</strong></li>
                        <li>Upload the photo here</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection