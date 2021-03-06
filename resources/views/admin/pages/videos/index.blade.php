@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            Videos
        </li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ action('Admin\VideosController@create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> &nbsp; Create new video</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Preview</td>
                            <td>ID</td>
                            <td>Source</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($videos as $video)
                            <tr>
                                <td>
                                    <iframe width="300" src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                </td>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->link }}</td>
                                <td style="display: flex;">
                                    <a href="{{ action('Admin\VideosController@edit', $video->id) }}" class="btn btn-primary" style="margin-right: 1rem;"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ action('Admin\VideosController@destroy', $video->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No video</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection