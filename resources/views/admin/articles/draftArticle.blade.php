@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Drafted Article</div>
                        <div class="">
                        <a href="{{route('article.create')}}" class="btn btn-warning btn-wave waves-effect waves-light me-2 text-black">
                                    Add Article
                                </a>
                        </div>
                </div>
                    <div class="card-body">

                        <div class="card-body">
                            <div class="table">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Article Title</th>
                                            <th scope="col">Summary</th>
                                            <th scope="col">Select Category</th>
                                            <th scope="col">Select Article Author</th>
                                            <th scope="col">Banner Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($articles as $article)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$article->article_title ?? ''}}</td>
                                        <td>{{$article->summary ?? ''}}</td>
                                        <td>{{$article->category->title ?? ''}}</td>
                                        <td>{{$article->experts->name ?? ''}}</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ asset('public/uploads/'.$article->banner_image) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('public/uploads/'.$article->banner_image) }}"
                                                        alt="Image"
                                                        style="width: 60px; height: 60px; border-radius: 50%;">
                                                   
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="btn-list">
                                                <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-icon btn-primary   btn-wave  waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                    <i class="ri-pencil-fill lh-1" ></i>
                                                </a>
                                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $article->id }}" data-bs-original-title="Delete" role="button">
                                                <i class="ri-delete-bin-7-line lh-1"></i>
                                            </a>
                                            </div>
                                            <!-- <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                            <a href="{{ route('article.delete', $article->id) }}"
                                                class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#exampleModal{{ $article->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> -->
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