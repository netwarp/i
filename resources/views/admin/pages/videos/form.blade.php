@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/admin/videos">Video</a>
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
                            $action = 'Admin\VideosController@store';
                        }
                        else if ($form_type == 'edit' && isset($video)) {
                            $action = 'Admin\VideosController@update';

                        }
                    @endphp
                    <form action="{{ action($action, isset($video) ? $video->id : '') }}" method="post">
                        {{ csrf_field() }}
                        @if ($form_type != 'create')
                            {{ method_field('put') }}
                        @endif
                        <div class="form-group">
                            <label for="#">Source</label>
                            <input type="text" class="form-control" autofocus name="link" value="{{  $video->link ?? '' }}" >
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
                    <ul>
                        <li>go to youtube</li>
                        <li>Copy the link in the button <strong>SHARE</strong></li>
                        <li>Check this look like https://youtu.be/abcdefg</li>
                        <li>Enter the link here</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection