@extends('layouts.app')

@section('content')

<div class="container">
    <h1>My Blogs</h1>
    <div class="row my-5">
      <div class="col-md-10">
        <input type="search" class="form-control" placeholder="Search Here"  name="search" id="search">
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary float-end" href="{{ route('add') }}" role="button"> Add New </a>
      </div>
    </div>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td width="20%">
                       <p>{{ $blog->blog_title }}</p>
                    </td>
                    <td width="50%">
                        <p>{{ $blog['detail']->post_text }}</p>
                    </td>
                    <td width="30%">
                            <a class="btn btn-success" href="" role="button">View </a>
                            <a class="btn btn-primary mx-2" href="" role="button">Edit</a> 
                            <a class="btn btn-danger" href="" role="button">Delete</a>
                    </td>
                </tr> 
                {{-- @empty
                <tr>
                    <td colspan="3">There are no users.</td>
                </tr> --}}
            @endforeach
        </tbody>
    </table>
    {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
    
@endsection