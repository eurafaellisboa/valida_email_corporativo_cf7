add_action( 'wp_footer', 'valida_email_corporativo', 10 );
function valida_email_corporativo(){

	global $post;
	if($post->post_type!="contato"){
		return;
	}

	?>
	<script>
		jQuery('body').delegate("input[name^='email_corp']", 'change', function (event) {

		const blockedDomains = ['gmail.com','hotmail.com','hotmail.co.uk','outlook.com','outlook.co.uk','live.com','live.co.uk','yahoo.com','yahoo.co.uk','yahoo.com.br','hotmail.com.br','bol.com.br','uol.com.br','terra.com.br','zip.net','icloud.com','me.com','ig.com.br'];

		var email = jQuery(this).val();
		var domain = email.split("@");
		if(domain[1]!=undefined){
			if(blockedDomains.indexOf(domain[1])>-1){
				alert('Por favor, utilize seu e-mail corporativo/empresarial.');
				jQuery(this).val('');
				jQuery(this).focus();
			}
		}

		});

		document.addEventListener( 'wpcf7submit', function( event ) {
			console.log('foi');
			jQuery(".wpcf7-submit").attr("disabled",false);
		}, false );


	</script>
	<?php
}

      
      
?>
                
    
