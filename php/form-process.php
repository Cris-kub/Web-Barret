
<?php
include("conexion.php");
			if(isset($_POST['Conacto_nombre'])){
				$nombre		     = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$apellidos		     = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_apellido"],ENT_QUOTES)));//Escanpando caracteres 
				$email	 = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_email"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono	 = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_teléfono"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha	     = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_fecha"],ENT_QUOTES)));//Escanpando caracteres 
				$ciudad		 = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_ciudad"],ENT_QUOTES)));//Escanpando caracteres 
				$mensaje		 = mysqli_real_escape_string($con,(strip_tags($_POST["Conacto_mensaje"],ENT_QUOTES)));//Escanpando caracteres 
				if (isset($_POST['Conacto_datos'])){
                    $proteciondatos = 1;

                }else{
                    $proteciondatos = 0;

                }
			

				$cek = mysqli_query($con, "SELECT * FROM clientes WHERE email='$email '");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO `clientes`(`nombre`, `apellido`, `email`, `telefono`, `fecha_evento`, `ciudad`, `mensaje`, `derechos_imagen`)
															VALUES('$nombre','$apellidos', '$email', $telefono, '$fecha', '$ciudad', '$mensaje', $proteciondatos )") or die(mysqli_error());
						if($insert){
							echo 'success';
						}else{
							echo 'Error. No se pudo guardar los datos';
						}
					 
				}else{
					echo 'El email introducido ya existe!';
				}
			}else{
                echo 'rellena los campos';
            }
?>
