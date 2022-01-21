  <!-- Navigation Bar -->
  <nav class="navbar ms-navbar">

      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
          <span class="ms-toggler-bar bg-primary"></span>
          <span class="ms-toggler-bar bg-primary"></span>
          <span class="ms-toggler-bar bg-primary"></span>
      </div>

      <div class="logo-sn logo-sm ms-d-block-sm">
          <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.html"><img src="vistas/img/plantilla/cart.png"
                  alt="logo"> </a>
      </div>

      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
          <li class="ms-nav-item ms-search-form pb-0 py-0">
              <form class="ms-form" method="post">
                  <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                      <input type="search" class="ms-form-input" name="search" placeholder="Buscar aquí" value="">
                      <i class="flaticon-search text-disabled"></i>
                  </div>
              </form>
          </li>
          <?php
            include "header/mail.php";
            include "header/notificaciones.php";
            ?>

          <li class="ms-nav-item">
              <a href="#" class="text-disabled ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"><i
                      class="flaticon-menu"></i></a>
          </li>
          <li class="ms-nav-item ms-nav-user dropdown">
              <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="ms-user-img ms-img-round float-right" src="vistas\assets\img\people\people-5.jpg"
                      alt="people"> </a>
              <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                  <li class="dropdown-menu-header">
                      <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, Anny
                              Farisha</span></h6>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="ms-dropdown-list">
                      <a class="media fs-14 p-2" href="pages\prebuilt-pages\user-profile.html"> <span><i
                                  class="flaticon-user mr-2"></i> Profile</span> </a>
                      <a class="media fs-14 p-2" href="pages\apps\email.html"> <span><i class="flaticon-mail mr-2"></i>
                              Inbox</span> <span class="badge badge-pill badge-info">3</span> </a>
                      <a class="media fs-14 p-2" href="pages\prebuilt-pages\user-profile.html"> <span><i
                                  class="flaticon-gear mr-2"></i> Account Settings</span> </a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="dropdown-menu-footer">
                      <a class="media fs-14 p-2" href="pages\prebuilt-pages\lock-screen.html"> <span><i
                                  class="flaticon-security mr-2"></i> Lock</span> </a>
                  </li>
                  <li class="dropdown-menu-footer">
                      <a class="media fs-14 p-2" href="pages\prebuilt-pages\default-login.html"> <span><i
                                  class="flaticon-shut-down mr-2"></i> Logout</span> </a>
                  </li>
              </ul>
          </li>
      </ul>

      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
          <span class="ms-toggler-bar bg-primary"></span>
          <span class="ms-toggler-bar bg-primary"></span>
          <span class="ms-toggler-bar bg-primary"></span>
      </div>

  </nav>