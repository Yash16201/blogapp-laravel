@extends('layouts.app')

@section('content')

<div class="container">
    <h1>All Blogs</h1>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
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
                </tr> 
            @endforeach
            
        </tbody>
    </table>
         {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@endsection
    