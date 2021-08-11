@extends('master')
@section('content')

<div class="videos-header card">
    <h2>Najnowsze filmy</h2>
</div>

@if(Session::has('video_created'))
<div class="alert alert-succes card">{{Session::get('video_created')}} </div>
@endif
@if(Session::has('video_destroyed'))
<div class="alert alert-succes card">{{Session::get('video_destroyed')}} </div>
@endif

<div class="row">

@foreach($videos as $video)
            <!-- Single video -->
    <div class="col-xs-12 col-md-6 col-lg-4 single-video">
        <div class="card">
        
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$video->url}}?showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="card-content">
                <a href="{{url('videos', $video->id)}}">
                    <h4>{{$video->title}}</h4>
                </a>
                <p>{{ Str::limit($video->description, $limit=50)}}</p>
                <span class="upper-label">Dodał</span>
                <span class="video-author">{{$video->user->name}}</span>
            </div>
            
        </div>
    </div>

@endforeach
@guest
@else
<div class="col-xs-12 col-md-6 col-lg-4 single-video">
        <div class="card card-content">
            <a href="/videos/create"><div class="embed-responsive embed-responsive-16by9 btn btn-primary cont">
            +
            </div></a>
            <div class="card-content justify-content-md-center">
                        <a href="/videos/create">
                    <h4 class="">Dodaj nowe video</h4>
                   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p>&nbsp;&nbsp;&nbsp;</p>
                <span class="upper-label"></span>
                <span class="video-author"></span>
                 </a>
            </div>
        </div>
    </div>

</div>
@endguest

@stop