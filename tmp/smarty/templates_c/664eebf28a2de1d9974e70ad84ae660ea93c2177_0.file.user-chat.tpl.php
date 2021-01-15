<?php
/* Smarty version 3.1.36, created on 2021-01-13 04:45:54
  from '/home/abdykili/www/views/default/user-chat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffe7b0274a498_82193823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '664eebf28a2de1d9974e70ad84ae660ea93c2177' => 
    array (
      0 => '/home/abdykili/www/views/default/user-chat.tpl',
      1 => 1610511936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffe7b0274a498_82193823 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <?php if (empty($_smarty_tpl->tpl_vars['messageGroups']->value)) {?>
                            <p>Nemáte zpravy</p>
                        <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messageGroups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
                            <a class="message_block" href="?controller=user&action=chatPage&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['GroupId'];?>
">
                                <div class="row">
                                    <div class="col s2">
                                        <img src="https://www.pinclipart.com/picdir/middle/355-3553881_stockvader-predicted-adig-user-profile-icon-png-clipart.pnghttps://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png" alt="">
                                    </div>
                                    <div class="col s10 message_text">
                                        <div class="row">
                                            <div class="col s8">
                                                <?php echo $_smarty_tpl->tpl_vars['group']->value['PartnerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['group']->value['PartnerSurname'];?>

                                            </div>
                                            <div class="col s4">
                                                <?php echo $_smarty_tpl->tpl_vars['group']->value['LastMessage'];?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
