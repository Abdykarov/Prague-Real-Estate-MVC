<?php
/* Smarty version 3.1.36, created on 2021-01-15 03:06:30
  from '/home/abdykili/www/views/default/user-page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600106b638eb73_28595511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7225f356141fbdb58170ec7bd7d5d121dfec5ce0' => 
    array (
      0 => '/home/abdykili/www/views/default/user-page.tpl',
      1 => 1610679989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600106b638eb73_28595511 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat" class="active">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>

                </ul>
                </div>
            </div>
            <div class="col s9">
                <div class="row">
                    <div class="message_section">
                        <div class="message_info">
                            <div class="row">
                                <div class="col s2">
                                    <a href="?controller=user&action=chat"><i class="material-icons">arrow_back</i></a>
                                </div>
                                <div class="col s6">
                                    <?php echo $_smarty_tpl->tpl_vars['partner']->value['Name'];?>
 
                                    <?php echo $_smarty_tpl->tpl_vars['partner']->value['Surname'];?>

                                </div>
                                <div class="col s4">
                                    <?php echo $_smarty_tpl->tpl_vars['partner']->value['Phone'];?>

                                </div>
                            </div>
                        </div>
                        <div class="message_text_form">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
$_smarty_tpl->tpl_vars['message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->do_else = false;
?>
                                <?php if ($_smarty_tpl->tpl_vars['message']->value['FromUser'] == $_smarty_tpl->tpl_vars['userId']->value) {?>
                                    <div class="message_row">
                                        <div class="message_box right">
                                            <p><?php echo $_smarty_tpl->tpl_vars['message']->value['MessageText'];?>
</p>
                                            <span><?php echo $_smarty_tpl->tpl_vars['message']->value['MessageDate'];?>
</span>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                     <div class="message_row">
                                        <div class="message_box left">
                                            <p><?php echo $_smarty_tpl->tpl_vars['message']->value['MessageText'];?>
</p>
                                            <span><?php echo $_smarty_tpl->tpl_vars['message']->value['MessageDate'];?>
</span>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        <div class="message_submit">
                            <form method="post" id="chat_form">
                                <div class="row">
                                    <div class="col s10">
                                        <textarea name="messageText" required id="msg" placeholder="Napište zprávu"></textarea>
                                        <div class="error_handler msg_error">
                                            <?php if ((isset($_smarty_tpl->tpl_vars['msgError']->value))) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>

                                            <?php }?>
                                        </div>  
                                    </div>
                                    <div class="col s2">
                                        <button type="submit">Napsat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
