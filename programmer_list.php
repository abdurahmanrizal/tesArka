<?php
include('config/koneksi.php');
// $sql_list_programmer   = "SELECT name_users, name_skills FROM users LEFT JOIN skills ON users.id_users = skills.id_users ORDER BY id_users";
$sql_list_programmer = "SELECT * from users";
$query_list_programmer = mysqli_query($db, $sql_list_programmer);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programmer List Skill</title>
    <!-- CSS PROGRAMMER LIST -->
    <link rel="stylesheet" href="">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- GOOGLE  FONT  UNTUK NAMA PROGRAMMER-->
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <!-- GOOGLE FONT UNTUK SKILL PROGRAMMER -->
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
</head>

<body>
    <!-- ALERT UNTUK PEMBERITAHUAN DATA BERHASIL TERSIMPAN ATAU TIDAK -->
    <?php if (isset($_GET['status'])) : ?>
        <p>
            <?php
            if ($_GET['status'] == 'sukses') { ?>
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        DATA BERHASIL TERSIMPAN DI DATABASE
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    DATA TIDAK BERHASIL TERSIMPAN DI DATABASE
                </div>
            <?php
        }
        ?>
        </p>
    <?php endif; ?>
    <!-- TAMBAH PROGRAMMER -->
    <br>
    <br>
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <form action="proses_all.php" method="POST">
                    <div class="form-row">
                        <div class="col-11 mb-2">
                            <input type="text" class="form-control" name="nama_programmer" id="nama_programmer" placeholder="Tambah Programmer">
                            <input type="hidden" name="kode" value="0">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn-info btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- LIST PROGRAMMER -->
    <?php
    while ($list_programmer = mysqli_fetch_array($query_list_programmer)) { ?>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- nama programmer -->
                            <p style="font-family:'Anton', sans-serif; font-size: 22px"><?php echo $list_programmer['name_users']; ?></p>
                            <hr>
                            <!-- skill programmer -->

                            <?php
                            $id = $list_programmer['id_users'];
                            $sql = "SELECT * from skills where id_users='$id'";
                            $query = mysqli_query($db, $sql);
                            $array_data = array();
                            ?>
                            <p style="font-family:'Just Another Hand', cursive; font-weight:bold; font-size: 17px">
                                <?php
                                while ($skill = mysqli_fetch_array($query)) {
                                    array_push($array_data, $skill['name_skills']);
                                    // echo $skill['name_skills'].",";
                                }
                                $string_data = implode(" , ", $array_data);
                                echo $string_data;
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <form action="proses_all.php" method="POST">
                                <div class="form-row mt-4">
                                    <div class="col-10 mb-2">
                                        <input type="text" class="form-control" name="skill_programmer" id="skill_programmer" placeholder="Tambah skill.....">
                                        <input type="hidden" name="id_users" id="id_users" value="<?= $list_programmer['id_users']; ?>">
                                        <input type="hidden" name="kode" value="1">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn-info btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
?>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- POPPER JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- JS BOOTSTRAP -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>