<?php
if ( !isset($_COOKIE['xstatusm']) ){ echo '<script language="javascript">location = "index.php?reg=logar"</script>'; } 
?>
                     <li><a href="painel.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_HOME; ?></a></li>
		     <li><a href="canais.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_TV_AO_VIVO; ?></a></li>
		     <li><a href="filmes.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_MOVIES; ?></a></li>
                     <li><a href="series.php?sessao=<?php echo gerar_hash(256); ?>"><?php echo MENU_SERIES; ?></a></li>
                     <li><a href="?acao=sair"><?php echo MENU_SAIR; ?></a></li>
