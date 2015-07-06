<?php
  require_once ('../Model/dao/TarefaDao.php');
  require_once ('../Model/pojo/Tarefa.php');
  class TarefaController{

    function criar($objTarefa){
      $objTarefaDao = new TarefaDao;
      $retorno = $objTarefaDao->criar($objTarefa);
      echo json_encode($retorno);
      exit;
    }

    function ler($ativa){
      $objTarefaDao = new TarefaDao;
      $retorno = $objTarefaDao->ler($ativa);
      echo json_encode($retorno);
      exit;
    }

    function atualizar($objTarefa){
      $objTarefaDao = new TarefaDao;
      $retorno = $objTarefaDao->atualizar($objTarefa);
      echo json_encode($retorno);
      exit;
    }

    function excluir($objTarefa){
      $objTarefaDao = new TarefaDao;
      $retorno = $objTarefaDao->excluir($objTarefa);
      echo json_encode($retorno);
      exit;
    }
  }

  /*
  *opc 1 => Criar nova tarefa
  *opc 2 => Buscar tarefas ativas / Buscar tarefas não ativas
  *opc 3 => Atualizar ativa
  *opc 4 => Atualizar prioridade

  */

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  $opc = $request->opc;

  if($opc == 1){
   $ObjTarefaCtr = new TarefaController;
   $objTarefa = new Tarefa;
   $objTarefa->descricao =  $request->info;
   $ObjTarefaCtr->criar($objTarefa);
  }
  else if($opc == 2){
    $ObjTarefaCtr = new TarefaController;
    $ObjTarefaCtr->ler($request->info);
  }
  else if($opc == 3){
    $ObjTarefaCtr = new TarefaController;
    $objTarefa = new Tarefa;
    $objTarefa->id = $request->id;
    $objTarefa->ativa = $request->info;
    $ObjTarefaCtr->atualizar($objTarefa);
  }
  else if($opc == 4){
    $ObjTarefaCtr = new TarefaController;
    $objTarefa = new Tarefa;
    $objTarefa->id = $request->id;
    $objTarefa->prioridade = $request->info;
    $ObjTarefaCtr->atualizar($objTarefa);
  }
  else if($opc == 5){
    $ObjTarefaCtr = new TarefaController;
    $objTarefa = new Tarefa;
    $objTarefa->id = $request->id;
    $ObjTarefaCtr->excluir($objTarefa);
  }
  exit;
 ?>