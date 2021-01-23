<div class="login_section">
    <div class="wrapper">
        <div class="login_form">
            <form method="post" action="?controller=user&action=LoginUser" id="login_form">
                <div class="row form_title">
                    <h4>Příhlásit</h4> <a href="?controller=user&action=register">Zaregistrovat se</a>
                </div>
                <div class="row">
                    <div class="col s12">
                        <label for="email">Email</label>
                        <input id="email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" type="email" class="login_email validate"
                        value="{if isset($user_login_email)}{$user_login_email}{/if}">
                        <div class="error_handler email_error">
                            {if isset($email_err)}
                                {$email_err}
                            {/if}
                        </div>
                    </div>
                </div>  

                <div class="row">
                    <div class="col s12">
                        <label for="password">Password (0-9)</label>
                        <input id="password" name="password" pattern="[A-Za-z0-9\s]+" required type="password" class="login_pass validate">
                        <div class="error_handler pass_error">
                        {if isset($pass_err)}
                                {$pass_err}
                            {/if}
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <input type="submit" name="login" value="Příhlásit">
                </div>
            </form>
        </div>
    </div>
</div>