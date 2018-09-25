<?php
   /* función que muestra las cabeceras para que
      se llamado desde array_walk                */
   function escribir_cabeceras_walk ($mimatriz)
      {
      echo "<TR>\n";
      while (list($clave) = each($mimatriz))
         echo "<TH>$clave</TH>\n";
      echo "<TH>Número de Ficha</TH>\n";
      echo "</TR>\n";
      }
   /* función que muestra los elementos de una matriz
      para que se llamado desde array_walk            */
   function listar_elemento_walk($matriz, $clave_matriz)
      {
      echo "<TR>\n";
      // Recorro los elementos de la matriz asociativa
      while (list($clave, $valor) = each($matriz))
         echo "<TD>$valor</TD>\n";
      echo "<TD ALIGN=CENTER>$clave_matriz</TD>\n";
      echo "</TR>\n";
      }
   /* función que mediante la función array_walk muestra
      el contenido de una matriz                         */
   function listar_walk($agenda, $texto)
      {
      echo "<TABLE BORDER=3 ALIGN=CENTER>\n";
      echo "<CAPTION ALIGN=TOP>$texto</CAPTION>\n";
      escribir_cabeceras_walk($agenda[0]);
      array_walk($agenda, 'listar_elemento_walk');
      echo "</TABLE>\n";
      }
   /* función que almacena el contenido de una matriz
      en un fichero                                   */
   function grabar($mimatriz)
      {
      $fichero = fopen('datosagenda.dat', 'w');
      // Recorro los elementos de la matriz.
      // Es una matriz indexada
      for ($i = 0; $i < count($mimatriz); $i++)
         {
         $cadena = '';
         // Recorro los elementos de la matriz asociativa
         while (list($clave, $valor) = each($mimatriz[ $i ]))
            $cadena .= $valor.'#';
         fputs($fichero, $cadena."\n");
         }
      fclose ($fichero);
      }
   // función que lee de un fichero y almacen su contenido
   // en una matriz
   function leer_agenda(&$agenda, $nombrefichero)
      {
      $datosagenda = file($nombrefichero);
      while (list($clave, $cadena) = each($datosagenda))
         {
         $cadena = chop($cadena);
         $datosamigo = explode('#', $cadena);
         $agenda[] = array('Nombre' => $datosamigo[ 0 ],
                            'Direccion' => $datosamigo[ 1 ],
                            'Telefono' => $datosamigo[ 2 ],
                            'email' => $datosamigo[ 3 ]);
         }
      }
   // Función que lista las claves de una matriz asociativa
   function escribir_cabeceras ($mimatriz)
      {
      echo "<TR>\n";
      while (list($clave) = each($mimatriz))
         echo "<TH>$clave</TH>\n";
      echo "</TR>\n";
      }
   // Función que lista las claves de una la agenda de amigos
   function listar ($mimatriz, $texto)
      {
      // escribo la cabecera de la tabla
      echo "<TABLE BORDER=3 ALIGN=CENTER>\n";
      echo "<CAPTION ALIGN=TOP>$texto</CAPTION>\n";
      // Recorro los elementos de la matriz.
      // Es una matriz indexada
      for ($i = 0; $i < count($mimatriz); $i++)
         {
         /* Si es el primer elemento se escribe la cabecera
            de la tabla con los nombres de los campos       */
         if ($i == 0)
            escribir_cabeceras($mimatriz[ $i ]);
         echo "<TR>\n";
         // Recorro los elementos de la matriz asociativa
         while (list($clave, $valor) = each($mimatriz[ $i ]))
            echo "<TD>$valor</TD>\n";
         echo "</TR>\n";
         }
      echo "</TABLE>\n";
      }
   // Función que lista las claves de una entrada
   // de la agenda de amigos
   function listar_elemento( $amigo, $texto )
      {
      // escribo la cabecera de la tabla
      echo "<TABLE BORDER=3 ALIGN=CENTER>\n";
      echo "<CAPTION ALIGN=TOP>$texto</CAPTION>\n";
      // Recorro los elementos de la matriz asociativa
      while( list( $clave, $valor ) = each( $amigo ) )
         {
         echo "<TR>\n";
         echo "<TD ALIGN=CENTER><B>$clave</B></TD>\n";
         echo "<TD>$valor</TD>\n";
         echo "</TR>\n";
         }
      echo "</TABLE>\n";
      }
?>

Distintas funciones de la agenda de amigos
