<?php
	
/**
 * Inffus Web Intelligence
 *
 * @author Inffus
 * @version 1.0
 * @copyright Rosalvo Automóveis, 2017
 * @link http://www.rosalvoautomoveis.com.br
*/

//Inicia sessions
//session_start();

require_once('application/include_dao.php');

/**
 * @var mixed $transaction Cria nova instância da classe
 */
$transaction = new Transaction();

//Verifica existencia de arquivo de conexao
if(!file_exists('templates/class/dao/sql/ConnectionProperty.class.php')){ header('Location: install.php'); }

/**
 * @var mixed $transaction Cria nova instância da classe
 */
include_once('core/core.php');

?>
<html lang="pr-BR">
<head>
	<meta charset="UTF-8">
	<title><?=$siteTitle?></title>
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?=$URLSITE?>/assets/img/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?=$URLSITE?>/assets/img/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?=$URLSITE?>/assets/img/icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?=$URLSITE?>/assets/img/icons/manifest.json">
	<link rel="mask-icon" href="<?=$URLSITE?>/assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
    
    <!-- Og -->
    <meta property="og:title" content="<?=$siteTitle?>"/>
	<meta property="og:description" content="<?=$siteDescription?>"/>
	<meta property="og:image" content="<?=$siteLogo?>"/>
	<meta property="og:url" content="<?=$URLSITE?>"/>
	<meta property="og:site_name" content="<?=$siteTitle?>"/>
    
    <!-- Metas -->
<!--     <meta name="google-site-verification" content="KxXxBsJ8tKcpRARMAtiR7oCgaNA9BlvqQwgv7olBAi4" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?=$siteDescription;?>">
    <meta name="keywords" content="<?=$siteKeywords;?>" />
    <meta name="author" content="Inffus WEB">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<!-- 	
	<link rel="stylesheet" href="assets/css/normalize.min.css">
	<link rel="stylesheet" href="assets/css/grid12.min.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css"> 
	-->
	<link rel="stylesheet" href="<?=$URLSITE?>/assets/css/style.min.css">
	<link rel="stylesheet" href="<?=$URLSITE?>/assets/css/temp.css">
	
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	
	<style>

		.pagination {
		  height: 36px;
		  margin: 18px 0;
		}
		.pagination ul {
		  display: inline-block;
		  *display: inline;
		  /* IE7 inline-block hack */
		
		  *zoom: 1;
		  margin-left: 0;
		  margin-bottom: 0;
		  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
		  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
		  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
		}
		.pagination li {
		  display: inline;
		}
		.pagination a {
		  float: left;
		  padding: 0 14px;
		  line-height: 34px;
		  text-decoration: none;
		  border: 2px solid silver;
		  box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
		  content: '';
		  border-left-width: 0; 
		  color: #e9e9e9;
		  font-family: "Titillium";
		  font-size: 16px;
		}
		.pagination a:hover,
		.pagination .active a {
		    background-color: #eeae1d;
			color: #3b3a38 !important;
		}
		.pagination .active a {
		  color: #999999;
		  cursor: default;
		}
		.pagination .disabled span,
		.pagination .disabled a,
		.pagination .disabled a:hover {
		  color: #999999;
		  background-color: transparent;
		  cursor: default;
		}
		.pagination li:first-child a {
		  border-left-width: 2px;
		}
		.pagination-centered {
		  text-align: center;
		    margin: 0 auto;
		    width: auto;
		    display: table;
		}
		.pagination-right {
		  text-align: right;
		}
		.Detail li span{
			text-transform: capitalize;
		}
	</style>

</head>
<body>
	
	<div class="PageWrapper">
		<?php 
			if($pagina != "") {
				$header = 'Header--internal';
			} else {
				$header = 'Header';
			}
		?>
		
		<header class="<?=$header?>">
			<?php include_once('include/header.html'); ?>
		</header> <!-- Header -->
		
		<div class="PageContent">	

			<!-- INCLUDE SESSIONS OF SITE -->	
			<?php 		
			
				if($pagina!=""){ 
					
					//Se existir o arquivo correspondente ao texto recebino na variavel modulo inclui
					if(file_exists('page/'.$pagina.'.phtml')){
						
						//Verifica se o arquivo existe e um arquivo verdadeiro
						include_once((is_file('page/'.$pagina.'.phtml')) ? 'page/'.$pagina.'.phtml' : 'page/home.phtml');
						
					}else{
					
						//Do contrario mosta a pagina de erro
						include_once("page/404.phtml"); 
					}
				
				}else{
					
					//Do contrario mosta a pagina de erro
					include_once("page/home.phtml");
				
				}
				
			?>
			
			<?php include_once('include/interesse.html'); ?>
			
			<?php include_once('include/contato-mapa.html'); ?>
		
		</div> <!-- PageContent -->
		

		<footer class="SiteFooter">
		<div class="container">
			<small>
				Todos os direitos reservados <span>Rosalvo Automóveis 2017.</span>
			</small>
		</div> <!-- container -->
		</footer> <!-- SiteFooter -->	
			
	</div> <!-- PageWrapper -->
		
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvBSmIKF5wjBmejyKIbVDXBQ5l9-xpQVU"></script>
	
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/js.min.js"></script>

	<?php if($siteAnalytics!=''){ ?>
	
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', '<?php echo $siteAnalytics; ?>', 'auto');
		  ga('send', 'pageview');
		
		</script>
	
	<?php } ?>
</body>
</html>

<?php
	
//commit transaction
$transaction->commit();	
	
?>