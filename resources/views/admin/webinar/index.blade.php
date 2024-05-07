@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(Session::has('success'))
        @section('scripts')
        <script>
        swal("Good job!", "{{ Session::get('success') }}", "success");
        </script>
        @endsection
        @endif

        @if(Session::has('error'))
        @section('scripts')
        <script>
        swal("Oops...", "{{ Session::get('error') }}", "error");
        </script>
        @endsection
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">
                    <!-- <div class="col-lg-2 col-md-2 col-sm-2 d-flex">

                        <a href="{{route('webinars.create')}}" class="btn btn-primary btn btn-lg">
                            <i class="fe fe-plus mx-1 align-middle"></i>Add Webinar
                        </a>
                    </div> -->


                    <div class="col-lg-10 col-md-10">
                        <div class="right-item d-flex justify-content-end">

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                    <h5>Events</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('webinars.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                    <i class="fe fe-plus mx-1 align-middle"></i>Add Event </a>
                                            
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
                                            <th scope="col">Id</th>
                                            <th scope="col">Event Images </th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Event Types </th>
                                            <th scope="col">Event Date </th>
                                            <th scope="col">Event Start Time </th>
                                            <th scope="col">Expert Name</th>
                                            <th scope="col">Status</th>
                                            <!-- <th scope="col">Category</th>
                                           <th scope="col">Expert Description </th> -->
                                            
                                            
                                            
                                            
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    @foreach($wibineruser as $key => $value)
                                <tr data-entry-id="{{ $value->id }}">
                                    <td>{{ $value->id ?? '' }}</td>
                                    <td>
                                    @if(!empty($value->webinar_image))
                                        <div class="mt-3">
                                            <span class="pip" data-title="{{$value->webinar_image}}">
                                                <img src="{{ url(config('app.webinar_image')).'/'.$value->webinar_image ?? '' }}" alt="" width="75" height="75">
                                            </span> 
                                        </div>
                                    @endif
                                     </td>
                                    <td>{{ $value->webinar_title ?? '' }}</td>
                                    <td>{{ $value->webinar_event_type ?? '' }}</td>
                                    <td>{{ isset($value->webinar_start_date) ? \Carbon\Carbon::parse($value->webinar_start_date)->format('d F Y') : '' }}</td>
                                    <td>{{ $value->start_time ?? '' }}</td>
                                    <td><p>{{ $value->expert->name ?? ''}}</p> </td>
                                    <td  class=" {{ $value->status == '1' ? 'text-success fs-15 fw-semibold' :'text-danger fs-15 fw-semibold '}}">
                                            {{ $value->status == '1' ? 'Publish' : 'Unpublish ' }}
                                        </td>
                                    <!-- <td>{{ $value->categories_name }}</td>
                                    <td>{{ $value->description ?? '' }}</td> -->
                                    
                                    
                                   
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('webinars.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                <i class="ri-pencil-fill lh-1" ></i>
                                            </a>
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                            </a> 
                                            <a href="#EmbedModalToggle_{{ $value->id }}" data-bs-toggle="modal" class="btn btn-success btn-wave waves-effect waves-light me-2">
                                            Embed Code </a>
                                            <a href="{{route('webinar.session_list',$value->id)}}"  class="btn btn-success btn-wave waves-effect waves-light me-2">
                                            Session </a>
                                           
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
    @foreach($wibineruser as $key => $value)
<div class="card-body">                             
<div class="modal fade" id="exampleModalToggle_{{ $value->id }}"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel">Event
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete
            </div>
            <div class="modal-footer">
            <form id="deleteForm{{ $value->id }}" action="{{ route('webinars.destroy', $value->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form>

                <button class="btn btn-primary"
                    data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal">close</button>
            </div>
        </div>
    </div>
    </div>
    @endforeach
</div>

@foreach ($wibineruser as $program)
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
                <pre class="language-html"><code class="language-html">&lt;div class="table-responsive"&gt;
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