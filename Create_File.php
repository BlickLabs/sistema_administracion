<?php
    include "config.php";
    include "header.php";
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: index.php");
    }
?>
<script src="js/jquery.js"></script>
<script src="js/upload.js"></script>
<script src="js/bootbox.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/bootbox.min.js"></script>
<p><br/></p>
<div class="panel panel-default">
    <div class="panel-body">
        <form  id="subida">
            <div class="form-group">
                <label for="name_galery">Titulo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="name_galery">Imagen</label>
                <input type="file" id="foto" name="foto"/> 
            </div>
            <div class="form-group">
                <label for="short_description">Descripcion Corta</label>
                <input type="text" id="desc_short" class="form-control" name="desc_short" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="short_description">Descripcion larga</label>
                <input type="text" id="desc_long" class="form-control" name="desc_long" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="estatus">Estatus</label>
                <select class="form-control" id="status" name="status">
                    <option value="activo">Activa</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" type="text" class="form-control" name="creation_date" id="creation_date" value="<?php echo date("Y/m/d") ?>">
            </div>
            <button type="submit"  class="btn btn-default">Guardar</button>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>