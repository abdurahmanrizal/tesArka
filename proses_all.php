<?php
    include('config/koneksi.php');
    $kode = $_POST['kode'];

    if($kode == 0){
        $name = $_POST['nama_programmer'];
        $query = "INSERT INTO users (name_users) VALUES ('$name')";
    }else if($kode == 1){
        $skill = $_POST['skill_programmer'];
        $id_user = $_POST['id_users'];
        $query = "INSERT INTO skills (name_skills,id_users) VALUES ('$skill','$id_user')";
    }

    $check = mysqli_query($db,$query);
    if($check){
        // JIKA BERHASIL DALAM MENYIMPAN DATA KE DATABASE
        header('location:programmer_list.php?status=sukses');
    }else{
        // JIKA GAGAL MENYIMPAN DATA KE DATABASE
        header('location:programmer_list.php?status=gagal');
    }
    
?>