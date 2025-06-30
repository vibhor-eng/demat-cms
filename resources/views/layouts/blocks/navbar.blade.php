
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <!-- <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  change to offline or busy as needed
                </div> -->
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ ucfirst(Auth::user()->name) }}</span>
                  <!-- <span class="text-secondary text-small">Patient</span> -->
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            
            <li class="nav-item <?php if(Request::segment(2) == 'dashboard') { echo 'active'; } ?>">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

             
             <!-- Article -->
             <li class="nav-item <?php if(Request::segment(2) == 'article') { echo 'active'; } ?>">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#forms" aria-expanded="<?php if(Request::segment(2) == 'article') { echo 'true'; } ?>" aria-controls="forms">
                <span class="menu-title">Article</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse <?php if(Request::segment(2) == 'article') { echo 'show'; } ?>" id="forms" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'article' && Request::segment(3) == 'list') { echo 'active'; } ?>" href="{{ route('admin.article.list') }}">Article List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'article' && Request::segment(3) == 'create') { echo 'active'; } ?>" href="{{ route('admin.article.create') }}">Article Create</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- Authors -->
            
             <li class="nav-item <?php if(Request::segment(2) == 'author') { echo 'active'; } ?>">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#author" aria-expanded="<?php if(Request::segment(2) == 'author') { echo 'true'; } ?>" aria-controls="author">
                <span class="menu-title">Author</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse <?php if(Request::segment(2) == 'author') { echo 'show'; } ?>" id="author" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'author' && Request::segment(3) == 'list') { echo 'active'; } ?>" href="{{ route('admin.author.list') }}">Author List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'author' && Request::segment(3) == 'create') { echo 'active'; } ?>" href="{{ route('admin.author.create') }}">Author Create</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- Topics -->
            <li class="nav-item <?php if(Request::segment(2) == 'tag') { echo 'active'; } ?>">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#tag" aria-expanded="<?php if(Request::segment(2) == 'tag') { echo 'true'; } ?>" aria-controls="tag">
                <span class="menu-title">Topic</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse <?php if(Request::segment(2) == 'tag') { echo 'show'; } ?>" id="tag" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'tag' && Request::segment(3) == 'list') { echo 'active'; } ?>" href="{{ route('admin.tag.list') }}">Tag List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(2) == 'tag' && Request::segment(3) == 'create') { echo 'active'; } ?>" href="{{ route('admin.tag.create') }}">Tag Create</a>
                  </li>
                </ul>
              </div>
            </li>

  
          </ul>
        </nav>
        
   