<?php	
	//require('../includes/setup.php');	
	define('WP_USE_THEMES', false);
	require('../../../../wp-load.php');
	
	$email = $_REQUEST['email'];
	$file = $_REQUEST['file'];
	$title = $_REQUEST['title'];
	$postid = $_REQUEST['postid'];
	$require = $_REQUEST['require'];
	$delivery = $_REQUEST['delivery'];
?>
<div id="ss-downloads">	
	<?php if($require == "email") { ?>
    <h3>Email Set as <?php echo $email; ?> <small>(<a href="<?php echo SSD_RESET_URL; ?>?postid=<?php echo $postid; ?>">change</a>)</small> &raquo;</h3>
	<p>Check for an email from us. Click here to <a href="<?php echo SSD_ADD_EMAIL_URL; ?>?email=<?php echo $email; ?>&title=<?php echo $title; ?>&file=<?php echo urlencode($file); ?>&postid=<?php echo $postid; ?>">send a link to <?php echo $title; ?> to that email address</a>.</p>    
    <?php } else { ?>
        <h3><?php echo $title; ?> &raquo;</h3>
		<p>Click here to <a href="<?php echo SSD_ADD_EMAIL_URL; ?>?email=<?php echo $email; ?>&title=<?php echo $title; ?>&file=<?php echo urlencode($file); ?>&postid=<?php echo $postid; ?>">send yourself <?php if($delivery == "email_attachment") { ?>the file by<?php } else { ?>a link to the file by<?php }?> email</a>.</p>    
    <?php } ?>    
</div>