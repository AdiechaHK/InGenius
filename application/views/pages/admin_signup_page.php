<div class="container">
	<h1>Sign up</h1>
	<?=form_open("user/signup")?>
	<input name="username" />
	<input name="email" />
	<input type="password" name="password" />
	<input type="submit" />
	</form>
	<?=anchor("welcome", "Back")?>
</div>