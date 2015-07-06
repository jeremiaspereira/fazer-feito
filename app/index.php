<!DOCTYPE html>
<html ng-app="myapp">
  <head>
    <title>fazer/feito</title>
    <meta charset="utf-8">
    <meta name="description" content="Uma pequena lista de tarefas usando PHP e Angularjs">
    <meta name="keywords" content="PHP, HTML, CSS, SASS, JavaScript, Angularjs">
    <meta name="author" content="Jeremias Pereira - jeremiastpereira@gmail.com">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png?f="<?php time() ?>/>

    <script src="js/angular.min.js"></script>
    <script src="js/my-angular.js"></script>

    <script src="js/jquery-1.11.3.js"></script>
    <script src="assets/bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <link href="assets/bootstrap-3.3.4/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body ng-controller="TarefasController">
    <div class="cabecalho">
      <h2> <span class="fazer">fazer</span>/<span class="feito">feito</span></h2>
    </div>
    <section class="conteudo">
      <div class="cabecalho-ativas">
        <h3>fazer</h3>
      </div>
      <div class="tarefas-ativas">
        <div class="lista-ativas">
          <ul>
            <li ng-repeat="t in tarefasAtivas">
              <div class="descricao prioridade-{{t.prioridade}}">{{t.descricao}}</div>
              <div class="acao">
                <div ng-click="atualizarAtiva(t.id, 'N')" class="btn-ativas" title="Desativas">
                 <i class="fa fa-check"></i>
                </div>
                <div ng-click="atualizarPrioridade(t.id, t.prioridade)" class="btn-prioridade" title="Mudar prioridade">
                  <i class="fa fa-arrows-v"></i>
                </div>
              </div>
              <div class="limpar"></div>
            </li>
          </ul>
        </div>
        <div class="limpar"></div>
        <div class="link-nova">
          <a ng-click="toggleCustom()">Fazer...</a>
        </div>
        <div class="form-tarefa" ng-hide="custom">
          <form ng-submit="novaTarefa()">
            <input type="text" class="form-control" ng-model="inputTarefa">
          </form>
        </div>
        <div class="limpar"></div>
      </div><!--tarafas-ativas-->

      <div class="cabecalho-desativas">
        <h3> feito</h3>
      </div>
      <div class="tarefas-desativas">
        <div class="lista-desativas">
          <ul>
            <li ng-repeat="t in tarefasDesativas">
              <div class="descricao prioridade-0">{{t.descricao}}</div>
              <div class="acao">
                <div ng-click="atualizarAtiva(t.id, 'S')" class="btn-ativas" title="Reativas">
                  <i class="fa fa-check"></i>
                </div>
                <div ng-click="excluir(t.id)" class="btn-excluir" title="Excluir">
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="limpar"></div>
            </li>
          </ul>
        </div>
        <div class="limpar"></div>
      </div>
    </section>
  </body>
  <footer class="footer">
    <ul>
      <li>
       Jeremias Pereira
      </li>
      <li>|</li>
      <li><a href="http://jeremiaspereira.net" target="_brank">www.jeremiaspereira.net</a></li>
    </ul>
  </footer>
</html>