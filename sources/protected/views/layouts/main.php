<?php
/* @var $this Controller */
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile('scripts/jquery.pikachoose.js');
Yii::app()->clientScript->registerScript(
        1, "                  
    $(document).ready(function() {
         $(\"#pikame\").PikaChoose();
    });
");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox-1.3.4.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div id="container">
            <header style="margin-bottom: 40px">
                <br />
                <br />
                <hgroup class="intro">
                    <h1 class="title">Feito Brick</h1>

                </hgroup>
                <div class="reservations" style="width: 300px"><br />
                    <h3 class="tagline">Seu Site de Vendas na Internet</h3>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <hr class="hr-solid" />
                <nav style="margin-top: 20px">
                    <ul id="nav">
                        <li><a href="index.html" class="current">Início</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/produtos') ?>">Produtos</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/sobre') ?>">Sobre</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/contato') ?>">Contato</a></li>
                        <?php if (Yii::app()->user->isGuest): ?>
                            <li><a href="<?php echo Yii::app()->createUrl('site/novoUsuario') ?>">Cadastro</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('site/entrar') ?>">Entrar</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo Yii::app()->createUrl('site/meusProdutos') ?>">Meus Produtos</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('site/sair') ?>">Sair</a></li>

                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
            <?php echo $content; ?>
            <footer>
                <div class="border"></div>
                <br />
                <div class="footer-widget">
                    <h4>Princípios e Valores</h4>
                    <p>Assegurar produtos de qualidade por um preço justo para os consumidores; Garantir a segurança nas transações bancárias e de mercadorias; Oferecer atendimento eficiente e ágil ao cliente no momento que ele precisar; Proporcionar acessibilidade a qualquer pessoa que deseja comercializar seus bens.</p>
                </div>
                <div class="footer-widget">
                    <h4>Missão</h4>
                    <p>A empresa FeitoBrick tem como filosofia proporcionar um mundo mais justo, no qual as pessoas tem acesso a produtos usados
                        por um preço inferior. Estas mercadorias, que antes iriam para o lixo, terão um diferente destino, através da troca entre usuários.
                        Desse modo, o mundo torna-se um lugar melhor pelo fato de diminuir o acúmulo de produtos inutilizados e,
                        como bônus, os transforma em produtos muito úteis para outros indivíduos.</p>
                </div>
                <div class="footer-widget">
                    <h4>Nas Redes Sociais!</h4>
                    <div id="social"> <a href="http://twitter.com/" class="s3d twitter" target="_blank"> Twitter <span class="icons twitter"></span> </a> <a href="http://www.facebook.com/" class="s3d facebook" target="_blank"> Facebook <span class="icons facebook"></span> </a> <a href="http://www.flickr.com/photos/" class="s3d flickr" target="_blank"> Flickr <span class="icons flickr"></span> </a></div>
                </div>
                <div class="border2"></div>
                <br />
                <span class="copyright">
                    <span style="text-align: center"><br />
                        &copy; Copyright 2013 - Todos os Direitos Reservados<br />
                        <br>
                            <br />
                    </span>
                </span>
            </footer>
        </div>
    </body>
</html>
