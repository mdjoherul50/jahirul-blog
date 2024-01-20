@extends('template.master')
@include('template.partials.banner')
@section('content')
    <section id="blog">
        <!--blog-heading--------------->
        <div class="blog-heading">
            <span>Recent Posts</span>
            <h3>My Blog</h3>
        </div>
    
        <!--container---------------->
        <div class="blog-container">
            <!--box-1------------->
         @if(isset($posts))
            @foreach ($posts as $post)

            <?php
            $limitedDescription = Str::limit($post->description, 300);
            $limitedTitle = Str::limit($post->title, 55);

            ?>
            <div class="blog-box">
                <!--img---->
                <div class="blog-img">
                    <img src="{{asset($post->image_path)}}"
                        alt="blog">
                </div>
                <!--text--->
                <div class="blog-text">
                    <span>@if ($post->created_at->isToday())
                        Today
                    @elseif ($post->created_at->isYesterday())
                        Yesterday
                    @else
                        {{$post->created_at->format('j F Y')}}
                    @endif / {{$post->category->name}}</span>
                    <a href="#" class="blog-title">{{$limitedTitle}}</a>
                    <p>{{$limitedDescription}}</p>
                    <div class="blog-btn-section">
                        <a href="{{route('post.show',$post->id)}}">Read More</a>
                        <p class="blog-comment"><i class="fa fa-comments"></i>{{$post->author}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        </div>
    </section>
@endsection
