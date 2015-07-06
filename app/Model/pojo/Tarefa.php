<?php

  class Tarefa implements \JsonSerializable{
    private $id = null;
    private $descricao = null;
    private $ativa = null;
    private $prioridade = null;

    public function __set($atrib, $value){
      $this->$atrib = $value;
    }

    public function __get($atrib){
      return $this->$atrib;
    }

    public function JsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
    }


  }

 ?>