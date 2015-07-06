<?php
  require_once ('../Model/Conexao.php');
  require_once ('../Model/pojo/Tarefa.php');

  class TarefaDao extends Conexao{
    public $conex = null;

    public function __construct(){
      $this->conex = Conexao::getInstance();
    }

    function criar($objTarefa){ print_r($objTarefa);
      try{
        $sql= "INSERT INTO tarefas(descricao) VALUES (?)";

        $stmt = $this->conex->prepare($sql);
        $stmt->bindValue(1, $objTarefa->descricao);
        $stmt->execute();
        Conexao::close();
        return "ok";
      }catch ( PDOException $ex ){
        return $ex->getMessage();
      }
    }

    function ler($criteria){
      try{
        $sql= "SELECT *FROM tarefas WHERE ativa = ? ORDER BY prioridade" ;
        $stmt = $this->conex->prepare($sql);
        $stmt->bindValue(1, $criteria);
        Conexao::close();
        $stmt->execute();

        $tarefas = array();
        while($row = $stmt->fetch()) {
          $objTarefa = new Tarefa;
          $objTarefa->id = $row['id'];
          $objTarefa->descricao = $row['descricao'];
          $objTarefa->prioridade =$row['prioridade'];
          $tarefas[] = $objTarefa;
        }
        return $tarefas;
      }catch ( PDOException $ex ){
        return $ex->getMessage();
      }
    }

    function atualizar($objTarefa){
      $stmt;
      try{
        if($objTarefa->ativa !=""){
          $sql = "UPDATE tarefas SET ativa =? WHERE id =?";
          $stmt = $this->conex->prepare($sql);
          $stmt->bindValue(1, $objTarefa->ativa);
          $stmt->bindValue(2, $objTarefa->id);
        }
        if($objTarefa->prioridade > 0){
          $sql = "UPDATE tarefas SET prioridade =? WHERE id =?";
          $stmt = $this->conex->prepare($sql);
          $stmt->bindValue(1, $objTarefa->prioridade);
          $stmt->bindValue(2, $objTarefa->id);
        }

        $stmt->execute();
        Conexao::close();
        return "ok";
      }catch ( PDOException $ex ){
        return $ex->getMessage();
      }
    }

    function excluir($objTarefa){
      try{
        $sql = "DELETE FROM tarefas WHERE id =?";
        $stmt = $this->conex->prepare($sql);
        $stmt->bindValue(1, $objTarefa->id);
        $stmt->execute();
        Conexao::close();
        return "ok";
      }catch ( PDOException $ex ){
        return $ex->getMessage();
      }
    }
  }

?>