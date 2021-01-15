<?php
/* Smarty version 3.1.36, created on 2021-01-12 03:32:11
  from '/home/abdykili/www/views/default/user-posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffd183b2e5ed1_73584652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bde2df9b1b49f973d4c37e67249360c0670cd26' => 
    array (
      0 => '/home/abdykili/www/views/default/user-posts.tpl',
      1 => 1610422328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffd183b2e5ed1_73584652 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post" class="active">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>
                </ul>
                </div>
            </div>
            <div class="col s9">
                <?php if (empty($_smarty_tpl->tpl_vars['posts']->value)) {?>
                    <p>Nemáte inzeráty</p>
                <?php } else { ?>
                    <div class="post_block_section">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                            <a class="post-block" href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['PostName'];?>
</a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>         
                    <a class="add_btn" href="?controller=post&action=add">Vytvořit nový</a>
            </div>
        </div>
    </div>
</div><?php }
}
