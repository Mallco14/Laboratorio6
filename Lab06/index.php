<?php
/* Llamar el archivo , en este caso ya llamamos para que se conecte.*/
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
<center>
    <br>
    <br>
    <br>
    <div id = "form">
        <form method="post">
            <table width="100%" border="1" cellpadding="15">
            <tr>
                <td>
                    <input type="text" name="fn" placeholder="Nombre" value="<?php
                            if(isset($_GET['edit'])) echo $getROW['fn']; ?>">
                           
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" name="ln" placeholder="Apellido"  value="<?php
                            if(isset($_GET['edit'])) echo $getROW['ln']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (isset($_GET['edit'])) {
                        ?>
                        <button type = "submit" name="update">Editar</button>
                        <?php
                    }else{
                        ?>
                        <button type ="submit" name="save">Registrar</button>

                    <?php
                        
                        
                    }
                    ?>
                </td>
            </tr>
            </table>
        </form>
        <br><br>
        <table width="100%" border="1" cellpadding="15" align="center">
            <?php
            $res = $MySQLiconn->query("SELECT * FROM data");
            /* para poder escribir en la tabla mediante un bucle*/
       
            while ($row = $res->fetch_array()) {
                ?>
             <!--    /*Fila "tr"*/ -->
                <tr> 
            <!--         /*columna "td"*/ -->
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fn']; ?></td>
                    <td><?php echo $row['ln']; ?></td>
            <!--         /*CUANDO SE USA DOBLE COMILLA , se puede pasar el php*/ -->

                    <td><a href="?del=<?php echo $row['id'];?>" 
                    onclick="return confirm('confirmar eliminacion')">Eliminar</a></td>

                    <td><a href="?edit=<?php echo $row['id'];?>" 
                    onclick="return confirm('confirmar edicion')">Editar</td>
                </tr>
                <?php
            }

            ?>

        </table>

    </div>
</center>
    
</body>
</html>