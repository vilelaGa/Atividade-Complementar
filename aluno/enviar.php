<!doctype html>
<html lang="pt-br">

<?php

//Verifica a sessão
include("verify.php");

//ERRO PARAMETRO GET
@$erroLimit = base64_decode($_GET['limite']);

use App\SelectUsuario\SelectUsuario;

//TRAZ A GRADE DO USER
$CODGRADE = SelectUsuario::TrazCodGrade($response->data[0]->IDHABILITACAOFILIAL);

// echo $response->data[0]->CODCOLIGADA . '<br>';
// echo $response->data[0]->CODCURSO . '<br>';
// echo $response->data[0]->CODHABILITACAO . '<br>';
// echo $CODGRADE;

//TRAZ A DURAÇÃO DO USER
$trazDuracao = SelectUsuario::trazDuracao($response->data[0]->CODCOLIGADA, $response->data[0]->CODCURSO, $response->data[0]->CODHABILITACAO, $CODGRADE);

// echo ($trazDuracao['DURACAO']);

?>


<?php

// Nome da pagina
define("NOME_PAGINA", "Enviar");

// Head
include("includes/head.php");

?>

<body>

    <div class="wrapper d-flex align-items-stretch">

        <!-- NAVBAR -->
        <?php include("includes/nav.php"); ?>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <!-- NAVBAR NAMEUSER -->
            <?php include("includes/navUser.php"); ?>

            <h2 class="mb-5">Envio de atividade <span><?= $erroLimit ?></span>

                <?php
                //Aviso Envio invalido

                if (isset($_SESSION['envioInvalidoAluno'])) :
                ?>
                    - <span class="badge badge-danger">Algum campo inválido</span>
                <?php endif;
                unset($_SESSION['envioInvalidoAluno'])

                //Aviso Envio invalido
                ?>

                <!-- <span class="badge badge-primary">SISTEMA ABERTO SOMENTE PARA ALUNOS DE ÚLTIMO PERÍODO</span> -->

            </h2>


            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <!-- FORM -->
                        <?php //if ($response->data[0]->PERIODO == $trazDuracao['DURACAO']) {
                        ?>
                        <!-- <form action="" name="form_main" method="POST" enctype="multipart/form-data"> -->
                        <form action="../data/envio_aluno.php" name="form_main" method="POST" enctype="multipart/form-data">
                            <input class="form-control mb-4" placeholder="<?= $response->data[0]->NOMEMATRIZ ?>" disabled>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Data Inicial <b class="text-danger">*</b></label>
                                    <input class="form-control" type="date" name="dataIni">
                                </div>
                                <div class="col-md-6">
                                    <label>Data Final <b class="text-danger">*</b></label>
                                    <input class="form-control" type="date" name="dataFin">
                                </div>
                            </div>

                            <input class="form-control " type="number" placeholder="Carga horaria *" name="cargaHor">

                            <br><br>
                            <span><b class="text-danger">Suporte:</b><a href="mailto:central.atividades@ubm.br"> central.atividades@ubm.br</a>
                                <!-- <br><b class="text-danger">AVISO: </b> Dia 01/02 será reaberto para todos alunos. -->
                            </span>

                    </div>

                    <div class="col-md-6">

                        <textarea class="form-control" rows="2" maxlength="60" id="descricao" name="descricao" placeholder="Descrição *" oninput="countText()"></textarea>

                        <span>Caracteres: <b><span id='caracteres'>0</span></b> | </span>
                        <b><span>Limite de caracteres: <span class="text-danger">60</span></span></b>
                        <script>
                            function countText() {
                                let descricao = document.form_main.descricao.value;
                                document.getElementById('caracteres').innerText = descricao.length;

                            }
                        </script>
                        <textarea class="form-control mt-3" rows="1" name="obs" placeholder="Observação"></textarea>


                        <div class="custom-file mt-3 mb-4">
                            <input type="file" name="file" class="custom-file-input" accept="application/pdf" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" for="customFileLang">Selecione <b>um PDF</b> <b class="text-danger">*</b></label>
                            <span>Máximo: <b class="text-danger">4MB</b></span>
                        </div>

                        <button class="btn btn-primary mt-3">Enviar atividade</button>
                        </form>
                        <!-- FORM -->
                        <?php //} else {
                        ?>
                        <!-- <span><b class="text-danger">Suporte:</b><a href="mailto:central.atividades@ubm.br"> central.atividades@ubm.br</a>
                            <br><b class="text-danger">AVISO: </b> Dia 01/02 será reaberto para todos alunos.
                        </span> -->
                        <?php //}
                        ?>

                    </div>
                </div>
            </div>



        </div>
    </div>


    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html>