<body class="bg">
    <div id="preloader"></div>
    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="resetBg()"></div>

    <!-- Container -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <img src="images/logo.png" width="100">
                            </a>
                        </li>
                    </ul>

                    <!-- Right Navbar -->
                    <ul class="navbar-nav navbar-right mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light btn btn-primary" href="https://dpmptsp.pangandarankab.go.id">Kembali ke website</a>
                        </li>
                    </ul>
                    <!-- ./End of right navbar -->
                </div>
            </div>
        </nav>
        <!-- ./End of navbar -->

        <!-- Search Box -->
        <div class="col-md-6 col-lg-6 col-11 mx-auto my-auto search-box">
            <h1 class="text-light">TRACKING SICANTIK</h1>
            <p class="text-light">Silahkan Masukkan nomor permohonan di bawah</p>
            <form action="search.php" method="get" id="captch_form">
                <div class="input-group form-container">
                    <input type="text" name="search" class="form-control search-input" placeholder="No. Permohonan" autofocus="autofocus" autocomplete="off" onclick="setBgToDark()" required>

                    <span class="input-group-btn">
                        <button class="btn btn-search" name="cari" id="cari">
                            <img src="images/search.png" width="40">
                        </button>
                    </span>

                </div>
                <div class="input-group form-container mt-3 w-50">
                    <input type="text" name="captcha_code" id="captcha_code" class="form-control search-input" placeholder="Kode" autofocus="autofocus" autocomplete="off" onclick="setBgToDark()">

                    <span class="input-group-btn">
                        <img src="conf/image.php" id="captcha_image" width="100%" />
                    </span>

                </div>
            </form>
        </div>
        <!-- ./End of search box -->
    </div>
    <!-- ./End of container -->

    <script src="js/script.js"></script>
</body>