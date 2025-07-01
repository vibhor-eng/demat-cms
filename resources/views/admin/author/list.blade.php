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
                    <h4 class="card-title">Author List</h4>
                    
                    <!-- Search Form -->
                     
                    <form action="{{route('admin.author.list')}}" method="get">
                      <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-4">
                                <select class="form-select" name = "channel" id="exampleFormControlSelect2">
                                  @foreach ($channels_list as $channel_id=>$channel_name)
                                    @if ($default_channel_id == $channel_id)
                                        <option value="{{ $channel_id }}" selected>{{ $channel_name }}</option>
                                    @else
                                        <option value="{{ $channel_id }}">{{ $channel_name }}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>

                              <div class = "col-md-4">
                                <select class="form-select" id="author_status" name="author_status">
                                  <option value="1" @if(request()->author_status == '1') selected @endif>Active</option>
                                  <option value="0" @if(request()->author_status == '0') selected @endif>Inactive</option>
                                </select>
                              </div>

                              <div class = "col-md-4">
                                <input type="search" class="form-control" id="authorSearchTerm" name="keyword"  value="{{app('request')->input('keyword')}}" placeholder="Search">
                              </div>


                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-gradient-primary me-2">Search Authors</button>

                        <a href = "{{route('admin.author.list')}}"><button type="button" class="btn btn-gradient-danger me-2">Reset</button></a>

                    </form>

                    <br><br>

                    <!-- End Search Form -->

                    <table class="table table-hover" id = "author_table">
                      <thead>
                        <tr>
                          <!-- <th>Patient Id</th> -->
                          <th>Name</th>
                          <th>Email</th>
                          <!-- <th>Age</th> -->
                          <th>Slug</th>
                          <th>Role</th>
                          <th>Channel</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($paginated_existing_authors as $author) { ?>
                        <tr>
                          <td>{{ $author->regional_name }}</td>
                          <td>{{ $author->email }}</td>
                          <td>{{ $author->slug }}</td>
                          <td>{{ $author->designation }}</td>
                          <td>{{ getChannelLabelName($author->  channel_id) ?? 'N/A' }}</td>
                          <td><label class="badge badge-danger author-delete" data-id = "{{$author->id}}">Delete</label>&nbsp;<a href = "{{ route('admin.author.edit', ['id' => $author->id]) }}"><label class="badge badge-success">Edit</label></a></td>
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

new DataTable('#author_table');

</script>
<script>
$('.author-delete').click(function(){
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
            delete_author(author_id);
        }
    });
})

function delete_author(id){
  
    $.ajax({
      url: "{{ route('admin.author.delete') }}",
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