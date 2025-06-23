
<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
.fixed-top.bg-primary{background-color: #003f7a !important;}
.rvgains-logo img{max-width:100%;height: 56px;padding: 4px 0;}
.alumini p{padding-top:15px;margin-bottom:0px;text-align:center}
.rightdrop{text-align:right;padding-top:15px;}
.toggle-icons{font-size: 30px;color: #fff; position:absolute;top: 5px;left:200px;z-index:999;cursor: pointer;}
.fixed-top { z-index: 1;}
@media(max-width:768px){
	.alumini{display:none;}
}

.btn-primary {
    color: #fff;
    background-color: #003f7a;
    border-color: #003f7a;
}
.badge-primary {
    color: #fff;
    background-color: #003f7a;
}
</style>


<nav class="navbar-light fixed-top bg-primary" style="padding:0;min-height: 3.5rem">
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-4 col rvgains-logo">
  		<img src="/uploads/rvgains-logo.png" alt="logo">  
		
  		</div>
      <div class="col-md-4 alumini text-white">
        <p><b>Alumini Management System</b></p>
      </div>
	  	<div class="col-md-4 col rightdrop">
        <div class=" dropdown mr-4">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ ucfirst(Auth::user()['firstName']) }} </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="{{ url('admin/signout') }}"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>
