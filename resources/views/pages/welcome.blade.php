@extends('main')    

<!--partials za pupup block stylesheet, deo koda izmedju
section i endsection se ubacuje na main.blade u delu section('stylesheet')
i pokrece skriptu samo na ovoj stranici-->

<!--@section('stylesheets')
<link rel="stylesheets" type="text/css" href="styles.css">
@endsection-->
@section('title','| Homepage')

@section('content')       
<div class ="row">
    <div class ="col-md-12">
        <div class="jumbotron">
            <h1>Welcome to my blog!</h1>
            <p class ="lead">Thank you so much for visiting.This is my test website build with Laravel.Please read my popular post.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
        </div>
    </div>
</div><!--end of row-->

<div class ="row">
    <div class="col-sm-8">
        
        @foreach($posts as $post)
        
        <div class ="post">
            <h3>{{ $post->title}}</h3>
            <p>{{ substr(strip_tags($post->body), 0, 300)}}
               {{ strlen(strip_tags($post->body)) > 300 ? "..." : ""}}.</p>
            <a href ="{{ url('blog/'.$post->slug) }}" class ="btn btn-primary">Read More</a>
        </div><!--end of post loop-->
 
        <hr>
        
        @endforeach
    </div>
    
    <div class="col-sm-3 col-sm-offset-1">
        <h2>Sidebar</h2>
    </div>
</div><!--end of row-->
@endsection

@section('scripts')
<script>
//    confirm('Welome for the first time on my blog!');
</script>
@endsection