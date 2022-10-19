@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3>Edit Blog</h3>
    @foreach($blog_fetch as $blog)
        <form action="{{ url('/update/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
    @endforeach
        @csrf
        @foreach($blog_fetch as $blog)
        
            <div class="form-group">
            <label for="title">Blog Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $blog->blog_title }}" aria-describedby="helpId">
            
                <span class="invalid-feedback" role="alert">
                @error('title')
                    <strong>{{ $message }}</strong>
                @enderror
                </span>
            </div>
            <div class="form-group">
            <label for="description">Blog Description</label><br>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" cols="137"> {{ $blog['detail']->post_text }} </textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
            <label for="image">Image :-</label><br>
            <img src={{ asset('public/Image/' . $blog['detail']->blog_attachment_1) }} class="img-fluid"/> <br>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
            <label for="visible_from">Visible From</label>
            <input type="date" name="visible_from" id="inputdate" value={{ strftime('%Y-%m-%d', strtotime($blog['detail']->visible_from)) }} class="form-control @error('visible_from') is-invalid @enderror">
            @error('visible_from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
            <label for="visible_to">Visible To</label>
            <input type="date" name="visible_to" id="inputdate" value={{ strftime('%Y-%m-%d', strtotime($blog['detail']->visible_to)) }} class="form-control @error('visible_to') is-invalid @enderror">
            @error('visible_to')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <input type="submit" name="submit" class="btn btn-primary my-3 form-control">
        @endforeach
    </form>
</div>
    
@endsection