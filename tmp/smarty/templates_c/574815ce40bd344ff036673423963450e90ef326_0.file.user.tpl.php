<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:45:29
  from '/home/abdykili/www/views/default/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012bf9ee8747_16187346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '574815ce40bd344ff036673423963450e90ef326' => 
    array (
      0 => '/home/abdykili/www/views/default/user.tpl',
      1 => 1610689525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012bf9ee8747_16187346 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index" class="active">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>
                </ul>
                </div>
            </div>
            <div class="col s9">
                <div class="user_main">
                    <h2>Kontaktní informace</h2>
                    <h4>Váš email: <span><?php echo $_smarty_tpl->tpl_vars['userEmail']->value;?>
</span></h4>
                    <h5>Váš id: <span><?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
</span></h5>
                    <h5>Číslo smlouvy: <span>#281001<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
</span></h5>
                    <div class="user_block">
                        <form id="change_form" method="post" action="?controller=user&action=updateUser">
                            <div class="row">
                            <input type="hidden" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
">
                                <div class="col s6">
                                    <label for="name">Jmemo [Musi byt A-Z a-z 9-0]</label>
                                    <input id="name" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
" required pattern="[A-Za-z0-9]+" title="Špatny format" name="new_name" type="text" class="validate">
                                    <div class="error_handler name_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['name_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['name_err']->value;?>

                                    <?php }?>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="phone">Telefon [Musi byt 9-0]</label>
                                    <input id="phone" value="<?php echo $_smarty_tpl->tpl_vars['userPhone']->value;?>
" required pattern="[0-9]+"  name="new_phone" type="text" class="validate">
                                    <div class="error_handler phone_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['phone_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['phone_err']->value;?>

                                    <?php }?>
                                </div>
                                </div>
                            </div>
                            <p>Změna hesla</p>
                            <div class="row">
                                <div class=" col s6">
                                    <label for="old_pass">Staré heslo [Musi byt 9-0]</label>
                                    <input id="old_pass" required pattern="[0-9]+" type="password" name="pass" class="validate">
                                    <div class="error_handler oldpass_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['oldpass_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['oldpass_err']->value;?>

                                    <?php }?>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="new_pass">Nové heslo [Musi byt 9-0]</label>
                                    <input id="new_pass" required pattern="[0-9]+"  name="new_pass" type="password" class="validate">
                                    <div class="error_handler newpass_error">
                                        <?php if ((isset($_smarty_tpl->tpl_vars['newpass_err']->value))) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['newpass_err']->value;?>

                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" name="update">Uložit změny</button>
                            </div>
                        </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div><?php }
}
