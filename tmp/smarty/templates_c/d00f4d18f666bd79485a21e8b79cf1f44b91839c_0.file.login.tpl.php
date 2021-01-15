<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:00:12
  from '/home/abdykili/www/views/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6001215cb067d1_85928528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd00f4d18f666bd79485a21e8b79cf1f44b91839c' => 
    array (
      0 => '/home/abdykili/www/views/admin/login.tpl',
      1 => 1610686809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6001215cb067d1_85928528 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="login_section">
    <div class="container">
        <div class="login_form">
            <form method="post" id="admin_login_form">
                <div class="row form_title">
                    <h4>Příhlásit</h4> 
                </div>
                <div class="login_block">
                    <label for="email">Email</label>
                    <input id="email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" type="email"
                    <?php if ((isset($_smarty_tpl->tpl_vars['admin_email_data']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['admin_email_data']->value;?>
"<?php }?>>
                    <div class="error email_error">
                        <?php if ((isset($_smarty_tpl->tpl_vars['admin_email_err']->value))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['admin_email_err']->value;?>

                        <?php }?>
                    </div>
                </div>
                <div class="login_block">
                    <label for="password">Password</label>
                    <input id="password" required pattern="[0-9]+" name="password" type="password">
                    <div class="error pass_error">
                        <?php if ((isset($_smarty_tpl->tpl_vars['admin_password_err']->value))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['admin_password_err']->value;?>

                        <?php }?>
                     </div>
                </div>       
                <div class="row">
                    <button type="submit" name="auth">Příhlásit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="scripts/main.js"><?php echo '</script'; ?>
>
<?php }
}
