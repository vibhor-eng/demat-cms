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
                    <h4 class="card-title">Update Tag</h4>
                    <form class="forms-sample" id = "topic-update-form" action = "{{route('admin.tag.edit')}}" method = "post" enctype="multipart/form-data">
                    	@csrf

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Name <span class="text-danger">*</span></label>
                                <input type="text" name = "topic_name" class="form-control" id="topic_name" placeholder="Topic Name" value="{{old('topic_name', $existing_tag->regional_name)}}">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">English Name <span class="text-danger">*</span></label>
                                <input type="test" name = "topic_eng_name" class="form-control" id="topic_eng_name"  placeholder="Topic English Name" value="{{old('topic_eng_name', $existing_tag->english_name)}}">
                              </div>
                            </div>
                        </div>

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
                                <label for="exampleInputPassword4">Heading</label>
                                <input type="text" name = "topic_heading" class="form-control" id="topic_heading"  placeholder="Topic Heading" value="{{old('topic_heading', $existing_tag->headline)}}">
                              </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-12">
                                <label for="editor">Description</label>
                                <textarea name="topicDesc" id="editor">{{old('topicDesc', $existing_tag->description)}}</textarea>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO Title</label>
                                <input type="text" name = "topic_seo_title" class="form-control" id="topic_seo_title"  placeholder="SEO Title" value="{{old('topic_seo_title', $existing_tag->seo_title)}}">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO Description</label>
                                <input type="text" name = "topic_seo_description" class="form-control" id="topic_seo_description" placeholder="SEO Description" value="{{old('topic_seo_description', $existing_tag->seo_description)}}">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO English Keyword</label>
                                <input type="text" name = "topic_seo_eng_title" class="form-control" id="topic_seo_eng_title"  placeholder="SEO Eng Title" value="{{old('topic_seo_eng_title', $existing_tag->seo_keyword)}}">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO Regional Keywords</label>
                                <input type="text" name = "topic_seo_reg_title" class="form-control" id="topic_seo_reg_title" placeholder="SEO Description" value="{{old('topic_seo_reg_title', $existing_tag->seo_reg_keywords)}}">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO English Keyword</label>
                                <input type="text" name = "topic_seo_eng_title" class="form-control" id="topic_seo_eng_title"  placeholder="SEO Eng Title" value="{{old('topic_seo_eng_title', $existing_tag->seo_keyword)}}">
                              </div>

                              <input type="hidden" name="tag_id" value="{{ $existing_tag->id}}" />

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">SEO Regional Keywords</label>
                                <input type="text" class="form-control" name="slug" value="{{ $existing_tag->slug }}" readonly>
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


      $('#topic-update-form').validate({ // initialize the plugin
           rules: {
               topic_name: {
                   required: true,
               },
               topic_eng_name:{
                 required:true,
               }
           },
           submitHandler: function(form) {
             form.submit(); // Submit the form if valid
           }
       });

  });



  $("#createBtn").click(function() { 
	
    var engnameauthor = $("#topic_eng_name").val();
    //alert(engnameauthor);
    var ss= hasHindiCharacters(engnameauthor);
    if(ss)
    {
      alert('Please enter Author Name in English only');
      $("#topic_eng_name").focus();
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