<html>
    <head>
        <meta charset="UTF-8">
        <title>Tribunal</title>
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/css/bootstrap.css"> 
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/css/datatables.min2.css">
        <script type='text/javascript' src='<?= $this->config->base_url(); ?>assets/js/jquery.min.js'></script>
        <script type='text/javascript' src='<?= $this->config->base_url(); ?>assets/js/jquery.mask.min.js'></script>
        <script type='text/javascript' src='<?= $this->config->base_url(); ?>assets/js/bootstrap.js'></script>
        <script type='text/javascript' src='<?= $this->config->base_url(); ?>assets/js/jquery.validate.min.js'></script>

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid" style="margin-left: 250px">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->config->base_url() . 'index.php' ?>">Tribunal</a> <!--index.php/Home/index -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                        
                        <li class="dropdown <?= ($menu == 'juiz') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Juizes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Juiz/Listar'?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Juiz/Cadastrar'?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'advogado') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advogados<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Advogado/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Advogado/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'pessoa') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pessoas<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Pessoa/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Pessoa/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'reu') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Réus<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Reu/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Reu/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'testemunha') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Testemunhas<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Testemunha/Listar' ?>">Listar</a></li>
                                <li><a href="<?=
                                    $this->config->base_url() . 'index.php/Testemunha/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'vitima') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vítimas<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Vitima/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Vitima/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'jurado') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jurados<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Jurado/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Jurado/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown <?= ($menu == 'processo') ? 'active' : ' '; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Processos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->config->base_url() . 'index.php/Processo/Listar' ?>">Listar</a></li>
                                <li><a href="<?= $this->config->base_url() . 'index.php/Processo/Cadastrar' ?>">Cadastrar</a></li>                                
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>