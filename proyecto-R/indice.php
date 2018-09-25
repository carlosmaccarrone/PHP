<!DOCTYPE html>
<html>
<head>
	<script>
	
	function bigImg(x){
		x.style.fontSize  = "140%";
	}

	function normalImg(x){
		x.style.fontSize  = "100%";
	}

	</script>

	<style>

	form.formulariouno {
		margin-top: 5em;
		margin-left: 600px;
		border: 3px solid blue;
		border-radius: 10px;
		height: 190px;
		width: 480px;
		background-color: #ccff99;
	}

	.labelone {
		margin-top: 2em;
		margin-right: 26px;	
		color:blue ;
		font-weight: bold;
	}

	.inputone:focus {
		border-color: red;
	}

	.inputone {
		height: 2em;
		border: 2px solid blue;
		border-radius: 5px;
		margin-top: 2em;
		background-color: #ccff33;
		color: blue;
	}

	.labeltwo {
		margin-top: 1em;
		margin-right: 28px;	
		color: blue;
		font-weight: bold;
		margin-left: 20px;
	}

	.inputtwo:focus {
		border-color: red;
	}

	.inputtwo {
		height: 2em;
		border: 2px solid blue;
		border-radius: 5px;
		margin-top: 1em;
		background-color: #ccff33;
		color: blue;
	}

	div.claseone {
		margin-left: 4em;
	}

	div.clasetwo {
		margin-left: 4em;
	}

	.inputthree:focus {
		border-color: red;
	}

	.inputthree:hover {
		color: red;
	}

	.inputthree {
		height: 2em;
		border: 2px solid blue;
		border-radius: 10px;
		margin-top: 2em;
		width: 24em;
		color: blue;
		background-color: #ccff33;
	}

	.claseTitulo {
		margin-top: -2em;
		margin-left: 180px;
		color: blue;
	}

	div.apendice {
		margin-top: 10em;
		margin-left: 12em;
	}

	.arreglo {
		display: block;
		color: red;
		font-size: 20px;
	}

	svg.ScalableVectorGraphics {
		height: 80px;
		width: 200px;
		font-size: 16px;
		margin-left: -1em;
	}

	</style>

	<title>Proyecto R</title>
</head>
<body>

<svg class="ScalableVectorGraphics">
  <text x="0" y="15" fill="blue" transform="rotate(-30 120,0)" onmouseover="bigImg(this);" onmouseout="normalImg(this);">Proyecto R</text>
  Sorry, your browser does not support inline SVG.
</svg>

	<h1 class="claseTitulo">Proyecto R</h1>

	<form action="consulta.php" method="post" class="formulariouno" autocomplete="off">

		<div class="claseone">
			<label class="labelone">Usuario: </label>
			<input class="inputone" type="text" maxlength="20" width="30" name="_user">
		</div>

		<div class="claseone">	
			<label class="labeltwo">Clave: </label>
			<input class="inputtwo" type="password" maxlength="20" width="30" name="_pass">
		</div>

		<div class="clasetwo">
			<input class="inputthree" type="submit" value="Enviar">
		</div>

	</form>

	<div class="apendice">

		<label class="arreglo" onmouseover="bigImg(this);" onmouseout="normalImg(this);">
			HOLA MUNDO
		</label>

	</div>

</body>
</html>