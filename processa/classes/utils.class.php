<?php
  function edita_cadastra($menu){
    if($menu == 'cadastrar'){
      return 'Cadastrar';
    }elseif($menu == 'editar'){
      return 'Editar';
    }
  }

  function value_edita($tipo, $value){
    if(@$tipo == 'editar'){
        return $value;
    }
  }
