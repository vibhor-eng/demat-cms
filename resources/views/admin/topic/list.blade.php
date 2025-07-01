@extends('layouts.master') 

@section('seo_title', 'Login')

@section('header_custom_css')

<style>
  /*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
	
</style>

@endsection

@section('body_content')

	<div class="main-panel">

		<div class="content-wrapper">
			 <div class="col-lg-12 grid-margin stretch-card table-responsive">
                <div class="card" style = "overflow-x:auto;">
                  <div class="card-body">
                    <h4 class="card-title">Tag List</h4>

                    <!-- Search Form -->
                     
                    <form action="{{route('admin.tag.list')}}" method="get">
                      <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <select class="form-select" name = "channel" id="exampleFormControlSelect2">
                                  @foreach ($channels_list as $channel_id=>$channel_name)
                                    @if ($channel == $channel_id)
                                        <option value="{{ $channel_id }}" selected>{{ $channel_name }}</option>
                                    @else
                                        <option value="{{ $channel_id }}">{{ $channel_name }}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>

                              <div class = "col-md-6">
                                <input type="text" name = "tagSearchTerm" class="form-control" id="search"  placeholder="Search" value="{{ $tagSearchTerm ?? '' }}">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <label for="exact match">Exact Match<input type="checkbox"  value="1" name="exact_match" {{ !empty($exact_match) ? "checked" : '' }}></label>
                            </div>
                        </div>
                        <button type="submit" id = "createBtn" class="btn btn-gradient-primary me-2">Search Tags</button>
                    </form>

                    <br><br>

                    <!-- End Search Form -->

                    <table class="table table-hover" id = "tag_table">
                      <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">English Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($paginated_existing_tags as $tag) { ?>
                        <tr>
                          <td>{{ $tag->regional_name }}</td>
                          <td>{{ $tag->english_name }}</td>
                          <td>{{ $tag->slug }}</td>
                          <td>{{ $tag->creater->name }}</td>
                          <td><label class="badge badge-danger tag-delete" data-id = "{{$tag->id}}">Delete</label>&nbsp;<a href = "{{ route('admin.tag.edit', ['id' => $tag->id]) }}"><label class="badge badge-success">Edit</label></a></td>
                        </tr>
                    <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
		</div>


		@include('layouts.blocks.footer')
	</div>

@endsection

@section('footer_custom_js')
<script type="text/javascript">
	// $('table').dataTable();

new DataTable('#tag_table');

</script>
<script>
$('.tag-delete').click(function(){
  let author_id = $(this).attr('data-id');
  swal({
        title: "Are you sure?",
        text: "Your will not be able to recover this record!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },

    function(isConfirm) {
        if (isConfirm) {
            delete_tag(author_id);
        }
    });
})

function delete_tag(id){
  
    $.ajax({
      url: "{{ route('admin.tag.delete') }}",
      type: "POST",
      data:{id:id},
      success:function(resp){
        if(resp.status==true){
          swal({
                  title: 'Success',
                  text: 'Record has been deleted.',
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Ok',
                  closeOnConfirm: true
              },
               function(isConfirm) {
                    if (isConfirm) {
                       location.reload();
                    }
               });

        }
      },
         error: function (jqXHR, textStatus, errorThrown) {
             if (jqXHR.status == 500) {


        swal({
              title: 'Oops..',
              text: "Something went wromg.",
              type: 'error',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok',
              closeOnConfirm: true
          },
           function(isConfirm) {
                if (isConfirm) {
                   location.reload();
                }
           });

                
             } else {
                 console.log(jqXHR.responseText);
             }
         }
    })
  }
</script>
@endsection