    <!-- navbar -->

    <nav class="navbar navbar-expand-lg  navbar-link-light bg-success-subtle fixed-top">
      <div class="container-fluid">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fw-bold" aria-current="page" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
                <h5>Lezafarming</h5>
              </a>
            </li>
          </ul>
        </div>





        <form class="d-flex me-2">
          <a href="#"><img class="me-2" src="resources/blankuser.png" style="width: 40px; height: 40px;" alt=""></a>
          <div class="text-center me-3 mt-1 ">
            <span class="text-lg-start text-success fw-bolder"><?php echo $d["fname"] ?> <?php echo $d["lname"] ?></span>
          </div>

          <div class="dropdown me-3">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              My Options
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
              <li><a class="dropdown-item" href="login.php">Sign In</a></li>
              <li><a class="dropdown-item" onclick="signOut()">Sign Out</a></li>
              <hr class="table-group-divider">
              <li><a class="dropdown-item text-danger" href="#">about us</a></li>
            </ul>
          </div>


          <a href="#"><img src="resources/bell-fill.svg" style="width: 25px; height: 25px;" alt="" srcset=""></a>
        </form>

      </div>
    </nav>

    <!-- navbar -->