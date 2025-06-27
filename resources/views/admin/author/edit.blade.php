@extends('layouts.master') 

@section('seo_title', 'Login')



@section('body_content')

<!-- partial -->
      <div class="main-panel">
        	
	          <div class="content-wrapper">
	            
	         <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  	@include('layouts.blocks.error')
                	  @include('layouts.blocks.success')
                    <h4 class="card-title">Author Create</h4>
                    <form class="forms-sample" id = "author-create-form" action = "{{route('admin.author.edit')}}" method = "post" enctype="multipart/form-data">
                    	@csrf

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author Name <span class="text-danger">*</span></label>
                                <input type="text" name = "author_name" class="form-control" id="author_name" placeholder="Author Name" value="{{old('author_name', $existing_author->regional_name)}}">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author English Name <span class="text-danger">*</span></label>
                                <input type="test" name = "author_eng_name" class="form-control" id="author_eng_name"  placeholder="Author English Name" value="{{old('author_eng_name', $existing_author->english_name)}}">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author Designation</label>
                                <input type="text" name = "author_designation" class="form-control" id="author_designation"  placeholder="Author Designation" value="{{old('author_designation', $existing_author->designation)}}">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author Email Id <span class="text-danger">*</span></label>
                                <input type="text" name = "author_email_id" class="form-control" id="author_email_id" placeholder="Author Email Id" value="{{old('author_email_id', $existing_author->email)}}">
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="author_id" value="{{ $existing_author->id}}" />
                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Channel</label>
                                <select class="form-select" name = "channel_id" id="exampleFormControlSelect2">
                                  @foreach ($channels_list as $channel_id=>$channel_name)
                                  <option value="{{ $channel_id }}" {{\Auth::user()->channel_id == $channel_id ? 'selected' : ''}}>{{ $channel_name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author Image <span class="text-danger">*</span></label>
                                <input type="file" name = "author_image" class="form-control">
                                <label class="custom-file-label" for="authorImg">No file chosen</label>
                              </div>
                              @if(isset($existing_author->image))
                                <div class="col-4">
                                    <img src="{{ $existing_author->image }}" alt="Author Image" width="140" height="100">
                                </div>
                             @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-12">
                                <label for="editor">Author Description</label>
                                <textarea name="authorDesc" id="editor">{{old('authorDesc', $existing_author->description)}}</textarea>
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Author Twitter Link</label>
                                <input type="text" name = "author_twitter_link" value = "{{old('author_twitter_link', $existing_author->twitter_link)}}" class="form-control">
                              </div>

                              <div class = "col-md-6">
                                <label class="w-100" for="authordesignation">Author Slug
                                  </label>
                                <input type="text" class="form-control" name="author_slug" value="{{ $existing_author->slug }}" readonly>
                              </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label class="w-100" for="authordesignation">Author Enable/Disable
                                  </label>
                                <input type="checkbox" class="form-check-input" id="author_status" name="author_status" {{ isset($existing_author->status) && $existing_author->status  == 1 ? "checked" : "" }}>
                              </div>

                              

                            </div>
                        </div>

                      
                      <button type="submit" id = "createBtn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

	          </div>
	          
	          @include('layouts.blocks.footer')
          
        </div>
        

@endsection

@section('footer_custom_js')
<script type="text/javascript">

  $(document).ready(function () {


      // $('#author-create-form').validate({ // initialize the plugin
      //     rules: {
      //         author_name: {
      //             required: true,
      //         },
      //         author_eng_name:{
      //           required:true,
      //         },
      //         author_email_id:{
      //           required:true,
      //           email:true
      //         },
      //     },
      //     submitHandler: function(form) {
      //       form.submit(); // Submit the form if valid
      //     }
      // });

  });

  $('#authorImg').on('change',function(){
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
  })

  $("#createBtn").click(function() { 
	
    var engnameauthor = $("#authorEnglish").val();
    //alert(engnameauthor);
    var ss= hasHindiCharacters(engnameauthor);
    if(ss)
    {
      alert('Please enter Author Name in English only');
      $("#authorEnglish").focus();
      return false;
      
    }
    else
    {
      return true;
    }
	
	});

  function hasHindiCharacters(str)
  {
      return str.split("").filter( function(char){ 
        var charCode = char.charCodeAt(); return charCode >= 2309 && charCode <=2361;
      }).length > 0;
  }
</script>
@endsection