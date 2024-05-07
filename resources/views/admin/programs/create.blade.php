@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                    Create Program
                </div>
                <div class="card-body">
                    <form id="planForm" action="{{ route('programs.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" required id="title" placeholder="Enter the Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="mt-2">Select Category <span class="text-danger" >*</span></label>
                                    <select class="form-control" id="category_id" name="category_id[]" multiple data-trigger name="choices-multiple-default" placeholder="">
                                       <!-- <option value="">Select Category</option> -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) || (isset($program) && in_array($category->id, explode(',', $program->category_id))) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            @if(auth()->user()->roles->pluck('name')->first() == 'Admin')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Program Expert <span class="text-danger">*</span></label>
                                        <select class="form-control @error('expert') is-invalid @enderror" required name="expert_id" required>
                                            <option value="">Select Program Expert</option>
                                            @foreach ($experts as $expert)
                                                <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('expert')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <input type="hidden" name="expert_id" value="{{auth()->user()->id}}">
                                </div>

                            @endif
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Program Image<span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image_url"
                                    class="form-control @error('image_url') is-invalid @enderror" required id="image_url" name="image_url">
                                    @error('image_url')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <span class="text-danger">Program Image Dimensions Size 450*450</span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_url" class="mt-2">Program Image <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image_url') is-invalid @enderror" id="image_url" name="image_url">
                                        <label class="custom-file-label" for="image_url">Choose file</label>
                                    </div>
                                </div>
                                @error('image_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Video <span class="text-danger">*</span></label>
                                    <input type="file"
                                        class="form-control @error('programming_tovideo_url') is-invalid @enderror"
                                        name="programming_tovideo_url">
                                    @error('programming_tovideo_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Video Thumbnail <span class="text-danger">*</span></label>
                                    <input type="file"
                                        class="form-control @error('program_video_thumbnail') is-invalid @enderror"
                                        name="program_video_thumbnail">
                                    @error('program_video_humbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <span class="text-danger">Program Video Thumbnail Size 850*450</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Program For <span class="text-danger">*</span></label>
                                    <input type="text" required class="form-control @error('program_for') is-invalid @enderror"
                                        name="program_for" placeholder="Enter the Program For">
                                    @error('program_for')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Whatsapp Group Url <span class="text-danger"></span></label>
                                    <input type="text"  class="form-control" name="whatsapp_group_url" placeholder="Enter the Whatsapp Group Url">
                                </div>
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Intake Form Link <span class="text-danger"></span></label>
                                    <input type="text"  class="form-control" name="intake_from_link" placeholder="Enter the Intake Form Link">
                                </div>
                                </div>
                                </div>
                                <div class="row ">
                                      <div class="col-md-6">
                                     <div class="form-group">
                                    <label>Enrolled User's <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('enroll_user') is-invalid @enderror"
                                        name="enroll_user"placeholder="Enter the Enrolled User's"required >
                                    @error('enroll_user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Program Rating <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('rating') is-invalid @enderror"name="rating" required id="rating" placeholder="Enter the Rating">
                                    @error('rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <!-- <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Entry Score<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('rating') is-invalid @enderror"name="entry_score" required id="entry_score" placeholder="Enter the Entry Score">
                                    @error('entry_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="form-group col-md-6">
                                    <label for="date" class="mt-2">Program Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="program_start_date" class="form-control @error('program_start_date') is-invalid @enderror" placeholder="Program Start Date" value="{{ old('program_start_date', isset($data) ? $data->webinar_start_date : '') }}" required>
                                    @error('program_start_date')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                        </div>


                                <div class="mt-3 mb-2">  
                                     <hr class="border-dark"></div>
                            <!--  Add Plan Start   -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <div class="h6"><label>Add Plans</label></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-end">
                                            <button type="button" id="addPlan" data-count="0" class="btn btn-warning text-black">Add <span>+</span></button>
                                        </div> 
                                    </div> 
                                </div>

                                <div id="planFields">
                                        <div class="form-group mb-2 plan-group">
                                            <div>
                                                <label><b>Plan 1 </b></label>
                                            </div>
                                            <label>Enter Plan</label>
                                            <input type="text" class="form-control" name="add_plans[0]">
                                        </div>
                               
                                        <div class="form-group text-end">
                                            <button type="button" class="addPlanType btn btn-warning text-black" data-count="0">Add Plan Type <span>+</span></button>
                                        </div>
                                        <div id="planTypeFields">
                                            <div class="form-group mb-2 plan-group">
                                                <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label>
                                                <input type="text" class="form-control" name="type_plan[0][]">
                                            </div>
                                            <div class="form-group mb-2 plan-group">
                                                <label>Discount</label>
                                                <input type="text" class="form-control" name="discount[0][]">
                                            </div>
                                            <div class="form-group  plan-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control mb-3" name="price[0][]">
                                            </div>
                                        </div>
                                </div>
                            <!-- Add Plan Type End -->


                                    
                             
                         <!-- Add Faq Start -->
                         <div class="mt-3 mb-2">  
                            <hr class="border-dark"></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="h6">Add FAQs</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2 text-end">
                                        <button type="button" id="addfaq" class="btn btn-warning text-black">Add FAQ +</button>
                                    </div>
                                </div>
                            </div>
                            <div id="faqfields">
                                <div class="form-group mb-2 plan-group">
                                    <div class="input-group">
                                     
                                        <input type="text" class="form-control"  name="question[0][question]" placeholder="Question">
                                        <!-- <div class="input-group-append">
                                            <button type="button" class="btn btn-warning text-black add-answer">Add Answer +</button>
                                        </div> -->
                                    </div>
                                   <br>
                                        <textarea name="answer[0][answer]" class="ckeditor" id="ckeditor"></textarea>
                                    
                                </div>
                            </div>

                            <!------ Add Review ----->
                            <div class="row">
                                <hr class="border-dark">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="mt-2">Review Image</label>
                                    <input type="file" id="image" name="image[]" class="form-control @error('image') is-invalid @enderror" placeholder=" " value="{{ old('image', isset($data) ? $data->image : '') }}" >
                                    @error('image')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_image" type="button" class="btn btn-warning">ADD MORE Review Image </button>
                                    </div>
                                </div>
                                <div id="Addimage"></div>
                            </div>

                            <!------ End Review ------>

                            <!------ Add Review ----->
                            <div class="row">
                                <hr class="border-dark">
                                <div class="form-group col-md-4">
                                    <label for="video" class="mt-2">Review Video</label>
                                    <input type="file" id="video" name="video[]" class="form-control @error('video') is-invalid @enderror" placeholder=" " value="{{ old('video', isset($data) ? $data->video : '') }}">
                                    @error('video')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_video" type="button" class="btn btn-warning">ADD MORE Review Video </button>
                                    </div>
                                </div>
                                <div id="Addvideo"></div>
                            </div>

                            <!------ End Review ------>

                            <!------ Add Review Video Url ----->
                            <div class="row">
                                <hr class="border-dark">
                                <div class="form-group col-md-4">
                                    <label for="video_url" class="mt-2">Review Video Url</label>
                                    <input type="url" id="video_url" name="video_url_link[]" class="form-control @error('video_url_link') is-invalid @enderror" placeholder=" " value="{{ old('video_url_link', isset($data) ? $data->file : '') }}">
                                    @error('video_url_link')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_video_url" type="button" class="btn btn-warning">ADD MORE Review Video </button>
                                    </div>
                                </div>
                                <div id="AddvideoUrl"></div>
                            </div>

                            <!------ End Review ------>


                                <!-- Add FAQs  -->
                 
                         <!-- Add Faq End -->
                         <div class="mt-3 mb-2">  
                            <hr class="border-dark"></div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Program Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="program_description" class="ckeditor @error('program_description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('program_description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                


                               <div class="mt-3">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </body>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <!--  Add Plan Script Start   -->
<script>
$(document).ready(function() {
    var planCounts =  $('#addPlan').data('count');

    $('#addPlan').click(function() {
        

        var newPlanField = `<div class="form-group mb-2 plan-groups">
            <div class="form-group mb-2 plan-group">
                <div>
                    <label><b>Plan ${planCounts + 2}</b></label>
                    <button type="button" class="btn btn-danger delete-plans">Delete</button>
                </div>
                <label>Enter Plan</label>
                <input type="text" class="form-control" name="add_plans[${planCounts +1}]">
            </div>
            
            <div class="form-group text-end">
                <button type="button" class="addPlanType btn btn-warning text-black" data-count="${planCounts + 1 }">Add Plan Type <span>+</span></button>
            </div>
            <div class="planTypeFields">
                <div class="form-group mb-2 plan-group">
                    <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label>
                    <input type="text" class="form-control" name="type_plan[${planCounts + 1 }][]">
                </div>
                <div class="form-group mb-2 plan-group">
                    <label>Discount</label>
                    <input type="text" class="form-control" name="discount[${planCounts + 1}][]">
                </div>
                <div class="form-group plan-group">
                    <label>Price</label>
                    <input type="text" class="form-control mb-3" name="price[${planCounts + 1}][]">
                </div>
            </div>
        </div>`;

        $('#planFields').append(newPlanField);
        planCounts++;
    });

    // Event delegation for dynamically added elements
    $('#planFields').on('click', '.addPlanType', function() {
        var planTypeCount = ($(this).data('count'));
      
        var planTypeFields = `<div class="form-group mb-2 plan-group-plan-type">
        <div class="form-group mb-2 plan-group">
            <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label> <button type="button" class="btn btn-danger delete-plan-type">Delete</button>
            <input type="text" class="form-control" name="type_plan[${planTypeCount}][]">
        </div>
        <div class="form-group mb-2 plan-group">
            <label>Discount</label>
            <input type="text" class="form-control" name="discount[${planTypeCount}][]">
        </div>
        <div class="form-group plan-group">
            <label>Price</label>
            <input type="text" class="form-control mb-3" name="price[${planTypeCount}][]">
        </div>`;

        $(this).closest('.plan-groups').find('.planTypeFields').append(planTypeFields);
        planTypeCount++
    });

    // Event delegation for dynamically added delete buttons
    $('#planFields').on('click', '.delete-plans', function() {
        $(this).closest('.plan-groups').remove();
        planCount--; // Decrement planCount
        // Update plan numbers
        // $('.plan-group').each(function(index) {
        //     $(this).find('label:first').text('Plan ' + (index + 1));
        // });
    });
    $('#planFields').on('click', '.delete-plan-type', function() {
        $(this).closest('.plan-group-plan-type').remove();
        planCount--; // Decrement planCount
        
    });

    
});


    

</script>

 <!--  Add Plan Script End   -->


  <!--  Add Plan Type Script Start   -->
<script>
$(document).ready(function() {
            var planCount = 0;

            $('.addPlanType').click(function() {
                
           
                var newPlanField = '<div class="form-group mb-2 plan-group">';
                newPlanField += '<div><label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label> <button type="button" class="btn btn-danger delete-plan">Delete</button></div>';
                newPlanField += '<input type="text" class="form-control" name="type_plan['+planCount+'][]">';
                newPlanField += '<label>Discount</label>';
                newPlanField += '<input type="text" class="form-control" name="discount['+planCount+'][]">';
                newPlanField += '<label>Price</label>';
                newPlanField += '<input type="text" class="form-control" name="price['+planCount+'][]">';
                newPlanField += '</div>';
                $('#planTypeFields').append(newPlanField);
                planCount++;
            });

            // Event delegation for dynamically added delete buttons
            $('#planTypeFields').on('click', '.delete-plan', function() {
                $(this).closest('.plan-group').remove();
                planCount--; // Decrement planCount
                // Update plan numbers
                // $('.plan-group').each(function(index) {
                //     $(this).find('label:first').text('Plan ' + (index + 1));
                // });
            });
        });
        </script>
    <!--  Add Plan Type Script End   -->

     <!--  Add Faq Script start   -->
     
     <script>
    $(document).ready(function() {
        var planCount = 0;

        $('#addfaq').click(function() {
            planCount++;

            var newPlanField = '<div class="form-group mb-2 plan-group">';
            newPlanField += '<div style="display: flex; justify-content: space-between;">';
            newPlanField += '<button type="button" class="btn btn-danger delete-plan " style="margin:10px 10px 10px 0px; margin-right :70px;">Remove FAQ</button>';
            newPlanField += '</div>';
            newPlanField += '<div class="input-group">';
            newPlanField += '<input type="text" placeholder="Question" class="form-control" name="question['+planCount+'][question]">';
            // newPlanField += '<div class="input-group-append">';
            // newPlanField += '<button type="button" class="btn btn-warning text-black add-answer">Add Answer+</button>';
            // newPlanField += '</div>';
            newPlanField += '</div>';
            newPlanField += '<br><textarea name="answer['+planCount+'][answer]" class="ckeditor" id="ckeditor'+planCount+'"></textarea>';
           
            newPlanField += '</div>';

            $('#faqfields').append(newPlanField);
            CKEDITOR.replace('ckeditor' + planCount);
        });

        // Event delegation for dynamically added delete buttons
        $('#faqfields').on('click', '.delete-plan', function() {
            $(this).closest('.plan-group').remove();
            planCount--; // Decrement planCount
        });

        // Event delegation for dynamically added "Add Answer+" buttons
        $('#faqfields').on('click', '.add-answer', function() {
            planCount++;
            var newAnswerField = '<div class="input-group mt-2">';
            newAnswerField += '<input type="text" placeholder="Answer" class="form-control" name="answer['+planCount+'][answer]">';
            newAnswerField += '<div class="input-group-append">';
            newAnswerField += '<button type="button" class="btn btn-danger remove-answer">Remove Answer</button>';
            newAnswerField += '</div>';
            newAnswerField += '</div>';

            $(this).parent().parent().parent().append(newAnswerField);
        });

        // Event delegation for dynamically added "Remove Answer" buttons
        $('#faqfields').on('click', '.remove-answer', function() {
            $(this).parent().parent().remove();
        });
    });
</script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>


      <!--  Add Faq  Script End  -->

<script>
   $(document).ready(function() { 
    var i = 0;
    $("#add_more_image").click(function() {
        ++i;
        var newInputField = '<div class="row imageRemove mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            '<input type="file" name="image[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeYouWillLearn" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addimage").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".imageRemove").remove();
    });
});

$(document).ready(function() { 
    var i = 0;
    $("#add_more_video").click(function() {
        ++i;
        var newInputField = '<div class="row videoRemove mt-3 mb-3">' + 
            '<div class="form-group col-md-4">' +
            ' <label for="video1">Review Video </label>'+

            '<input type="file" name="video[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<button class="btn btn-danger removeYouWillLearn" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addvideo").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".videoRemove").remove();
    });
});


$(document).ready(function() { 
    var i = 0;
    $("#add_more_video_url").click(function() {
        ++i;
        var newInputField = '<div class="row videoRemoveUrl mt-3 mb-3">' + 
            '<div class="form-group col-md-4">' +
            ' <label for="video1">Review Video Url </label>'+
            '<input type="url" name="video_url_link[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<button class="btn btn-danger removeYouWillLearnUrl" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#AddvideoUrl").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearnUrl", function() {
        $(this).closest(".videoRemoveUrl").remove();
    });
});
</script>

