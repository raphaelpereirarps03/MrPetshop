<?php

  require_once '../../dao/admDao.php';
  $adms = AdmDao::selectAll();

?>

<!DOCTYPE html>
  <?php
  session_start();
  ?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MR PetShop </title>
  <link rel="short icon" href="./../../img/site/logo.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
  <?php 
    include('./../../componentes/header-adm.php');
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
    <?php 
      include('./../../componentes/menu-adm.php');
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="row align-items-center mb-4">
          <div class="col fs-3 fw-semibold">
            Lista de Usuário
          </div>
          <div class="col text-end ">
            <a class="btn btn-success px-3" role="button" aria-disabled="true" href="register.php"><i
                class="fas fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class=" row">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">Código</th>
                <th class="col-md-2">Data de Nascimento </th>
                <th class="col-md-2">Nome Completo</th>
                <th class="col-md-2">CPF</th>
                <th class="col-md-2">Email</th>
                <th class="col-md-1">Senha</th>
                
                <th class="text-center col-md-1">Alterar</th>
                <th class="text-center col-md-1">Excluir</th>
              </tr>
              <?php foreach($adms as $adm) { ?>
              <tr>
                <td><?=$adm[0]?></td>
                <td><?= date ('d/m/Y', strtotime ($adm[4])); ?></td>
                <td><?=$adm[1]?></td>
                <td><?=$adm[2]?></td>
                <td><?=$adm[3]?></td>
                <td><?=$adm[5]?></td>
                <td class="text-center">
                  <form action="process.php" method="POST">
                    <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$adm[0]?>">
                    <button type="submit" class="dropdown-item" ><i
                        class="fas fa-edit fa-lg text-secondary"></i>
                    </button>
                  </form>
                </td>
                <td class="text-center ">
                  <a class="dropdown-item" onclick="modalRemover(<?=$adm[0]?>,'codDeletar')">
                    <i class="fas fa-trash-alt fa-lg text-danger"></i>
                  </a>
                </td>
              <tr>
              <?php } ?>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalExcluir" role="dialog">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Administrador</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  ">
          <form action="process.php" method="post">
            <input type="hidden" class="form-control" id="codDeletar" name="codDeletar" type="text">
            <input type="hidden" class="form-control" value="DELETE" name="acao" type="text">
            <p>Tem certeza que deseja excluir o item selcionado?
            <div class=" text-end">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-warning ms-3">Sim </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?= require './../../componentes/modal.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src='../../js/personalizar.js'></script>
</body>

</html>