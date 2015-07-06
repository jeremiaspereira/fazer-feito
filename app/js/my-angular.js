
  var app = angular.module("myapp",[]);

  var url ="../app/controller/";

  app.controller("TarefasController", ['$scope', '$http','$timeout', function ($scope, $http, $timeout) {
    // nova tarefa
    $scope.novaTarefa = function () {
      if($scope.inputTarefa != ""){
        $http.post(url + "TarefaController.php", {opc:1, info: $scope.inputTarefa}).
          success(function (data, status, headers, config) {

          }).
          error(function (data, status, headers, config) {
            alert("Erro ao salvar sua terefa):");
          });
          $scope.inputTarefa = "";
          $scope.buscarTarefasAtivas();
          $scope.atualizarPagina();
          $scope.custom = true;
        };
      }

    //Buscar tarefas ativas
    $scope.buscarTarefasAtivas = function () {
      $http.post(url + "TarefaController.php", {opc:2, info: 'S'}).
        success(function (data, status, headers, config) {
            $scope.tarefasAtivas = data;
        }).
        error(function (data, status, headers, config) {
          alert("Erro ao salvar sua terefa):");
        });
    };

    //buscar tarefas desativas
    $scope.buscarTarefasDesativas = function () {
      $http.post(url + "TarefaController.php", {opc:2, info: 'N'}).
        success(function (data, status, headers, config) {
          $scope.tarefasDesativas = data;
        }).
        error(function (data, status, headers, config) {
          alert("Erro ao salvar sua terefa):");
        });
    };

    //Atualizar ativa
    $scope.atualizarAtiva = function (id, ativa) {
      $http.post(url + "TarefaController.php", {opc:3, info: ativa, id: id}).
        success(function (data, status, headers, config) {
          $scope.buscarTarefasDesativas();
          $scope.buscarTarefasAtivas();
          $scope.atualizarPagina();
        }).
        error(function (data, status, headers, config) {
          alert("Erro ao salvar sua terefa):");
        });
    };

    //Atualizar prioridade
    $scope.atualizarPrioridade = function (id, prioridade) {
      if(prioridade < 3){
        prioridade++;
      }else{
        prioridade = 1;
      }
      $http.post(url + "TarefaController.php", {opc:4, info: prioridade, id: id}).
        success(function (data, status, headers, config) {
          $scope.buscarTarefasAtivas();
          $scope.atualizarPagina();
        }).
        error(function (data, status, headers, config) {
          alert("Erro ao salvar sua terefa):");
        });
    };

    //excluir tarefa
    $scope.excluir = function (id, prioridade) {
      if(prioridade < 3){
        prioridade++;
      }else{
        prioridade = 1;
      }
      $http.post(url + "TarefaController.php", {opc:5, id: id}).
        success(function (data, status, headers, config) {
          $scope.buscarTarefasDesativas();
          $scope.atualizarPagina();
        }).
        error(function (data, status, headers, config) {
          alert("Erro ao salvar sua terefa):");
        });
    };

    $scope.buscarTarefasDesativas();
    $scope.buscarTarefasAtivas();

    //toggle formulario
    $scope.custom = true;
    $scope.toggleCustom = function () {
      $scope.custom = $scope.custom === false ? true : false;
    };


    $scope.atualizarPagina = function () {
      setTimeout(function () {
        if(!$scope.$$phase) {
         $scope.$apply();
        }
     }, 800);
    };

  }]);






