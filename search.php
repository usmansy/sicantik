<?php
if (!isset($_GET['search'])) {
    header("location: index.php");
    exit;
}

$input = $_GET['search'];
$search = $input;
$data = file_get_contents("https://ws.sicantik.go.id/api/TemplateData/keluaran/35740.json?no_permohonan=" . $search);
$list = json_decode($data, true);
$list = $list["data"]["data"];

$title = 'Hasil Pencarian | ' . $input;
// var_dump($list);


if (empty($list)) {
    include_once "nav/header.php";
    header("refresh:5; url=index.php");
?>

    <body>
        <div class="container mt-5">
            <div class="wrapper">
                <h3>Nomor Permohonan: <em class="p-2 text-white bg-danger"><?php echo $input ?></em></h3>
                <div class="alert alert-danger mt-5">
                    <h5 class="text-dark text-center">Mohon maaf kode yang anda masukkan salah!!!</h5>
                </div>
            </div>
        </div>
    </body>
<?php
} else {
    include_once "nav/header_result.php";
?>

    <body>
        <div id="preloader"></div>
        <div class="contain">
            <div class="sicantik-wrapper">
                <div class="sicantik-search">
                    <h2 class="judul">Tracking SiCantik</h2>
                    <blockquote>Silahkan masukkan nomor permohonan</blockquote>
                    <form action="search.php" method="get">
                        <div class="sicantik-search-box">
                            <input type="text" name="search" class="search-control" placeholder="Nomor Permohonan" id="search-input" required>
                            <button type="submit" class="search-btn butn" id="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <h2 class="hasil">Hasil Pencarian: <em class="bg-success text-white"><?php echo $input ?></em></h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($list as $results) : ?>
                    <div class="col-md-6">
                        <div class="card border-secondary mb-3">
                            <div class="card-header">
                                <h3 class="card-title"><?= $results["nama"] ?></h3>
                            </div>
                            <div class="card-body">
                                <!-- <h5 class="card-title"><?= $results["nama"] ?></h5> -->
                                <table class="table table-striped">
                                    <tr>
                                        <td class="font-weight-bold">No. HP </td>
                                        <td><?= $results["no_hp"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email </td>
                                        <td><?= $results["email"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Alamat </td>
                                        <td><?= $results["alamat"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">No. Permohonan </td>
                                        <td><?= $results["no_permohonan"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Jenis Permohonan </td>
                                        <td><?= $results["jenis_permohonan"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Jenis Izin </td>
                                        <td><?= $results["jenis_izin"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Tanggal Pengajuan </td>
                                        <td><?= $results["tgl_pengajuan"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Nama Proses </td>
                                        <td><?= $results["nama_proses"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Status </td>
                                        <td class=""><span class="font-weight-bold <?= ($results["status"] == "Selesai") ? "bg-success text-light pl-1 pr-2" : (($results["status"] == "Proses") ? "bg-warning pl-1 pr-2" : "bg-danger text-light pl-1 pr-2"); ?>"><?= $results["status"] ?></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            } ?>
            </div>
        </div>


        <script>
            var loader = document.getElementById("preloader");
            window.addEventListener("load", function() {
                loader.style.display = "none";
            });
        </script>
    </body>
    <?php include_once "nav/footer.php";  ?>