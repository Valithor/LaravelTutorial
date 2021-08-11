@extends('master')
@section('content')

<div class="col-xs-12 videos-header card">
    <h2>{{$video->title}}</h2>
</div>

<div class="row">

    <!-- left col. -->
    <div class="col-xs-12 col-md-9 single-video-left">

        <div class="card">

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$video->url}}?showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        
            <div class="single-video-content">
                <div class="categories">
                    <h4>Kategorie</h4>
                    @foreach($video->categories as $category)
                        <a href=""> {{$category->name}}&nbsp;</a>
                    @endforeach
                </div>
                <h4>Pełny opis</h4>
                <p>{{$video->description}}</p>
                <span class="upper-label">Dodał</span>
                <span class="video-author">{{$video->user->name}}</span>
                <div class="input-group">
                <div class="edit-button navbar-left">
                    <a href="{{action('VideosController@edit', $video->id)}}" class="btn btn-info btn-lg">
                        Edytuj Video
                    </a>
                </div>
                @guest
                    @else
                <div class=" edit-button col-md-5">
                @if(Auth::user()->name==$video->user->name)
                    <a href="{{action('VideosController@destroy', $video->id)}}" class="btn btn-danger btn-lg">
                        Usun Video
                    </a>
                    @endif
                </div>
                @endguest
                </div>
            </div>
            
        </div>
        
    </div>

    <!-- right col. -->
    <div class="col-xs-12 col-md-3 single-video-right">
        
    

        <!-- pojedynczy box -->
        <div class="card">
            <div class="right-col-box categories-box">
                <h4>Popularne kategorie</h4>
                <ul class="list-group">
                @for($i = 0; $i < 3; $i++)
                     <li class="list-group-item">
                        <h5>{{$cats[$i]->name}}</h5>
                        <span>{{$cats[$i]->videos->count()}} filmów</span>
                    </li>             
                @endfor                  
                </ul>
            </div>
        </div>

        <!-- pojedynczy box -->
        <div class="card">
            <div class="right-col-box">
                <h4>Statystyki</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">{{$video->count()}}</span>Filmów
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{$category->count()}}</span>Kategorii
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{DB::table('users')->count()}}</span>Użytkowników
                    </li>                   
                </ul>                            
            </div>
        </div>

    </div>

</div>

@stop