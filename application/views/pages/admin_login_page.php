<h1>Login page</h1>
<?=form_open("user/login")?>
<input name="email" />
<input type="password" name="password" />
<input type="submit" />
</form>
<?=anchor("welcome", "back")?>