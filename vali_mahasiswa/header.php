<nav class="navbar navbar-expand-md app-header">

    <!-- Image Logo -->
    <a class="app-header__logo navbar-brand" href="./"><img src="assets/images/ipb.svg" alt="Sekolah SPs IPB"></a>
    
    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>        
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav app-nav">
            <li class="nav-item">
                <a class="app-nav__item" href="./">BERANDA</a>
            </li>
            <li class="nav-item">
                <a class="app-nav__item" href="#surat">PERSURATAN</a>
            </li>
            <li class="nav-item">
                <a class="app-nav__item" href="#ujian">UJIAN</a>
            </li>
            <li class="nav-item">
                <a class="app-nav__item" href="pengumuman">PENGUMUMAN</a>
            </li>

            <li class="nav-item divider"></li>

            <!-- Dropdown Menu -->
            <li class="dropdown nav-user">
              <a class="app-nav__item" href="" data-toggle="dropdown" aria-label="Open Profile Menu" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user fa-lg"></i>
              </a>
              <ul class="dropdown-menu settings-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item username active"><i class="fa fa-user fa-lg"></i>
                    <?php if (isset($_SESSION['login'])) {                        
                        echo $_SESSION['username'];
                    }
                ?></a></li>
                <li class="dropdown-divider-hr"></li>
                <li><a class="dropdown-item" href="logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>
            </li>
            <!-- end of dropdown menu -->            

        </ul>
    </div>
</nav> <!-- end of navbar -->