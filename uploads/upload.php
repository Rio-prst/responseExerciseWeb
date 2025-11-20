<?php
function uploadImage($file) {
    $target_dir = "../uploads/images/";
    $filename = time() . "_" . basename($file["name"]);
    $target_file = $target_dir . $filename;

    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return [
            "status" => false,
            "message" => "File bukan gambar"
        ];
    }

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return [
            "status" => true,
            "file" => $filename
        ];
    } else {
        return [
            "status" => false,
            "message" => "Gagal upload file"
        ];
    }
}
?>
