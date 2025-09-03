<?php
    include '../config/app.php';
    include '../config/database.php';
    include '../config/security.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Obtener el nombre de la foto antes de eliminar el registro
        $photo_name = getPetPhoto($id, $conx);

        if (deletePet($id, $conx)) {
            // Eliminar la foto del servidor
            if (!empty($photo_name)) {
                $photo_path = '../uploads/' . $photo_name;
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }
            }
            $_SESSION['message'] = "La mascota ha sido eliminada correctamente.";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al eliminar la mascota.";
            header("Location: dashboard.php");
            exit();
        }
    }
?>