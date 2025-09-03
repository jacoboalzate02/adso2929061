<?php
    include '../config/app.php';
    include '../config/database.php';
    include '../config/security.php';

    // Verificar si se pasó un ID para editar
    if (!isset($_GET['id'])) {
        header("Location: dashboard.php");
        exit();
    }
    
    $id = $_GET['id'];
    $pet = showPet($id, $conx);

    // Si la mascota no existe, redirigir
    if (!$pet) {
        header("Location: dashboard.php");
        exit();
    }

    $breeds = listBreeds($conx);
    $species = listSpecies($conx);
    $sexes = listSexes($conx);

    // Lógica para procesar el formulario cuando se envía
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $specie_id = $_POST['specie_id'];
        $breed_id = $_POST['breed_id'];
        $sex_id = $_POST['sex_id'];
        $photo_name = $pet['photo'];

        // Manejar la subida de una nueva foto
        if (!empty($_FILES['photo']['name'])) {
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_info = pathinfo($_FILES['photo']['name']);
            $photo_ext = $photo_info['extension'];
            $photo_name = uniqid() . '.' . $photo_ext;

            if (move_uploaded_file($photo_tmp, '../uploads/' . $photo_name)) {
                // Eliminar la foto anterior si no es la predeterminada
                if (!empty($pet['photo'])) {
                    $old_photo_path = '../uploads/' . $pet['photo'];
                    if (file_exists($old_photo_path)) {
                        unlink($old_photo_path);
                    }
                }
            }
        }

        // Actualizar la mascota en la base de datos
        if (updatePet($id, $name, $specie_id, $breed_id, $sex_id, $photo_name, $conx)) {
            $_SESSION['message'] = "La mascota " . $name . " ha sido actualizada.";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al actualizar la mascota.";
            header("Location: dashboard.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Edit</title>
    <link rel="stylesheet" href="<?= $css ?>stylee.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="../close.php" class="close"></a>
        </header>
        <figure class="photo-preview">
            <img id="preview" src="../uploads/<?= $pet['photo'] ?>" alt="<?= $pet['name'] ?>">
        </figure>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Nombre" value="<?= $pet['name'] ?>">
            <div class="select">
                <select name="specie_id">
                    <option value="">Seleccione Especie...</option>
                    <?php foreach ($species as $specie): ?>
                        <option value="<?= $specie['id'] ?>" <?php if ($specie['name'] == $pet['specie']) echo 'selected'; ?>><?= $specie['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="select">
                <select name="breed_id">
                    <option value="">Seleccione Raza...</option>
                    <?php foreach ($breeds as $breed): ?>
                        <option value="<?= $breed['id'] ?>" <?php if ($breed['name'] == $pet['breed']) echo 'selected'; ?>><?= $breed['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="button" class="upload">Subir Foto</button>
            <input type="file" name="photo" id="photo" accept="image/*" style="display: none;">
            <div class="select">
                <select name="sex_id">
                    <option value="">Seleccione Genero...</option>
                    <?php foreach ($sexes as $sex): ?>
                        <option value="<?= $sex['id'] ?>" <?php if ($sex['name'] == $pet['sex']) echo 'selected'; ?>><?= $sex['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" name="update" class="update">Modificar</button>
        </form>
    </main>
    <script>
        const preview = document.querySelector('#preview');
        const upload = document.querySelector('.upload');
        const photo = document.querySelector('#photo');

        upload.addEventListener('click', function(e) {
            photo.click();
        });

        photo.addEventListener('change', function(e) {
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
</body>
</html>