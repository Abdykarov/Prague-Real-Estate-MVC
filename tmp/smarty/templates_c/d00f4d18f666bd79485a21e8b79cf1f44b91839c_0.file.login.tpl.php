<?php
/* Smarty version 3.1.36, created on 2021-01-10 20:37:12
  from '/home/abdykili/www/views/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffb657858f967_01522600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd00f4d18f666bd79485a21e8b79cf1f44b91839c' => 
    array (
      0 => '/home/abdykili/www/views/admin/login.tpl',
      1 => 1610310894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffb657858f967_01522600 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="login_section">
    <div class="container">
        <div class="login_form">
            <form method="post">
                <div class="row form_title">
                    <h4>Příhlásit</h4> 
                </div>
                <div class="login_block">
                    <label for="email">Emairl</label>
                        <input id="email" name="email" required="required" type="email">
                </div>
                <div class="login_block">
                    <label for="password">Password</label>
                        <input id="password" name="password" required="required"  type="password">
                </div>       
                <div class="row">
                    <button type="submit" name="auth">Příhlásit</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
