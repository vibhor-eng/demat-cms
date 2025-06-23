

<!-- Query Reply -->

@if(Auth::user()->user_type == 'admin')
<div class="modal fade" id="patient_reply" role="dialog" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        	<h5 class="modal-title">Reply to patient</h5>
      	</div>
      	<div class="modal-body">
   					<div class="container-fluid">
								<div id="msg"></div>
	
									<form action="" id="manage-user">	
										<input type="hidden" name="id" id = "id" value="">
										<input type="hidden" name="mob" id = "mob" value="">

										<div class="form-group">
											<label for="username">Patient Message</label>
											<textarea class="form-control" rows="2" id = "patient_msg"> sdf</textarea>
										</div>
										
										<div class="form-group">
											<label for="username">Reply</label>
											<textarea class="form-control" id="message" name = "message" rows="4" required></textarea>
										</div>

										<div class="form-group">
											<label for="username">Select Type</label>
											<select class="form-select" name = "query_type" id = "query_type">
												<option value="">Please select</option>
												@if(isset($query_types))
												@foreach($query_types as $id => $val)
        									<option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
    										@endforeach
    										@endif
											</select>
										</div>

									</form>
						</div>
				</div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="reply_by_admin">Save</button>
	        <button type="button" class="btn btn-secondary cancel">Cancel</button>
	      </div>
      </div>
    </div>
  </div>
  @endif

 <!-- End Query Reply -->

 <!-- Add Query -->

 <div class="modal fade" id="add_query" role="dialog" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        	<h5 class="modal-title">Add Query Type</h5>
      	</div>
      	<div class="modal-body">
   					<div class="container-fluid">
								<div id="msg"></div>
	
									<form action="" id="manage-user">	
										
										
										<div class="form-group">
											<label for="exampleInputPassword4">Query Name</label>
                        <input type="text" name = "name" class="form-control" id="name" placeholder="Name">
										</div>	

									</form>
						</div>
				</div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="save_query">Save</button>
	        <button type="button" class="btn btn-secondary cancel">Cancel</button>
	      </div>
      </div>
    </div>
  </div>

 <!-- End add query -->

 <!-- update Query -->

 <div class="modal fade" id="update_query" role="dialog" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        	<h5 class="modal-title">Update Query Type</h5>
      	</div>
      	<div class="modal-body">
   					<div class="container-fluid">
								<div id="msg"></div>
	
									<form action="" id="manage-user">	
										<input type="hidden" name="id" id = "query_id" value="">
										
										<div class="form-group">
											<label for="exampleInputPassword4">Query Name</label>
                        <input type="text" name = "name" class="form-control" id="query_name" placeholder="Name">
										</div>	

									</form>
						</div>
				</div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="update_query_save">Save</button>
	        <button type="button" class="btn btn-secondary cancel">Cancel</button>
	      </div>
      </div>
    </div>
  </div>

 <!-- End update query -->

 <!-- display patient list -->

 <div class="modal fade" id="patient_details" role="dialog" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        	<h5 class="modal-title">Patient Details</h5>
      	</div>
      	<div class="modal-body">
   					<div class="container-fluid">
   						<table class="table">
  							<tbody>
									<tr>
							      <th>Patient Id</th>
							      <td id = "patient_id"></td>
							    </tr>
							    <tr>
							      <th>Name</th>
							      <td id = "patient_name"></td>
							    </tr>
							    <tr>
							      <th>Email</th>
							      <td id = "patient_email"></td>
							    </tr>
							    <tr>
							      <th>Age</th>
							      <td id = "patient_age"></td>
							    </tr>
							    <tr>
							      <th>Mobile</th>
							      <td id = "patient_mobile"></td>
							    </tr>
							    <tr>
							      <th>Gender</th>
							      <td id = "patient_gender"></td>
							    </tr>
							    <tr>
							      <th>Created At</th>
							      <td id = "patient_created"></td>
							    </tr>
							  </tbody>
							</table>
						</div>
				</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary cancel">Cancel</button>
	      </div>
      </div>
    </div>
  </div>

 <!-- End Display patinet list -->