<?php

// completa las materias segun el area de aprendizaje
$rpta = "";

if ($_POST ["elegido"] == "1") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="castellano">Castellano</option>
	<option value="Ingles">Ingles</option>
	<option value="matematica">matematica</option>
	<option value="ed_fisica">ed_fisica</option>
	<option value="art_patrimonio">arte_patrimonio</option>
	<option value="cs_naturales">cs_naturales</option>
	<option value="fisica">fisica</option>
	<option value="quimica">quimica</option>
	<option value="biologia">biologia</option>
	<option value="cs_tierra">cs_tierra</option>
	<option value="ghc">ghc</option>
	<option value="fsn">fsn</option>
	<option value="orientacion">orientacion</option>
	<option value="gcrp">gcrp</option>
	
			
        	';
}

if ($_POST ["elegido"] == "2") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="cast">Castellano</option>
	<option value="Ing">Ingles</option>
	<option value="cast">Castellano</option>
	<option value="mat">Matematica</option>
	<option value="ed_fis">Educación Física</option>
	<option value="art_p">Arte y Patrimonio</option>
	<option value="cs_naturales">Cs Naturales</option>
	<option value="ghc">GHC</option>
	<option value="orientacion">Orientación</option>
	<option value="ge">Grupo de Interes</option>		
        	';
}

if ($_POST ["elegido"] == "3") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="cast">Castellano</option>
	<option value="Ing">Ingles</option>
	<option value="cast">Castellano</option>
	<option value="mat">Matematica</option>
	<option value="ed_fis">Educación Física</option>
	<option value="fisica">Fisica</option>
	<option value="quimica">Química</option>
	<option value="bio">Biologia</option>
	<option value="ghc">GHC</option>
	<option value="orientacion">Orientación</option>
	<option value="ge">Grupo de Interes</option>
			
        	';
}


if ($_POST ["elegido"] == "4") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="cast">Castellano</option>
	<option value="Ing">Ingles</option>
	<option value="cast">Castellano</option>
	<option value="mat">Matematica</option>
	<option value="ed_fis">Educación Física</option>
	<option value="fisica">Fisica</option>
	<option value="quimica">Química</option>
	<option value="bio">Biologia</option>
	<option value="ghc">GHC</option>
	<option value="fsn">FSN</option>
	<option value="orientacion">Orientación</option>
	<option value="ge">Grupo de Interes</option>
			
        	';
}

if ($_POST ["elegido"] == "5") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="cast">Castellano</option>
	<option value="Ing">Ingles</option>
	<option value="cast">Castellano</option>
	<option value="mat">Matematica</option>
	<option value="ed_fis">Educación Física</option>
	<option value="fisica">Fisica</option>
	<option value="quimica">Química</option>
	<option value="bio">Biologia</option>
	<option value="cs_tierra">Cs Tierra</option>
	<option value="ghc">GHC</option>
	<option value="fsn">FSN</option>
	<option value="orientacion">Orientación</option>
	<option value="ge">Grupo de Interes</option>
			
        	';
}



if ($_POST ["elegido"] == "nunca") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="cast">Castellano</option>
	<option value="Ing">Ingles</option>
	<option value="cast">Castellano</option>
	<option value="mat">Matematica</option>
	<option value="ed_fis">Educación Física</option>
	<option value="art_p">Arte y Patrimonio</option>
	<option value="cs_naturales">Cs Naturales</option>
	<option value="fisica">Fisica</option>
	<option value="quimica">Química</option>
	<option value="bio">Biologia</option>
	<option value="cs_tierra">Cs Tierra</option>
	<option value="ghc">GHC</option>
	<option value="fsn">FSN</option>
	<option value="orientacion">Orientación</option>
	<option value="ge">Grupo de Interes</option>
			
        	';
}




echo $rpta;

?>