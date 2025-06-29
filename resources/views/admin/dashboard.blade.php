@extends('layouts.master') 

@section('seo_title', 'Login')



@section('body_content')

<!-- partial -->
        <div class="main-panel">
        	
	          <div class="content-wrapper">
	          	<div class = "row">

		              <div class="col-md-4 stretch-card grid-margin">
		                <div class="card bg-gradient-info card-img-holder text-white">
		                  <div class="card-body">
		                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
		                    <h4 class="font-weight-normal mb-3">Total Queries<i class="mdi mdi-chart-line mdi-24px float-end"></i>
		                    </h4>
		                    <h2 class="mb-5">5</h2>
		                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
		                  </div>
		                </div>
		              </div>

		              <div class="col-md-4 stretch-card grid-margin">
		                <div class="card bg-gradient-danger card-img-holder text-white">
		                  <div class="card-body">
		                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
		                    <h4 class="font-weight-normal mb-3">Total Resolved Queries<i class="mdi mdi-chart-line mdi-24px float-end"></i>
		                    </h4>
		                    <h2 class="mb-5">5</h2>
		                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
		                  </div>
		                </div>
		              </div>

		              <div class="col-md-4 stretch-card grid-margin">
		                <div class="card bg-gradient-info card-img-holder text-white">
		                  <div class="card-body">
		                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
		                    <h4 class="font-weight-normal mb-3">Total Active Queries<i class="mdi mdi-chart-line mdi-24px float-end"></i>
		                    </h4>
		                    <h2 class="mb-5">4</h2>
		                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
		                  </div>
		                </div>
		              </div>

		        </div>

	          
	          @include('layouts.blocks.footer')
          
        </div>
        

@endsection

@section('footer_custom_js')

@endsection