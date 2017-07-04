<HTML>
<HEAD>
   <TITLE>LISTADO DE AMIGOS</TITLE>
</HEAD>
<BODY>

<?php
   define ('NOMBRE_FICHERO', 'datosagenda.dat');
   include ("utilidades.php");
   if (isset($_POST['lugar']))
      {
      $agenda = array();
      leer_agenda($agenda, NOMBRE_FICHERO);
      $datos = array('Nombre'    => $_POST['nombre'],
                     'Direccion' => $_POST['direccion'],
                     'Telefono'  => $_POST['telefono'],
                     'email'     => $_POST['email']);
      if ($_POST['lugar'])
         array_push($agenda, $datos);
      else
         array_unshift($agenda, $datos);
      listar($agenda, 'Mi agenda de amigos');
      grabar($agenda, NOMBRE_FICHERO);
      }
   else
      {
?>
   <CENTER>
   <H1 ALIGN=CENTER>Error de entrada</H1>
   <HR>
   <H2>NO HA SELECCIONADO EL EXTREMO DONDE INSERTAR
       LOS DATOS DEL AMIGO</H2>
<?php
      }
?>
   <CENTER>
   <A HREF="nuevo.html">VOLVER</A>
   </CENTER>
</BODY>
</HTML>
