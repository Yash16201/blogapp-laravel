@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3>Add New Blog</h3>
    <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Blog Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" aria-describedby="helpId">
          
            <span class="invalid-feedback" role="alert">
            @error('title')
                <strong>{{ $message }}</strong>
            @enderror
            </span>
        </div>
        <div class="form-group">
          <label for="description">Blog Description</label><br>
          <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" cols="137"></textarea>
          @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="visible_from">Visible From</label>
          <input type="date" name="visible_from" id="inputdate" class="form-control @error('visible_from') is-invalid @enderror">
          @error('visible_from')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="visible_to">Visible To</label>
          <input type="date" name="visible_to" id="inputdate" class="form-control @error('visible_to') is-invalid @enderror">
          @error('visible_to')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary my-3 form-control">
    </form>
</div>
    
@endsection