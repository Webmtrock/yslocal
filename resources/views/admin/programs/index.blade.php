@extends('layouts.app')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">

                    <div class="col-lg-10 col-md-10">

                        <div class="right-item d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mt-auto">
                            <h5>Programs</h5>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="row float-end">
                                <div class="col-xl-12 d-flex float-end">
                                    <a href="{{ route('programs.create') }}"
                                    class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        <i class="fe fe-plus mx-1 align-middle"></i>Add Program </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table">
                        <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="width-10">S No.</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Expert</th>
                                    <th>Program Images</th>
                                    <th>Category</th>
                                    <th>Program</th>
                                    <th>Status</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>

                            @foreach($programs as $key => $program)
                            <tr data-entry-id="{{ $program->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $program->title ?? '' }}</td>
                                <td>{{ $program->rating ?? '' }}</td>
                                <td>
                                    <p> {{ $program->expert->name ?? ''}}</p>
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/'.$program->image_url) }}" target="_blank">
                                        <img src="{{ asset('uploads/'.$program->image_url) }}" alt="Image"
                                            style="max-width: 70px; max-height: 70px;">
                                    </a>
                                </td>
                                <td>
                                    <p>{{ $program->categories_name}}</p>
                                </td>
                                <td>{{ $program->program_for ?? '' }}</td>
                                <td>
                                    
                                    @if($program->status == 1)
                                    <a class="btn btn-sm btn-success-light" data-bs-toggle="modal" href="#statusModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            Approve
                                        </a>
                                    
                                    @else
                                    <a class="btn btn-sm btn-danger-light" data-bs-toggle="modal" href="#statusModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            Rejected
                                        </a>
                                

                                    @endif
                                </td>
                                <td class="">
                                    <div class="btn-list">
                                        <a href="{{ route('programs.edit', ['id' => $program->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                            <i class="ri-pencil-fill lh-1"></i>
                                        </a>
                                        <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                        </a>
                                        <a href="{{ route('programs.session.list', ['id' => $program->id]) }}" class="btn btn-success btn-wave waves-effect waves-light me-2">
                                          <i class="fe fe-plus mx-1 align-middle"></i>Program Session </a>
                                        </a>
                                        
                                        <a href="#EmbedModalToggle_{{ $program->id }}" data-bs-toggle="modal" class="btn btn-success btn-wave waves-effect waves-light me-2">
                                          Embed Code </a>
                                        </a>
                                        <a href="{{ route('batch.list', ['id' => $program->id]) }}" class="btn btn-success btn-wave waves-effect waves-light me-2">
                                          Batch </a>
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
</div>

@foreach ($programs as $program)
<div class="card-body">
    <div class="modal fade" id="statusModalToggle_{{ $program->id }}"
        aria-labelledby="statusModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="statusModalToggleLabel">Program</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change status?
                </div>
                <div class="modal-footer">
                    <form  action="{{ route('programs.status', $program->id) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#statusModalToggle_{{ $program->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($programs as $program)
<div class="card-body">
    <div class="modal fade" id="exampleModalToggle_{{ $program->id }}"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel">Program</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $program->id }}" action="{{ route('programs.delete', $program->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle_{{ $program->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($programs as $program)
<div class="card-body">
    <div class="modal fade" id="EmbedModalToggle_{{ $program->id }}"
        aria-labelledby="EmbedModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="EmbedModalToggleLabel">Embed Code</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <pre class="language-html">
                    <code class="language-html">&lt;div class="table-responsive"&gt;
    &lt;table class="table text-nowrap"&gt;
        &lt;thead class="table-success"&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;User Name&lt;/th&gt;
                &lt;th scope="col"&gt;Transaction Id&lt;/th&gt;
                &lt;th scope="col"&gt;Created&lt;/th&gt;
                &lt;th scope="col"&gt;Status&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Harshrath&lt;/th&gt;
                &lt;td&gt;#5182-3467&lt;/td&gt;
                &lt;td&gt;24 May 2022&lt;/td&gt;
                &lt;td&gt;
                    &lt;button class="btn btn-sm btn-primary-light"&gt;Pending&lt;/button&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Zozo Hadid&lt;/th&gt;
                &lt;td&gt;#5182-3412&lt;/td&gt;
                &lt;td&gt;02 July 2022&lt;/td&gt;
                &lt;td&gt;
                    &lt;button class="btn btn-sm btn-primary-light"&gt;Pending&lt;/button&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Martiana&lt;/th&gt;
                &lt;td&gt;#5182-3423&lt;/td&gt;
                &lt;td&gt;15 April 2022&lt;/td&gt;
                &lt;td&gt;
                    &lt;button class="btn btn-sm btn-danger-light"&gt;Rejected&lt;/button&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Alex Carey&lt;/th&gt;
                &lt;td&gt;#5182-3456&lt;/td&gt;
                &lt;td&gt;17 March 2022&lt;/td&gt;
                &lt;td&gt;
                    &lt;button class="btn btn-sm btn-success-light"&gt;Processed&lt;/button&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;</code></pre>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#EmbedModalToggle_{{ $program->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
