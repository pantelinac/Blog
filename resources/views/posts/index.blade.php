@extends('main')

@section('title', '|All Posts')

@section('content')

<div class="row"><!-- start or row 1 -->
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div><!-- end of row 1 -->

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th></th>
            </thead>

            <tbody>

                @foreach ($posts as $post)

                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ str_limit(strip_tags($post->body), 50) }}</td>
                    <!-- {{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." :""}}  
                    replaced with Laravel code for that-->
                    <td>{{ date('j M Y  G:i', strtotime($post->created_at)) }}</td>
                    <td><a href="{{ route('posts.show', $post->id) }}" 
                           class="btn btn-default btn-sm btn-info">View</a><a 
                           href="{{ route('posts.edit', $post->id) }}" 
                           class="btn btn-default btn-sm btn-warning">Edit</a></td>
                </tr>

                @endforeach

            </tbody>
        </table>
        
        <div class="text-center">
            {!! $posts->links() !!}
        </div>
    </div>
</div>
@endsection