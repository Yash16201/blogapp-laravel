@extends('layouts.app')

@section('content')

<div class="container my-5">
    @foreach($blog_fetch as $blog)
        <b style="font-weight: bold;">Title :- </b> {{ $blog->blog_title }}  <br>
        <b style="font-weight: bold;">Description :- </b> {{ $blog['detail']->post_text }} <br>
        <b style="font-weight: bold;">Image :- </b> <br>
            <img src={{ asset('public/Image/' . $blog['detail']->blog_attachment_1) }} class="img-fluid"/>
    @endforeach
</div>

@endsection

