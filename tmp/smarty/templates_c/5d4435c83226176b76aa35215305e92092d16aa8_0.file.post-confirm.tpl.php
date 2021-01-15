<?php
/* Smarty version 3.1.36, created on 2021-01-15 04:07:59
  from '/home/abdykili/www/views/default/post-confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6001151f62b1a3_17147953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d4435c83226176b76aa35215305e92092d16aa8' => 
    array (
      0 => '/home/abdykili/www/views/default/post-confirm.tpl',
      1 => 1610683677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6001151f62b1a3_17147953 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="confirm_text">
<div class="wrapper">
    <h3>Příspěvek byl zaslán k posouzení. Brzy bude zveřejněno</h3>
    <h3>Díky za spolupráci, <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</h3>
    <a href="?controller=user&action=index">Domů</a>
</div>
</div><?php }
}
