<?php

class Conexao {
  private static $instance = null;

  private static $dbType = "mysql";

  /* Host do banco de dados*/
  private static $host = "localhost";

  /* Usuario de conexao ao banco de dados */
  private static $user = "root";

  /* Senha de conexao ao banco de dados */
  private static $senha = "";

  /* Nome do banco de dados */
  private static $db = "fazer_feito";

  protected static $persistent = false;

  public static function getInstance(){
    if(self::$persistent != FALSE)
      self::$persistent = TRUE;

    if(!isset(self::$instance)){
      try {
        self::$instance = new \PDO(self::$dbType . ':host=' . self::$host . ';dbname=' . self::$db
                , self::$user
                , self::$senha
                , array(\PDO::ATTR_PERSISTENT => self::$persistent));

      } catch (\PDOException $ex) {
        exit ("Erro ao conectar com o banco de dados: " . $ex->getMessage());
      }
    }

    return self::$instance;
  }

  /**
   * Fecha a instancia de conexao ao banco de dados
   */
  public static function close() {
    if (self::$instance != null) {
      self::$instance = null;
    }
  }
}

?>