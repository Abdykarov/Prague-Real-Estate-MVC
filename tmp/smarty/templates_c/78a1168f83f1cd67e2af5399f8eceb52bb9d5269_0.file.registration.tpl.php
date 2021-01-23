<?php
/* Smarty version 3.1.36, created on 2021-01-22 14:02:04
  from '/home/abdykili/www/views/default/registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600adadcd857d9_24816451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a1168f83f1cd67e2af5399f8eceb52bb9d5269' => 
    array (
      0 => '/home/abdykili/www/views/default/registration.tpl',
      1 => 1611324118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600adadcd857d9_24816451 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="register_section">
    <div class="wrapper">
        <h1>Registrace</h1>
            <form method="post" action="?controller=user&action=AddUser" id="reg_form">
                <div class="reg_section">
                    <div class="reg_block">
                        <h4><i class="material-icons">person_outline</i> Vaší údaje</h4>    
                        <div class="row">
                            <div class="col s4">
                                <label for="name"><span class="must">*</span>Jmemo [Musi byt A-Z a-z 9-0]</label>
                                <input id="name" required pattern="[A-Za-z0-9\s]+" name="name" type="text" class="validate" 
                                value="<?php if ((isset($_smarty_tpl->tpl_vars['user_reg_name']->value))) {
echo $_smarty_tpl->tpl_vars['user_reg_name']->value;
}?>">
                                <div class="error_handler name_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['name_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['name_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="last_name"><span class="must">*</span>Přijmení [Musi byt A-Z a-z 9-0]</label>
                                <input id="last_name" required pattern="[A-Za-z0-9\s]+" name="last_name" type="text"  class="validate"
                                value="<?php if ((isset($_smarty_tpl->tpl_vars['user_reg_surname']->value))) {
echo $_smarty_tpl->tpl_vars['user_reg_surname']->value;
}?>">
                                <div class="error_handler surname_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['surname_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['surname_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="phone"><span class="must">*</span>Telefon [Musi byt 9-0]</label>
                                <input id="phone" required pattern="[0-9]+" name="phone" type="text" class="phone_input validate"
                                value="<?php if ((isset($_smarty_tpl->tpl_vars['user_reg_phone']->value))) {
echo $_smarty_tpl->tpl_vars['user_reg_phone']->value;
}?>">
                                <div class="error_handler phone_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['phone_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['phone_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="email"><span class="must">*</span>Email [Musi byt A-Z a-z 9-0]</label>
                                <input id="email" required name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Špatny email format" type="email" class="email_input validate"
                                value="<?php if ((isset($_smarty_tpl->tpl_vars['user_reg_email']->value))) {
echo $_smarty_tpl->tpl_vars['user_reg_email']->value;
}?>">
                                <div class="error_handler email_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['email_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['email_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="reg_block">
                        <h4><i class="material-icons">build</i> Nastavení hesla</h4>    
                        <div class="row">
                            
                            <div class=" col s4">
                                <label for="pass"><span class="must">*</span>Heslo [Musi byt 9-0]</label>
                                <input id="pass" name="pass" required pattern="[A-Za-z0-9\s]+" type="password" class="validate pass_input">
                                <div class="error_handler pass_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['pass_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['pass_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>

                            <div class=" col s4">
                                <label for="pass_confirm"><span class="must">*</span>Potvrzení hesla [Musi byt 9-0]</label>
                                <input id="pass_confirm" name="pass_confirm" required pattern="[A-Za-z0-9\s]+" type="password" class="pass_confirm_input validate">
                                <div class="error_handler pass_confirm_error">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['confirm_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['confirm_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                            
                        </div>      
                        <div class="row">
                            <div class="col s4">
                                <button type="submit" name="register">Zaregistrovat se</button>
                                <div class="error_handler form_err">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['form_err']->value))) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['form_err']->value;?>

                                    <?php }?>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
        </form>
    </div>
</div><?php }
}
