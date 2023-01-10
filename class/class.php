<!doctype html>
<html lang="es">
  <head>

  <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet" />	
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">

    <!--sweetalert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
  <!-- script JS-->
  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
    <title> USUARIOS</title>
  </head>
  <body>
<?php
//realizar la conexion a la BD
class Conectar{
    public static function con(){
    $link=mysqli_connect('localhost','root','') or die ("ERROR al concetar la BD".mysqli_error($link));
    mysqli_select_db($link,'zoo');
    mysqli_query($link,"SET NAMES 'utf8'") or die("ERROR al selecconar la BD".mysqli_error($link));
    return $link;
    }
}
//clase usuarios - CRUD de usuarios 
class Usuario{
 private $user;
 public function __construct(){
     $this->user=array();
 }
 //mostrar los usuarios 
 public function ver_usu(){
   $sql="select * from usuarios";
   $res=mysqli_query(Conectar::con(),$sql);
   while($row=mysqli_fetch_assoc($res)){
       $this->user[]=$row;
   }
   return $this->user;

 }

 public function ver_usuarios($user){
  $sql="select * from usuarios where tipo_usuario=$user";
  $res=mysqli_query(Conectar::con(),$sql);
  while($row=mysqli_fetch_assoc($res)){
      $this->user[]=$row;
  }
  return $this->user;

}
//Insertar nuevos usuarios
 public function registrar($id_u,$username,$pass,$usertype,$respuesta1,$respuesta2){
   $sql="insert into usuarios values($id_u,'$username','$pass','$usertype','$respuesta1','$respuesta2')";
   $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
   echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El usuario se Registro Correctamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='index.php';
        }
   });
   </script>";
}
//metodo para que el admin inserte nuevos usuarios
public function insertar($id_u,$username,$pass,$usertype,$respuesta1,$respuesta2){
  $sql="insert into usuarios values($id_u,'$username','$pass','$usertype','$respuesta1','$respuesta2')";
  $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
  echo"
  <script type='text/javascript'>
  Swal.fire({
   title:'Exito',
   text:'El usuario se Registro Correctamente',
   icon : 'success',
  }).then((result)=>{
       if(result.value){
         window.location='usuarioinsert.php';
       }
  });
  </script>";
}



public function editarUsuario($id,$username,$pass,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET usuario='$username',clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' WHERE codigo = '$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El empleado con id $id fue Modificado',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='usuarioinsert.php';
        }
   });
   </script>";
} 




//Crear una funcion para capturar el id de los botones de accion
public function usu_id($id) {

  $sql="select * from usuarios where codigo=$id";
  $res=mysqli_query(Conectar::con(),$sql);
  if($reg=mysqli_fetch_assoc($res)) {
    $this->emple[]=$reg;
  }
  return $this->emple;
}

public function eliusu($id){

$sql="delete from usuarios where codigo=$id";
$res=mysqli_query(Conectar::con(),$sql);
echo"
<script type='text/javascript'>
Swal.fire({
 title:'Exito',
 text:'El usuario con id $id fue Eliminado',
 icon : 'success',
}).then((result)=>{
     if(result.value){
       window.location='usuarioinsert.php';
     }
});
</script>";

}

public function modificarClave($pass,$id){
  $sql="UPDATE usuarios SET clave='$pass' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Usuario con id $id ha cambiado su contraseña exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='index.php';
        }
   });
   </script>";
} 


public function editarAdmin($pass,$id,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Administrador con id $id ha actualizado su informacion exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='adminhome.php?id=$id';
        }
   });
   </script>";
} 
public function editaruser($pass,$id,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Administrador con id $id ha actualizado su informacion exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='usuariohome.php?id=$id';
        }
   });
   </script>";
} 
}


// CRUD ZOO

class Zoo{

  private $zoo;
  
  public function __construct(){
      $this->zoo=array();

      }
  
  //mostrar los zoológicos 
  public function ver_zoo(){
  // $sql="select * from zoo";
  $sql="SELECT zoo.id_zoo, zoo.nombre, zoo.tamano, zoo.presupuesto_anual, pais.pais, ciudad.ciudad 
  FROM zoo INNER JOIN pais ON (zoo.id_pais_fk=pais.id_pais)
  INNER JOIN ciudad ON (zoo.id_ciudad_fk=ciudad.id_ciudad)
  order by zoo.id_zoo ASC";
  $res=mysqli_query(Conectar::con(),$sql);
  while($row=mysqli_fetch_assoc($res)){
      $this->zoo[]=$row;
  }
  return $this->zoo;

}

public function verusuario_zoo(){
  // $sql="select * from zoo";
  $sql="SELECT zoo.nombre, pais.pais, ciudad.ciudad 
  FROM zoo INNER JOIN pais ON (zoo.id_pais_fk=pais.id_pais)
   INNER JOIN ciudad ON (zoo.id_ciudad_fk=ciudad.id_ciudad) 
   order by zoo.id_zoo ASC";
  $res=mysqli_query(Conectar::con(),$sql);
  while($row=mysqli_fetch_assoc($res)){
      $this->zoo[]=$row;
  }
  return $this->zoo;

}


//metodo para que el admin inserte nuevos zoos
public function insertarz($id_z,$nombre,$tam,$pres_an,$id_pais_fk,$id_ciudad){
  $sql="insert into zoo values($id_z,'$nombre','$tam','$pres_an','$id_pais_fk','$id_ciudad')";
  $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
  echo"
  <script type='text/javascript'>
  Swal.fire({
   title:'Exito',
   text:'El Zoológico se Registro Correctamente',
   icon : 'success',
  }).then((result)=>{
       if(result.value){
         window.location='zooinsert.php';
       }
  });
  </script>";
}

    public function eli_zoo($id){

      $sql="delete from zoo where id_zoo=$id";
      $res=mysqli_query(Conectar::con(),$sql);
      echo"
      <script type='text/javascript'>
      Swal.fire({
       title:'Exito',
       text:'El Zoológico con id $id fue Eliminado',
       icon : 'success',
      }).then((result)=>{
           if(result.value){
             window.location='zooinsert.php';
           }
      });
      </script>";
      
      }

      public function editar_zoo($id,$nombre,$tam,$pres_an){
        $sql="UPDATE zoo SET id_zoo='$id',nombre='$nombre',tamano='$tam',presupuesto_anual='$pres_an' where id_zoo='$id'";
        $res=mysqli_query(Conectar::con(),$sql);
          echo"
         <script type='text/javascript'>
         Swal.fire({
          title:'Exito',
          text:'El Zoo con id $id ha actualizado su informacion exitosamente',
          icon : 'success',
         }).then((result)=>{
              if(result.value){
                window.location='zooinsert.php?id=$id';
              }
         });
         </script>";
      } 
      public function zoo_id($id) {

        $sql="select * from zoo where id_zoo=$id";
        $res=mysqli_query(Conectar::con(),$sql);
        if($reg=mysqli_fetch_assoc($res)) {
          $this->z[]=$reg;
        }
        return $this->z;
      }
  }
// CRUD ANIMAL

class Animal{
  private $animal;
  public function __construct(){
      $this->animal=array();
  }

  public function insertara($id_animal,$fecha_nac,$id_pais_origen_fk,$id_continente_fk,$id_especie_fk,$id_sexo_fk){
    $sql="insert into animal values($id_animal,'$fecha_nac',$id_pais_origen_fk,$id_continente_fk,$id_especie_fk,$id_sexo_fk)";
    $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
    echo"
    <script type='text/javascript'>
    Swal.fire({
     title:'Exito',
     text:'El Animal se Registro Correctamente',
     icon : 'success',
    }).then((result)=>{
         if(result.value){
           window.location='animalinsert.php';
         }
    });
    </script>";
      }

      public function ver_animal(){
        // $sql="select * from animal";
        $sql="SELECT animal.id_animal, animal.fecha_nac, pais.pais, continente.continente, especie.nombre_cientifico, sexo.sexo
        FROM animal INNER JOIN pais ON (animal.id_pais_origen_fk=pais.id_pais)
              INNER JOIN continente ON (animal.id_continente_fk=continente.id_continente)
                    INNER JOIN especie ON (animal.id_especie_fk=especie.id_especie)
                    INNER JOIN sexo ON (animal.id_sexo_fk=sexo.id_sexo)
                    order by animal.id_animal ASC";
        $res=mysqli_query(Conectar::con(),$sql);
        while($row=mysqli_fetch_assoc($res)){
           $this->animal[]=$row;
          }
        return $this->animal;
        
        }

        public function verusuario_animal(){
          $sql="SELECT animal.fecha_nac, pais.pais, especie.nombre_cientifico, sexo.sexo
          FROM animal INNER JOIN pais ON (animal.id_pais_origen_fk=pais.id_pais)
                      INNER JOIN especie ON (animal.id_especie_fk=especie.id_especie)
                      INNER JOIN sexo ON (animal.id_sexo_fk=sexo.id_sexo)
                      order by animal.id_animal ASC";
          $res=mysqli_query(Conectar::con(),$sql);
          while($row=mysqli_fetch_assoc($res)){
             $this->animal[]=$row;
            }
          return $this->animal;
          
          }

        public function editar_animal($id_animal,$fecha_nac,$id_pais_origen_fk,$id_continente_fk,$id_especie_fk	,$id_sexo_fk){
          $sql="UPDATE animal SET id_animal='$id_animal',fecha_nac='$fecha_nac',id_pais_origen_fk='$id_pais_origen_fk',id_continente_fk='$id_continente_fk',id_especie_fk='$id_especie_fk',id_sexo_fk='$id_sexo_fk' where id_animal='$id_animal' ";
          $res=mysqli_query(Conectar::con(),$sql);
            echo"
           <script type='text/javascript'>
           Swal.fire({
            title:'Exito',
            text:'El animal con id $id_animal se ha actualizado exitosamente',
            icon : 'success',
           }).then((result)=>{
                if(result.value){
                  window.location='animalinsert.php?id=$id_animal';
                }
           });
           </script>";
        } 
    
        public function eli_animal($id_animal){
    
          $sql="delete from animal where id_animal=$id_animal";
          $res=mysqli_query(Conectar::con(),$sql);
          echo"
          <script type='text/javascript'>
          Swal.fire({
           title:'Exito',
           text:'El animal con id $id_animal fue Eliminado',
           icon : 'success',
          }).then((result)=>{
               if(result.value){
                 window.location='animalinsert.php';
               }
          });
          </script>";
          
          }
    
        public function animal_id($id_animal) {
    
          $sql="select * from animal where id_animal=$id_animal";
          $res=mysqli_query(Conectar::con(),$sql);
          if($reg=mysqli_fetch_assoc($res)) {
            $this->z[]=$reg;
          }
          return $this->z;
        }  
}
class Especie{
  private $especie;
  public function __construct(){
      $this->especie=array();
  }

  public function insertare($id_especie,$nombre_cientifico,$id_estado_extincion_fk,$id_nombre_vulgar_fk,$id_familia_fk,$id_zoo_fk){
    $sql="insert into especie values($id_especie,'$nombre_cientifico',$id_estado_extincion_fk,$id_nombre_vulgar_fk,$id_familia_fk,$id_zoo_fk)";
    $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
    echo"
    <script type='text/javascript'>
    Swal.fire({
     title:'Exito',
     text:'La especie se Registro Correctamente',
     icon : 'success',
    }).then((result)=>{
         if(result.value){
           window.location='especieinsert.php';
         }
    });
    </script>";
  }
  public function ver_especie(){
    // $sql="select * from especie";
    $sql="SELECT especie.id_especie, especie.nombre_cientifico, estado_extincion.estado_extincion, nombre_vulgar.nombre_vulgar, familia.familia, zoo.nombre 
    FROM especie INNER JOIN estado_extincion ON (especie.id_estado_extincion_fk=estado_extincion.id_estado_extincion)
     INNER JOIN nombre_vulgar ON (especie.id_nombre_vulgar_fk=nombre_vulgar.id_nombre_vulgar)
      INNER JOIN familia ON (especie.id_familia_fk=familia.id_familia) 
      INNER JOIN zoo ON (especie.id_zoo_fk=zoo.id_zoo)
       ORDER BY especie.id_especie ASC";

    $res=mysqli_query(Conectar::con(),$sql);
    while($row=mysqli_fetch_assoc($res)){
       $this->especie[]=$row;
      }
    return $this->especie;
    
    }

    public function verusuario_especie(){
      // $sql="select * from especie";
      $sql="SELECT especie.nombre_cientifico, estado_extincion.estado_extincion, nombre_vulgar.nombre_vulgar, zoo.nombre
       FROM especie INNER JOIN estado_extincion ON (especie.id_estado_extincion_fk=estado_extincion.id_estado_extincion) 
      INNER JOIN nombre_vulgar ON (especie.id_nombre_vulgar_fk=nombre_vulgar.id_nombre_vulgar)
      INNER JOIN familia ON (especie.id_familia_fk=familia.id_familia) 
      INNER JOIN zoo ON (especie.id_zoo_fk=zoo.id_zoo) ORDER BY especie.id_especie ASC";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->especie[]=$row;
        }
      return $this->especie;
      
      }

  public function editar_e($id_especie,$nombre_cientifico,$id_estado_extincion_fk,$id_nombre_vulgar_fk,$id_familia_fk,$id_zoo_fk){
      $sql="UPDATE especie SET id_especie='$id_especie',nombre_cientifico='$nombre_cientifico',id_estado_extincion_fk='$id_estado_extincion_fk',id_nombre_vulgar_fk='$id_nombre_vulgar_fk',id_familia_fk='$id_familia_fk',id_zoo_fk='$id_zoo_fk' where id_especie='$id_especie'";
      $res=mysqli_query(Conectar::con(),$sql);
        echo"
       <script type='text/javascript'>
       Swal.fire({
        title:'Exito',
        text:'La especie con id $id_especie se ha actualizado exitosamente',
        icon : 'success',
       }).then((result)=>{
            if(result.value){
              window.location='especieinsert.php?id=$id_especie';
            }
       });
       </script>";
    } 

    public function eli_especie($id){

      $sql="delete from especie where id_especie=$id";
      $res=mysqli_query(Conectar::con(),$sql);
      echo"
      <script type='text/javascript'>
      Swal.fire({
       title:'Exito',
       text:'La especie con id $id fue Eliminado',
       icon : 'success',
      }).then((result)=>{
           if(result.value){
             window.location='especieinsert.php';
           }
      });
      </script>";
      
      }

    public function especie_id($id_especie) {

      $sql="select * from especie where id_especie=$id_especie";
      $res=mysqli_query(Conectar::con(),$sql);
      if($reg=mysqli_fetch_assoc($res)) {
        $this->z[]=$reg;
      }
      return $this->z;
    }

}

// clases pais y ciudad que son llaves foraneas de zoo
class Pais{
  private $pais;
  
  public function __construct(){
      $this->pais=array();

      }

  public function ver_pais(){
      $sql="select * from pais";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->pais[]=$row;
        }
      return $this->pais;
      
      }

}

class Sexo{
  private $sexo;
  
  public function __construct(){
      $this->sexo=array();

      }

  public function ver_sexo(){
      $sql="select * from sexo";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->sexo[]=$row;
        }
      return $this->sexo;
      
      }

}

class nom_vulgar{
  private $nombre_vulgar;
  
  public function __construct(){
      $this->nombre_vulgar=array();

      }

  public function ver_nombre_vulgar(){
      $sql="select * from nombre_vulgar";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->nombre_vulgar[]=$row;
        }
      return $this->nombre_vulgar;      
      }
}
class Familia{
  private $id_familia_fk;
  
  public function __construct(){
      $this->id_familia_fk=array();

      }

  public function ver_familia(){
      $sql="select * from familia";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->id_familia_fk[]=$row;
        }
      return $this->id_familia_fk;      
      }
}

class Ciudad{
  private $ciudad;
  
  public function __construct(){
      $this->ciudad=array();

      }

  public function ver_ciudad(){
      $sql="select * from ciudad";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->ciudad[]=$row;
        }
      return $this->ciudad;
      
      }

}

class Continente{
  private $continente;
  public function __construct(){
    $this->continente=array();
  }
   public function ver_continentes()
  {
    $sql="select * from continente";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->continente[]=$row;
        }
      return $this->continente;
      
      
  }
}

class Extincion{
  private $extincion;
  public function __construct(){
    $this->extincion=array();
  }
  public function ver_extincion()
  {
    $sql="select * from estado_extincion";
      $res=mysqli_query(Conectar::con(),$sql);
      while($row=mysqli_fetch_assoc($res)){
         $this->extincion[]=$row;
        }
      return $this->extincion;
      
      
  }
}
?>
   <!-- Optional JavaScript; choose one of the two! -->
<script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>