<div class="login_section">
    <div class="container">
        <div class="login_form">
            <form method="post" id="admin_login_form">
                <div class="row form_title">
                    <h4>Příhlásit</h4> 
                </div>
                <div class="login_block">
                    <label for="email">Email</label>
                    <input id="email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" type="email"
                    {if isset($admin_email_data)} value="{$admin_email_data}"{/if}>
                    <div class="error email_error">
                        {if isset($admin_email_err)}
                            {$admin_email_err}
                        {/if}
                    </div>
                </div>
                <div class="login_block">
                    <label for="password">Password</label>
                    <input id="password" required pattern="[0-9]+" name="password" type="password">
                    <div class="error pass_error">
                        {if isset($admin_password_err)}
                            {$admin_password_err}
                        {/if}
                     </div>
                </div>       
                <div class="row">
                    <button type="submit" name="auth">Příhlásit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="scripts/main.js"></script>
