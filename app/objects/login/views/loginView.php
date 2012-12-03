<div id="signInContainer" class="leftPanel">
	<div id="sign-in-title">
		<p>Sign in</p>
	</div>

	<?php if($this->loginError) { ?><div id="loginError" class="leftPanelMessage"><p>Incorrect username or password.</p></div><?php } ?>

	<form id="signIn" method="post" action="<?php echo appendToUrl(array('login' => '1', 'back' => REQUESTED_PAGE)); ?>">
		<span class="icon-envelope btn-label" aria-hidden="true" data-icon="&#x25a8;"></span>
		<input type="text" name="loginInEmail" id="signInEmail" placeholder="Email" /><br />
		<span class="icon-key btn-label" aria-hidden="true" data-icon="&#x25a8;"></span>
		<input type="password" name="loginInPassword" id="signInPassword" placeholder="Password" /><br />
		<input type="submit" name="loginInSubmit" id="signInSubmit" value="Sign In">
		<a href="<?php echo appendToUrl('signup'); ?>"><span>Sign up</span></a>
	</form>
</div>