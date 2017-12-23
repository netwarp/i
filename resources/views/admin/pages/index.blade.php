@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            Dashboard
        </li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-photo"></i>
                    </div>
                    <div class="mr-5">{{ $photos_count }} photo{{ $photos_count > 1 ? 's' : '' }}</div>
                </div>
                <a class="card-footer clearfix small z-1" href="/admin/photos">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-video-camera"></i>
                    </div>
                    <div class="mr-5">{{ $videos_count }} video{{ $videos_count > 1 ? 's' : '' }}</div>
                </div>
                <a class="card-footer clearfix small z-1" href="/admin/videos">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>
@endsection