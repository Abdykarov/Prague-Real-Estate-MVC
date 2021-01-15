<?php
/* Smarty version 3.1.36, created on 2021-01-13 05:46:44
  from '/home/abdykili/www/views/default/user-chat-start.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffe8944cd5f84_72021295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2296abd3d0651aa0cdfa78e960f9d9d8fb1966e5' => 
    array (
      0 => '/home/abdykili/www/views/default/user-chat-start.tpl',
      1 => 1610515949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffe8944cd5f84_72021295 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h5>Napsat zprávu uživatelu <?php echo $_smarty_tpl->tpl_vars['postAuthor']->value['Name'];?>
</h5>     
                <form action="?controller=user&action=InitMessage" id="msg_form" method="post">
                    <label for="msg_text">Zpráva</label>
                    <textarea class="materialize-textarea" required id="msg_text" name="message"></textarea>
                    <div class="error_handler msg_error">
                                
                    </div>  
                    <input type="hidden" name="postAuthor" value="<?php echo $_smarty_tpl->tpl_vars['postAuthor']->value['Id'];?>
">
                    <input type="hidden" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
">
                    <button type="submit" name="sendMessage">Odeslat</button>
                </form>        

            </div>
        </div>
    </div>
</div><?php }
}
