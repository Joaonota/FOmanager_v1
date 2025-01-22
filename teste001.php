<?php require "estilo.php" ?>

<style type="text/css">
	
	.hidden{
		display: none;
	}
</style>

<div data-popup="" class="popup-dialog popup-dialog" role="dialog" aria-modal="true">
	<div class="popup-content">
		<form data-form="" action="" novalidate="" class="form card OSFillParent" id="Form1">
		<div data-container="" style="margin-bottom: 20px;">
			<span data-expression="" style="font-size: 16px; font-weight: bold;">MIGUEL LUIS MINESES</span>
		</div>
		<div data-container="">
			<label data-label="" class="ThemeGrid_Width4" for="Dropdown4">
			<span style="font-weight: bold;">Horas extra</span>
		</label><div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: left;">
			<span onclick="toggleInpu()">
				<input data-switch="" class="switch" type="checkbox" id="Switch2" onclick="toggleInpu()"></span>
			</div>
		</div>
		<div data-container="" class="ThemeGrid_Width6">
			<label data-label="" class="ThemeGrid_Width5">
				<span style="font-weight: bold;">&nbsp;Extra IN</span>
			</label>
			<span class="input-time">
				<input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="" id="Input_TimeIn4"></span>
			</div>
			<div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter">
				<label data-label="" class="ThemeGrid_Width5">
					<span style="font-weight: bold;">&nbsp;Extra Out</span>
				</label>
				<span class="input-time">
					<input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="" id="Input_TimeIn5">
				</span>
			</div>
			<div  id="Input_TimeIn7" class="hidden">
				<label data-label="" class="ThemeGrid_Width5">
					<span style="font-weight: bold;">Hora de Entrada</span>
				</label>
				<span class="input-time">
					<input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="" >
				</span>
			</div>
			<div  id="Input_TimeIn6" class="hidden">
				<label data-label="" class="ThemeGrid_Width5">
					<span style="font-weight: bold;">Hora de Saida</span>
				</label><span class="input-time">
					<input data-input="" class="form-control OSFillParent" type="time" aria-required="false" >
				</span>
			</div>
			<div data-container="" class="align-items-center display-flex">
				<button data-button="" class="btn" type="button">Sair</button>
				<button data-button="" class="btn btn-primary ThemeGrid_MarginGutter" type="submit" style="background-color: rgb(89, 172, 227);">Adicionar</button>
				<div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: right;">
					<i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85); font-size: 32px;"></i></div></div></form></div></div>
<script type="text/javascript">

	function toggleInpu(){
		var switchT = document.getElementById("Switch2");
		var inputF = document.getElementById("Input_TimeIn6");
		var inputF2 = document.getElementById("Input_TimeIn7");
		switchT.checked =! switchT.checked;
console.log(switchT.checked);
		if (switchT.checked) {
			inputF2.classList.remove("hidden");
			inputF.classList.remove("hidden");
		}else{
			inputF2.classList.add("hidden");
			inputF.classList.add("hidden");
		}
	}
	
</script>