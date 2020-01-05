<?php
require_once("libs/lib.php");

$user = $_COOKIE['xuserm'];
$pwd = $_COOKIE['xpwdm'];

?>
<!DOCTYPE html>
<html lang="en">
   <head>
	<?php include("inc/head.php"); ?>
   </head>
   <body >
      <!-- HOME 1 -->
      <div id="home1" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">
            <?php include("inc/header.php"); ?>
         </div>
         <!-- MENU -->
         <div class="row home-mega-menu ">
            <div class="col-md-12">
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">
                     <ul class="nav navbar-nav">
                     <?php include("inc/menu.php"); ?>
                     </ul>
                     
                     <div class="search-block">
                      <?php include("inc/busca.php"); ?> 
                     </div>
                  </div>
                  <!-- /.nav-collapse -->
               </nav>
            </div>
         </div>
         <!-- CORE -->
        
      <!-- CHANNELS -->
      <div id="channels-block" class="container-fluid channels-bg">
         <div class="container-fluid ">
            <div class="col-md-12">
               <!-- CHANNELS -->
               <section id="channels">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i><?php echo CANAIS_AO_VIVO; ?></h2>
                     <div class="carousel-control-box">
                        
                     </div>
                     <!-- Wrapper for slides -->
                     <div class="carousel-inner" role="listbox">
                        <div class="item active">
                           <div class="row auto-clear">
                           
    <?php
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	shuffle($output);
	$i = 1;
	foreach(array_rand($output,12) as $index) {
		$row = $output[$index];
		
		$iss = $_REQUEST['sessao'];
		$idnum = $row['num'];
		$tv_nome = $row['name'];
		$tv_type = $row['stream_type'];
		$tv_id = $row['stream_id'];
		$tv_img = $row['stream_icon'];		
		$category_id = $row['category_id'];		
	?>
                           
                              <article class="col-lg-2 col-md-4 col-sm-4">
                                 <div class="post post-medium">
                                    <div class="thumbr">
                                       <a class="post-thumb" href="canal.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $tv_id; ?>&streamtipo=<?php echo $tv_type; ?>&canal=<?php echo urlencode($tv_nome); ?>&img=<?php echo urlencode($tv_img); ?>&catg=<?php echo $category_id; ?>">
                                       <img class="img-responsive" src="<?php echo $tv_img; ?>" alt="#" style="width:100%;height:150px;">
                                       </a>
                                    </div>
                                    <div class="infor">
                                       <h4>
                                          <a class="title" href="canal.php?sessao=<?php echo gerar_hash(256); ?>&stream=<?php echo $tv_id; ?>&streamtipo=<?php echo $tv_type; ?>&canal=<?php echo urlencode($tv_nome); ?>&img=<?php echo urlencode($tv_img); ?>&catg=<?php echo $category_id; ?>"><?php echo $tv_nome; ?></a>
                                       </h4>
                                       <span class="posts-channel" title="Posts from Channel"><i class="fa fa-video-camera" aria-hidden="true"></i><?php echo AO_VIVO; ?></span>
                                    </div>
                                 </div>
                              </article>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      
      <!-- FOOTER -->
      <div id="footer" class="container-fluid footer-background">
         <div class="container">
            <footer>
              <?php include("inc/footer.php"); ?>
            </footer>
         </div>
      </div>

      <?php include("inc/scripts.php"); ?>
      
   </body>
</html>
