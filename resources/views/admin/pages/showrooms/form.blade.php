@extends('admin.layouts.default')

@push('css')
    <style>
        .img-upload {
            border: 1px solid #999;
            background: #f3f3f3;
            padding: 1rem;
            margin: 0.4rem;
        }
    </style>
@endpush

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/admin/showrooms">Showrooms</a>
        </li>
        <li class="breadcrumb-item">
            Create
        </li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create new showroom
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
                            $action = 'Admin\ShowroomsController@store';
                        }
                        else if ($form_type == 'edit' && isset($showroom)) {
                            $action = 'Admin\ShowroomsController@update';
                        }
                    @endphp
                    <form action="{{ action($action, isset($showroom) ? $showroom->id : '') }}" method="post">
                        {{ csrf_field() }}
                        @if ($form_type != 'create')
                            {{ method_field('put') }}
                        @endif
                        <div class="form-group">
                            <label for="#">Title</label>
                            <input type="text" class="form-control" autofocus name="title" value="{{  $showroom->title ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="#">Description</label>
                            <textarea name="description" rows="10" class="form-control" required>{{ $showroom->description ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="#">Order</label>
                            <input type="number" class="form-control" name="order" value="{{  $showroom->order ?? '' }}" required>
                        </div>
                        <div class="form-goup">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection