@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="row tabelhed d-flex justify-content-between">
                <div class="d-flex align-items-end flex-row-reverse"></div>
                <div class="col-lg-10 col-md-10">
                    <div class="right-item d-flex justify-content-end"></div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                    New Blog
                                    </h1>
                                    
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <a href="{{route('article.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2" fdprocessedid="qcq6y">
                                        <i class="fe fe-plus mx-1 align-middle"></i>Add Article
                                    </a>
                                    <a href="{{route('article.draftedIndex')}}" class="btn btn-success btn-wave waves-effect waves-light"   >
                                        Drafted Article
                                    </a>
                                </div>
                    

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Date Published</th>
                                        <th scope="col">Article Title</th>
                                        <th scope="col">Summary</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Select Article Author</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Banner Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach($articles as $key => $article)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $article->created_at->format('d-m-Y') }}</td>
                                    <td>{{$article->article_title ?? ''}}</td>
                                    <td>{{$article->summary ?? ''}}</td>
                                    <td>{{$article->categories_name}}</td>
                                    <td>{{$article->experts->name ?? ''}}</td>
                                    <td class="{{ isset($article->status) && $article->status ? 'text-success fs-15 fw-semibold' : '' }}">
                                        {{ $article->status ?? '' }}
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('public/uploads/'.$article->banner_image) }}" alt="Image"
                                                style="width: 150px; height: 150px;">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="ri-pencil-fill lh-1"></i>
                                            </a>
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $article->id }}" data-bs-original-title="Delete" role="button">
                                                <i class="ri-delete-bin-7-line lh-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Modal -->
    @foreach($articles as $key => $article)
    <div class="modal fade" id="exampleModalToggle{{ $article->id }}" aria-labelledby="exampleModalToggleLabel{{ $article->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $article->id }}">Articles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $article->id }}" action="{{ route('article.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
