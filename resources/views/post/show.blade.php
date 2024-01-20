@extends('template.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="post-details">
                <img src="{{asset($post->image_path)}}"
                alt="blog">
                <h1 class="big-title mt-5">{{$post->title}}</h1>
                <p class="post-description">{{$post->description}}</p>
                <div class="post-meta d-flex  justify-content-between">
                    <p class="author-category">
                        <small class="text-muted">{{$post->author}} | {{$post->category->name}}</small>
                    </p>
                    <p class="created-at">
                        @if ($post->created_at->isToday())
                            Today
                        @elseif ($post->created_at->isYesterday())
                            Yesterday
                        @else
                            {{$post->created_at->format('j F Y')}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
