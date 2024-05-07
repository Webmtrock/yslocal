@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header page-title fw-semibold fs-20 mb-0">
   Edit Program
</div>
<div class="content-wrapper">
   <div class="container mt-3 mb-3">
      <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="row mt-2">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Program Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                     id="title" placeholder="Enter the Title" value="{{ $program->title }}">
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
                     <select class="form-control @error('expert_id') is-invalid @enderror" name="expert_id" >
                        <option value="">Select Program Expert</option>
                        @foreach ($experts as $expert)
                        <option value="{{ $expert->id }}" {{ $program->expert_id == $expert->id ? 'selected' : '' }}>
                        {{ $expert->name }}</option>
                        @endforeach
                     </select>
                     @error('expert_id')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
            @else
                  <input type="hidden" name="expert_id" value="{{auth()->user()->id}}">
            @endif





            <div class="col-md-6">
               <div class="form-group mb-2">
                  <label>Program For <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('program_for') is-invalid @enderror" name="program_for"
                     value="{{ $program->program_for }}">
                  @error('program_for')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <div class="form-group mb-2">
                  <label>Whatsapp Group Url <span class="text-danger"></span></label>
                  <input type="text" class="form-control"
                     name="whatsapp_group_url" value="{{ $program->whatsapp_group_url }}">
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group mb-2">
                  <label>Intake Form Link <span class="text-danger"></span></label>
                  <input type="text" class="form-control"
                     name="intake_from_link" value="{{ $program->intake_from_link }}">
               </div>
            </div>
         </div>
         <div class="row mt-2">
         <div class="col-md-6">
            <div class="form-group mb-2">
               <label>Enrolled Users <span class="text-danger">*</span></label>
               <input type="text" class="form-control @error('enroll_user') is-invalid @enderror" name="enroll_user"
                  value="{{ $program->enroll_user }}">
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
               <input type="text" class="form-control @error('rating') is-invalid @enderror" name="rating"
                  id="rating" placeholder="Enter the Rating" value="{{ $program->rating }}">
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
               <input type="text" class="form-control @error('entry_score') is-invalid @enderror" name="entry_score"
                  id="entry_score" placeholder="Enter the Entry Score" value="{{ $program->entry_score }}">
               @error('rating')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div> -->
         <div class="col-md-6">
            <div class="form-group">
               <label for="date" class="mt-2">Program Start Date <span class="text-danger">*</span></label>
               <input type="date" name="program_start_date" class="form-control @error('program_start_date') is-invalid @enderror" placeholder="Program Start Date" value="{{ old('program_start_date', isset($program) ? $program->program_start_date : '') }}" required>
                  @error('program_start_date')
                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                           {{ $message }}
                        </span>
                  @enderror
            </div>
         </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Program Image <span class="text-danger">*</span></label>
                  <input type="file" class="form-control @error('image_url') is-invalid @enderror"
                     name="image_url">
                     <span class="text-danger">Program Image Dimensions Size 450*450</span>
                  @error('image_url')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                 
                  @enderror
                  @if ($program->image_url)
                  <div class="mt-2">
                     <p>Program Image:</p>
                     
                     <img src="{{ asset('uploads/' . $program->image_url) }}" alt="Current Image"
                        style="max-width: 200px;"><strong class="removeImage" data-id="{{$program->id}}" data-type="image_url"  style="color:red; margin-left: -12px; position: absolute; cursor: pointer;">X</strong>
                  </div>
                  @endif
               </div>
               
            </div>
            <div class="col-md-6">
               <div class="form-group mb-2">
                  <label>Program Video <span class="text-danger">*</span></label>
                  <input type="file" class="form-control @error('programming_tovideo_url') is-invalid @enderror"
                     name="programming_tovideo_url">
                     <span class="text-danger">Program Video Dimensions Size 850*450</span>
                  @error('programming_tovideo_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  @if ($program->programming_tovideo_url)
                  <div class="mt-2 mb-2">
                     <p>Program Video:</p>
                     <video width="200" height="160" controls>
                        <source src="{{ asset('uploads/videos/' . $program->programming_tovideo_url) }}"
                           type="video/mp4">
                        Your browser does not support the video tag.
                     </video><strong class="removeImage" data-id="{{$program->id}}" data-type="video_url"  style="color:red; margin-left: -12px; position: absolute; cursor: pointer;">X</strong>
                  </div>
                  @endif
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group mb-2"> 
                  <label>Program video Thumbnail <span class="text-danger">*</span></label>
                  <input type="file" class="form-control @error('program_video_thumbnail') is-invalid @enderror"
                     name="program_video_thumbnail">
                     <span class="text-danger">Program video Thumbnail Size 850*450</span>
                     @error('program_video_thumbnail')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  @if ($program->program_video_thumbnail)
                  <div class="mt-2">
                     <p>Program video Thumbnail :</p>
                     
                     <img src="{{ asset('uploads/videos/' . $program->program_video_thumbnail) }}" alt="Current Image"
                        style="max-width: 200px;"><strong class="removeImage" data-id="{{$program->id}}" data-type="image_url"  style="color:red; margin-left: -12px; position: absolute; cursor: pointer;">X</strong>
                  </div>
                  @endif
               </div>
            </div>
         </div>
         <div class="mt-3 mb-2">
           
         </div>
         <!--  Update Plan Start   -->
         <div class="row">
            <div class="col-md-6">
               <div class="form-group mb-2">
                  <div class="h6"><label>Add Plans</label></div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group text-end">
                  <button type="button" id="addPlan" data-count="{{count($plans)}}" class="btn btn-warning text-black">Add <span>+</span></button>
               </div>
            </div>
         </div>
         <div id="planFields">

               @foreach($plans as $key => $plan)
                  @if($key > 0)
                     <div class="form-group mb-2 plan-groups">
                  @else
                     <div class="form-group mb-2 ">
                  @endif
                        <div>
                           <label><b>Plan {{ $key + 1 }} </b></label>
                           @if($key > 0)
                              <button type="button" class="btn btn-danger delete-plans">Delete</button>
                           @endif
                        </div>
                           <label>Enter Plan</label>
                           <input type="text" class="form-control" name="add_plans[{{ $key }}]" value="{{ isset($plan['add_plans']) ? $plan['add_plans'] : '' }}">
                        <div class="form-group text-end">
                           <button type="button" class="addPlanTypes btn btn-warning text-black" data-id="{{$key}}" data-count="{{$key}}">Add Plan Type <span>+</sapn></button>
                        </div>
                        <div classs="planTypeFields">
                           <div class="form-group mb-2 plan-group-plan-type">
                                 @foreach($plan->getProgramPlantype as $keys => $plantype)
                                    <div class="form-group mb-2 plan-group_{{ $keys }}">
                                       <div>
                                          @if($keys > 0)
                                          <button type="button" class="btn btn-danger delete-plan-type" data-count="{{ $keys }}">Delete</button>
                                          @endif
                                       </div>
                                       <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label>
                                       <input type="text" class="form-control mb-2" name="type_plan[{{ $key }}][]" value="{{ isset($plantype['type_plan']) ? $plantype['type_plan'] : '' }}">
                                    
                                    <div class="form-group mb-2">
                                       <label>Discount</label>
                                       <input type="text" class="form-control mb-2" name="discount[{{ $key }}][]" value="{{ isset($plantype['discount']) ? $plantype['discount'] : '' }}">
                                    </div>
                                    <div class="form-group">
                                       <label>Price</label>
                                       <input type="text" class="form-control mb-2" name="price[{{ $key }}][]" value="{{ isset($plantype['price']) ? $plantype['price'] : '' }}">
                                    </div>
                                    </div>
                                 @endforeach
                              <div class="firstappend_{{$key}}"></div>
                           </div>
                        </div>
                     </div>
               @endforeach
         </div>
         <!--  Update Plan type End   -->

         <!-- Update Add Faq start -->
         <div class="form-group mb-2 text-end">
            <button type="button" id="addfaq" class="btn btn-warning text-black">Add FAQ +</button>
         </div>
         <div id="faqfields">
            <label><b>Add FAQs</b></label>
            @foreach($addfaqs as $keys => $addfaq)
            <div class="form-group mb-2 plan-group faq_{{$addfaq->id}}">
               <div>
                
                  @if($keys > 0)
                  <button type="button" class="btn btn-danger remove-faq" data-id="{{$addfaq->id}}">Delete</button>
                  @endif
               </div>
               <div class="input-group">
                  <input type="text" class="form-control mb-2" name="question[{{ $keys }}][question]" value="{{ isset($addfaq['question']) ? $addfaq['question'] : '' }}">
                  <!-- <div class="input-group-append">
                     <button type="button" class="btn btn-warning text-black add-answer">Add Answer+</button>
                  </div> -->
               </div><br>
               <textarea name="answer[{{ $keys }}][answer]" class="ckeditor" id="ckeditor{{$keys}}">{{ isset($addfaq['answer']) ? $addfaq['answer'] : '' }}</textarea>
             
            </div>
            @endforeach
         </div>
         <!-- Update Add Faq  End -->
         <!-- Review Add Iamge  End -->
         <div class="row">
           
            <div class="form-group col-md-6">
               <label for="image" class="mt-2">Review Image<span class="text-danger">*</span></label>
               <!--  <input type="file" id="image" name="image[]" class="form-control @error('image') is-invalid @enderror" placeholder=" " value="{{ old('image', isset($data) ? $data->image : '') }}" >
               @error('image')
               <span class="invalid-feedback form-invalid fw-bold" role="alert">
                     {{ $message }}
               </span>
               @enderror  -->
            </div>
            <div class="form-group col-md-6">
               <div class="d-flex justify-content-end">
               <button id="add_more_image" type="button" class="btn btn-warning">ADD MORE Review Image</button>
               </div>
            </div>
            <div id="Addimage"></div>
         </div>
         <div class="form-group col-md-6">
            @foreach($addimages as $keys => $addimage)
            <div class="RemoveImageRomve" data-row="{{ $keys }}">
               <label for="image" class="mt-2">Review Image<span class="text-danger">*</span></label>
               <input type="file" name="image[{{ $keys }}][image]" class="form-control @error('image') is-invalid @enderror" placeholder=" " value="{{ old('image', isset($addimage) ? $addimage->image : '') }}">
               @error('image')
               <span class="invalid-feedback form-invalid fw-bold" role="alert">
                     {{ $message }}
               </span>
               @enderror
               <div class="form-group col-md-6">
               @if(isset($addimage->file))
                     <img src="{{ asset(url('uploads/'.$addimage->file)) }}" alt="Current Image" style="max-width: 200px;">
               @endif
              
                     <div style="float: inline-end;padding-top: 26px;padding-right: 45px;">
                        <button type="button" class="btn btn-danger removeReviev" data-id="{{$addimage->id}}">Remove</button>
                     </div>
               </div>
            </div>
            @endforeach
         </div>

        <!-- Review End Iamge  End -->
        <!-------Review Video/// -->
        <br><br><br>
         <div class="">
               <div class="col-md-6">
                  <label for="image" class="mt-2">Review Video<span class="text-danger">*</span></label>
               </div>
               
               <div class="col-md-12">
                  <div class="d-flex justify-content-end">
                     <button id="add_more_video" type="button" class="btn btn-warning">ADD MORE Review Video</button>
                  </div>
               </div>
            <div id="AddVideo"></div>
         </div>
         
            @foreach($addvideos as $keys => $addvideo)
            <div class="row RemoveVideoRomve" data-row="{{ $keys }}">
               <div class="form-group col-md-4" >
                  <label for="video" class="mt-2">Review Video<span class="text-danger">*</span></label>
                  <input type="file" name="video[]" class="form-control @error('video') is-invalid @enderror" placeholder=" " value="{{ old('video', isset($addvideo) ? $addvideo->video : '') }}">
                  @error('video')
                  <span class="invalid-feedback form-invalid fw-bold" role="alert">
                        {{ $message }}
                  </span>
                  @enderror
                  @if(isset($addvideo->file))
                  <video width="200" height="160" controls>
                  <source src="{{ asset(url('uploads/'.$addvideo->file)) }}" type="video/mp4" style="max-width: 200px;">
                           </video>
               
                        
                  @endif
               </div>
               <div class="form-group col-md-4 mt-4" >
                    <button type="button" class="btn btn-danger removeReviev" data-id="{{$addvideo->id}}">Remove</button>
               </div>
            </div>
            @endforeach
        
         <!-- Review End Video  End -->

               <!-------Review Video/// -->
        <br><br><br>
         <div class="row">
               <div class="form-group col-md-6">
                  <label for="image" class="mt-2">Review Video Url<span class="text-danger">*</span></label>
               </div>
               <div class="form-group col-md-6">
                  <div class="d-flex justify-content-end">
                  <button id="add_more_video_url" type="button" class="btn btn-warning">ADD MORE Review Video Url</button>
                  </div>
               </div>
            <div id="AddVideoUrl"></div>
         </div>
         
            @foreach($addvideosuRL as $keys => $url)
            <div class="row RemoveVideoRomveUrl" data-row="{{ $keys }}">
               <div class="form-group col-md-4" >
                  <label for="video" class="mt-2">Review Video Url<span class="text-danger">*</span></label>
                  <input type="url" name="video_url_link[]" class="form-control @error('video_url_link') is-invalid @enderror" placeholder=" " value="{{ $url->file ?? '' }}">
                  @error('video')
                  <span class="invalid-feedback form-invalid fw-bold" role="alert">
                        {{ $message }}
                  </span>
                  @enderror
               </div>
               <div class="form-group col-md-4 mt-4" >
                    <button type="button" class="btn btn-danger removeVideoUrl" data-id="{{$url->id}}">Remove</button>
               </div>
            </div>
            @endforeach
        
         <!-- Review End Video  End -->


         
       
         <div class="row">
            <div class="form-group">
               <label for="name" class="mt-2">Program Description <span class="text-danger">*</span></label>
               <textarea name="program_description" class="ckeditor @error('program_description') is-invalid @enderror" id="ckeditor">{{ $program->program_description }}</textarea>
               @error('program_description')
               <span class="invalid-feedback form-invalid fw-bold" role="alert">
               {{ $message }}
               </span>
               @enderror
            </div>
         </div>
         <div class="row mt-5">
            <div class="col">
               <input class="btn btn-primary" type="submit" value="Update">
               <td> 
                  @if(isset($program))
                     <a href="{{ route('user.program', ['id' => $program->id]) }}" class="btn bg-secondary text-white ml-3">Preview</a>
                  @endif
               </td>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--  Update Plan Script Start   -->
<script>
   $(document).ready(function() {
      var planCounts =  $('#addPlan').data('count');
       $('#addPlan').click(function() {
          
           
           
           var newPlanField = `<div class="form-group mb-2 plan-groups">
            <div class="form-group mb-2 plan-group">
                <div>
                    <label><b>Plan ${planCounts +1}</b></label>
                    <button type="button" class="btn btn-danger delete-plans">Delete</button>
                </div>
                <label>Enter Plan</label>
                <input type="text" class="form-control" name="add_plans[${planCounts}]">
               <div class="form-group text-end">
                  <button type="button" class="addPlanType btn btn-warning text-black" data-count="${planCounts}">Add Plan Type <span>+</span></button>
               </div>
               <div class="planTypeFields">
                  <div class="form-group mb-2 plan-group">
                     <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label>
                     <input type="text" class="form-control" name="type_plan[${planCounts}][]">
                  </div>
                  <div class="form-group mb-2 plan-group">
                     <label>Discount</label>
                     <input type="text" class="form-control" name="discount[${planCounts }][]">
                  </div>
                  <div class="form-group plan-group">
                     <label>Price</label>
                     <input type="text" class="form-control mb-3" name="price[${planCounts }][]">
                  </div>
               </div>
        </div>`;
          $('#addPlan').data('count', planCounts);
          $('#planFields').append(newPlanField);
          planCounts++;
       });
   
       // Event delegation for dynamically added delete buttons

       $('#planFields').on('click', '.delete-plans', function() {
         $(this).closest('.plan-groups').remove();
         planCounts--; // Decrement planCounts
      
      });
      $('#planFields').on('click', '.delete-plan-type', function() {
         var dataId = ($(this).data('count'));
         $(this).closest('.plan-group_'+dataId).remove();
         planCounts--; // Decrement planCount
         
      });
     
   });
     
      
</script>
<!--  Update Plan Script End   -->
<!--  Update Plan Type Script Start   -->
<script>
   $(document).ready(function() {
      var planCount = 0;

      $('#planFields').on('click', '.addPlanType', function() {
         var planTypeCount = ($(this).data('count'));
         var planTypeFields = 
           `<div class="form-group mb-2 plan-group-plan-type">
               <div class="form-group mb-2 plan-group">
                     <label>Enter Plan Type<span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label> <button type="button" class="btn btn-danger delete-plan-type">Delete</button>
                     <input type="text" class="form-control" name="type_plan[${planTypeCount}][]">
               </div>
               <div class="form-group mb-2 plan-group">
                     <label>Discount</label>
                     <input type="text" class="form-control" name="discount[${planTypeCount}][]">
               </div>
               <div class="form-group plan-group">
                     <label>Price</label>
                     <input type="text" class="form-control mb-3" name="price[${planTypeCount}][]">
               </div>
            </div>`;
         $(this).closest('.plan-groups').find('.planTypeFields').append(planTypeFields);
         planTypeCount++
      });
   
      // Event delegation for dynamically added delete buttons
      $('.planTypeFields').on('click', '.delete-plan', function() {
            var dataId = ($(this).data('count'));
            $(this).closest('.plan-group_'+dataId).remove();
            planCount--; // Decrement planCount
      });

      $('#planFields').on('click', '.delete-plan-type', function() {
         $(this).closest('.plan-group-plan-type').remove();
         planCount--; // Decrement planCount
         
      });
   });
           
           
</script>

<script>
$(document).ready(function() {
            var planCount = 0;

            $(document).on('click','.addPlanTypes',function() {
             var append_id = ($(this).data('id'));
             var planTypeCount = ($(this).data('count'));
             
                var newPlanField = 
                `<div class="form-group mb-2 plan-group_${planTypeCount}">
                  <div>
                     <label>Enter Plan Type <span style="color:#ff0000">(Please enter Individual OR Number Only)</span></label> 
                     <button type="button" class="btn btn-danger delete-plan" data-count="${planTypeCount}">Delete</button>
                  </div>
                  <input type="text" class="form-control" name="type_plan[${planTypeCount}][]">
                  <label>Discount</label>
                  <input type="text" class="form-control" name="discount[${planTypeCount}][]">
                  <label>Price</label>';
                  <input type="text" class="form-control" name="price[${planTypeCount }][]">
               </div>`;
                $('.firstappend_'+append_id).append(newPlanField);
                planTypeCount++;
            });

            // Event delegation for dynamically added delete buttons
            $('.firstappend').on('click', '.delete-plan', function() {
                $('.plan-group').each(function(index) {
                    $(this).find('label:first').text('Plan ' + (index + 1));
                });
                planCount--; // Decrement planCount

            });
        });
   $(document).ready(function() {
       var planCount = 0;
   
       $('#addfaq').click(function() {
           planCount++;
   
           var newPlanField = '<div class="form-group mb-2 plan-group faq_'+planCount+'">';
           newPlanField += '<div style="display: flex; justify-content: space-between;">';
           newPlanField += '<button type="button" class="btn btn-danger remove-faq" data-id="'+planCount+'" style="margin:10px 10px 10px 0px; margin-right :70px;">Remove FAQ</button>';
           newPlanField += '</div>';
           newPlanField += '<div class="input-group">';
           newPlanField += '<input type="text" placeholder="Question" class="form-control" name="question['+planCount+'][question]">';
         //   newPlanField += '<div class="input-group-append">';
         //   newPlanField += '<button type="button" class="btn btn-warning text-black add-answer">Add Answer+</button>';
         //   newPlanField += '</div>';
           newPlanField += '</div>';
           newPlanField += '<br><textarea name="answer['+planCount+'][answer]" class="ckeditor" id="ckeditor'+planCount+'"></textarea>';
           newPlanField += '</div>';
   
           $('#faqfields').append(newPlanField);
           CKEDITOR.replace('ckeditor' + planCount);
       });
   
       // Event delegation for dynamically added delete buttons
       $('#faqfields').on('click', '.remove-faq', function() {
           var  dataId = ($(this).data('id'));
           $(this).closest('.faq_'+dataId).remove();
           planCount--; // Decrement planCount
       });
   
       // Event delegation for dynamically added "Add Answer+" buttons
      //  $('#faqfields').on('click', '.add-answer', function() {
      //      var newAnswerField = '<div class="input-group mt-2">';
      //      newAnswerField += '<input type="text" placeholder="Answer" class="form-control" name="discount[]">';
      //      newAnswerField += '<div class="input-group-append">';
      //      newAnswerField += '<button type="button" class="btn btn-danger remove-answer">Remove Answer</button>';
      //      newAnswerField += '</div>';
      //      newAnswerField += '</div>';
   
      //      $(this).parent().parent().append(newAnswerField);
      //  });
   
       // Event delegation for dynamically added "Remove Answer" buttons
      //  $('#faqfields').on('click', '.remove-answer', function() {
      //      $(this).parent().parent().remove();
      //  });
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
<!--  Update Add faq Script End   -->
<!--  Review  Add Image Script End   -->
<script>
   $(document).ready(function() { 
    var image = 1;
    $("#add_more_image").click(function() {
      image++;
        var newInputField = '<div class="RemoveImageRomve mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            ' <label for="image1">Review Image </label>'+
            '<input type="file" name="image[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeImage" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addimage").append(newInputField);
    });
    $("body").on("click", ".removeImage", function() {
        $(this).closest(".RemoveImageRomve").remove();
    });
});

$(document).ready(function() { 
    var video = 1;
    $("#add_more_video").click(function() {
      video++;
        var newInputField = '<div class="row RemoveVideoRomve mt-3 mb-3">' + 
            '<div class="form-group col-md-4">' +
            ' <label for="video1">Review Video </label>'+
            '<input type="file" name="video[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-4 mt-4">' +
            '<button class="btn btn-danger removeVideo" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#AddVideo").append(newInputField);
    });
    $("body").on("click", ".removeVideo", function() {
        $(this).closest(".RemoveVideoRomve").remove();
    });
});


$(document).ready(function() { 
    var video = 1;
    $("#add_more_video_url").click(function() {
      video++;
        var newInputField = '<div class="row RemoveVideoRomveUrl mt-3 mb-3">' + 
            '<div class="form-group col-md-4">' +
            ' <label for="video1">Review Video Url </label>'+
            '<input type="url" name="video_url_link[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-4 mt-4">' +
            '<button class="btn btn-danger removeVideoUrl" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#AddVideoUrl").append(newInputField);
    });
    $("body").on("click", ".removeVideoUrl", function() {
        $(this).closest(".RemoveVideoRomveUrl").remove();
    });
});
</script>
<script>
   $(document).ready(function() {
        $('.removeReviev').click(function(){
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{route('remove_review_image')}}",
                data: { 
                imageId: id 
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });
      });
      $(document).ready(function() {
        $('.removeImage').click(function(){
            var id = $(this).data('id');
            var typefile = $(this).data('type');
            $.ajax({
                type: "get",
                url: "{{route('program_remove_file')}}", // Replace "remove_image.php" with the URL of your server-side script to handle image removal
                data: { 
                  type:typefile,
                imageId: id // Pass the ID of the image to be removed
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });
   

      

    });
</script>
<!--  Review  End Image Script End   -->
