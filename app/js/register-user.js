var app = angular.module("ContatoFormApp", []);

app.controller("ContatoFormController", function ContatoFormController($scope, $http) {

    $scope.action = "inserirContato"
    $scope.contato = {}
    $scope.contato.prnome = ""
    $scope.contato.sbrnome = ""

    $scope.contato.formasDeContato = [{
        tipoContato: null,
        info: ""
    }]

    $scope.addFormaDeContato = function () {
        $scope.contato.formasDeContato.push({
            tipoContato: null,
            info: ""
        })
    }

    setTimeout(function () {
        $http.get('http://localhost/lista-contatos-angular/ajax/tipo-contato.php?action=getTiposContato').then(function (response) {
            $scope.tiposContato = response.data;
        });
    }, 3000);

    $scope.insereContato = function () {
        $http.post("http://localhost/lista-contatos-angular/ajax/contato.php?action=" + $scope.action, $scope.contato).then(function () {
            $http.get("http://localhost/lista-contatos-angular/ajax/contato.php?action=getContatos").then(function (response) {
                $scope.contatos = response.data
            })
            alert("Sucesso");
        }, function () {
            alert("Erro");
        });
    }

    setTimeout(function () {
        $http.get("http://localhost/lista-contatos-angular/ajax/contato.php?action=getContatos").then(function (response) {
            $scope.contatos = response.data
        })
    }, 3000)

    $scope.removeContato = function (id) {
        $http.post("http://localhost/lista-contatos-angular/ajax/contato.php?action=removeContato", {id: id}).then(function () {
            $http.get("http://localhost/lista-contatos-angular/ajax/contato.php?action=getContatos").then(function (response) {
                $scope.contatos = response.data
            })
            alert("Usuário removido com sucesso")
        }, function () {
            alert("Erro ao tentar remover usuário")
        })
    }

    $scope.trocaAcaoParaEditar = function (contato) {
        $scope.contato = contato
        $scope.action = "editarContato"
        $http.get("http://localhost/lista-contatos-angular/ajax/contato.php?action=getFormasContatoContato&id=" + contato.id).then(function (response) {
            contato.formasDeContato = response.data
        })
    }

    $scope.trocaAcaoParaInserir = function () {
        $scope.contato = {}
        $scope.contato.prnome = ""
        $scope.contato.sbrnome = ""

        $scope.contato.formasDeContato = [{
            tipoContato: null,
            info: ""
        }]
        $scope.action = "inserirContato"
    }

    $scope.removerFormaDeContatoContato = function (id) {
        $http.post("http://localhost/lista-contatos-angular/ajax/contato.php?action=removerFormaDeContatoContato", {id: id}).then(function () {
            $http.get("http://localhost/lista-contatos-angular/ajax/contato.php?action=getFormasContatoContato&id=" + $scope.contato.id).then(function (response) {
                $scope.contato.formasDeContato = response.data
            })
            alert("Sucesso")
        }, function () {
            alert("Erro")
        })
    }
})