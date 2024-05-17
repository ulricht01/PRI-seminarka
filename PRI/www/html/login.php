<?php
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
?>
<div class="login-form-div">
<form method="POST" class="login-form">
    <label for="input-username">Uživatelské jméno </label>
    <input type="text" id=input-username name="input-username">
    <label for="input-password">Heslo</label>
    <input type="password" id=input-password name="input-password">
    <button type="submit" id="submit-button" name="submit-button">Přihlásit</button>
</form>
</div>
<?php require INC . '/end.php'?>