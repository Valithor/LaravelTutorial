@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
            		
                @include('videos.form_errors')
                {!! Form::model($video, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action'=>['VideosController@update', $video->id]])!!}

                @include('videos.form', ['buttonText'=>'Zaktualizuj'])

                {!! Form::close()!!}

            </div>
        </div>
    </div>
</div>
@stop