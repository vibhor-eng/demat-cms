@extends('layouts.master') 

@section('seo_title', 'Login')



@section('body_content')

<!-- partial -->
    	<div class="main-panel">

		<div class="content-wrapper">
			 <div class="col-lg-12 grid-margin stretch-card table-responsive">
                <div class="card" style = "overflow-x:auto;">
                  <div class="card-body">
                    <h4 class="card-title">Article List</h4>
                    <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                    </p>
                    <table class="table table-hover" id = "example">
                      <thead>
                        <tr>
                          <!-- <th>Patient Id</th> -->
                          <th>Email</th>
                          <th>Name</th>
                          <!-- <th>Age</th> -->
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        
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
</script>

@endsection