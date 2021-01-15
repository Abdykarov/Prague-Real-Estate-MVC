<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:23:57
  from '/home/abdykili/www/views/default/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600126edc7ab22_75625298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b31b8715f7123ff87e9c5323626052a345901b66' => 
    array (
      0 => '/home/abdykili/www/views/default/login.tpl',
      1 => 1610688229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600126edc7ab22_75625298 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="login_section">
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
                        value="<?php if ((isset($_smarty_tpl->tpl_vars['user_login_email']->value))) {
echo $_smarty_tpl->tpl_vars['user_login_email']->value;
}?>">
                        <div class="error_handler email_error">
                            <?php if ((isset($_smarty_tpl->tpl_vars['email_err']->value))) {?>
                                <?php echo $_smarty_tpl->tpl_vars['email_err']->value;?>

                            <?php }?>
                        </div>
                    </div>
                </div>  

                <div class="row">
                    <div class="col s12">
                        <label for="password">Password (0-9)</label>
                        <input id="password" name="password" pattern="[0-9]+" required type="password" class="login_pass validate">
                        <div class="error_handler pass_error">
                        <?php if ((isset($_smarty_tpl->tpl_vars['pass_err']->value))) {?>
                                <?php echo $_smarty_tpl->tpl_vars['pass_err']->value;?>

                            <?php }?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <input type="submit" name="login" value="Příhlásit">
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
