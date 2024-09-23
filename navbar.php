<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-success-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
         aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="orderHistory.php">Purchase History</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-link">
                    <a class="btn btn-outline-info" href="login.php">login to your account</a>
                </li>
                <li class="nav-link">
                    <a class="btn btn-outline-dark" onclick="signOut()">Signout</a>
                </li>
                
                <li class="nav-link">
                    <a class="btn btn-link" href="adminSignin.php">admin login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>