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
                    <h4 class="card-title">Article Create</h4>
                    <form class="forms-sample" id = "update-patient" action = "" method = "post">
                    	@csrf

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Email</label>
                                <input type="email" name = "email" class="form-control" id="email" placeholder="Email" value = "">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Name</label>
                                <input type="test" name = "name" class="form-control" id="name"  placeholder="Name" value = "">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Age</label>
                                <input type="text" name = "age" class="form-control" id="age"  placeholder="Age" value = "">
                              </div>

                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Mobile</label>
                                <input type="text" name = "mobile" class="form-control" id="mobile" placeholder="Mobile" value = "">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                              <div class = "col-md-6">
                                <label for="exampleInputPassword4">Gender</label>
                                <select class="form-select" name = "gender" id="exampleFormControlSelect2">
                                  <option value = "">--Select Gender--</option>
                                  <option value = "M">Male</option>
                                  <option value = "F">Female</option>
                                  <option value = "O">Other</option>
                                </select>
                              </div>
                            </div>
                        </div>

                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

	          </div>
	          
	          @include('layouts.blocks.footer')
          
        </div>
        

@endsection

@section('footer_custom_js')

@endsection