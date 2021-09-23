<?php
/*incluir un archivo*/
include_once 'db.php';

/* codigo para poder inserta*/ 

if(isset($_POST['save'])){

    /* para que no haya basura */
    $fn = $MySQLiconn->real_escape_string($_POST['fn']);
    $ln = $MySQLiconn->real_escape_string($_POST['ln']);
    
    /*Query es un metodo , la consulta que realizaremos en la bd*/ 
    $SQL = $MySQLiconn->query("INSERT INTO data(fn,ln) values('$fn','$ln')");

    /*el simbolo "!" es negación " NO SE EJECUTA EL SQL" */
    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }

}

/*Codigo para poder eliminar*/

if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
    /* Para que se recargue la misma pagina cuando eliminemos. */
    header("Location: index.php");
}


/* Codigo para cargar datos */

if (isset($_GET['edit'])) 
{
    $SQL = $MySQLiconn->query("SELECT * FROM  data where id=".$_GET['edit']);

    /*la data que estamos extrayendo lo convierte a una array "fetch_array"*/
    $getROW = $SQL->fetch_array();
}


if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE data SET fn='"
    .$_POST['fn']."',ln='".$_POST['ln']."' WHERE id="
    .$_GET['edit']);
    
    header("Location: index.php");
}

