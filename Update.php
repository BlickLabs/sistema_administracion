<?php
include "config.php";
include "header.php";
if (!isset($_SESSION['user_name'])) {
    
    header("Location: index.php");
    
}
if (isset($_GET['u'])):
    if (isset($_POST['bts'])):
        $stmt = $mysqli->prepare("UPDATE galery SET title_galery=?, short_description=?, long_description=?, status=?,modification_date=?,section=? WHERE id_galery=?");
        $stmt->bind_param('sssssss', $title, $short_decription, $long_description, $status_galery, $modification_date, $section_galery, $id_galery);

        $title = $_POST['title_galery'];
        $short_decription = $_POST['short_desc'];
        $long_description = $_POST['long_desc'];
        $status_galery = $_POST['status'];
        $modification_date = $_POST['modification_date'];
        $section_galery = $_POST['section'];
        $id_galery = $_POST['id_galery'];
        if ($stmt->execute()):
            echo "<script>location.href='galeria.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
    $res = $mysqli->query("SELECT * FROM galery WHERE id_galery=" . $_GET['u']);
    $row = $res->fetch_assoc();
    ?>

    <p><br/></p>
    <div class="panel panel-default">
        <div class="panel-body">

            <form role="form" method="post">
                <input type="hidden" value="<?php echo $row['id_galery'] ?>" name="id_galery"/>
                <div class="form-group">
                    <label for="nm">Nombre de la Galeria</label>
                    <input type="text" class="form-control" name="title_galery" id="nm" value="<?php echo $row['title_galery'] ?>">
                </div>

                <div class="form-group">
                    <label for="tl">Descripcion Corta</label>
                    <input type="tel" class="form-control" name="short_desc" id="tl" value="<?php echo $row['short_description'] ?>">
                </div>
                <div class="form-group">
                    <label for="ar">Descripcion Larga</label>
                    <textarea class="form-control" name="long_desc" id="ar" rows="3"><?php echo $row['long_description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="gd">Estatus de la galeria</label>
                    <select class="form-control" id="gd" name="status">
                        <option><?php echo $row['status'] ?></option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                </div>
                <div class="form-group">

                    <input type="hidden" class="form-control" name="modification_date" id="tl" value="<?php echo date("Y/m/d") ?>">
                </div>
                <div class="form-group">
                    <label for="tl">Seccion a la que pertence</label>
                    <input type="tel" class="form-control" name="section" id="tl" value="<?php echo $row['section'] ?>">
                </div>
                <button type="submit" name="bts" class="btn btn-default">Guardar Cambios</button>
            </form>
            <?php
        endif;
        include "footer.php";
        ?>
