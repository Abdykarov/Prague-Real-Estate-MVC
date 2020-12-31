<?php
/* Smarty version 3.1.36, created on 2020-12-30 22:59:17
  from '/home/abdykili/www/views/default/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fed0645aaf444_19835792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b31b8715f7123ff87e9c5323626052a345901b66' => 
    array (
      0 => '/home/abdykili/www/views/default/login.tpl',
      1 => 1609369156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fed0645aaf444_19835792 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="login_section">
    <div class="wrapper">
        <div class="login_form">
            <form id="login_form">
                <div class="row form_title">
                    <h4>Příhlásit</h4> <a href="?controller=user&action=register">Zaregistrovat se</a>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" required="required" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>  

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" required="required"  type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                
                <div class="row">
                    <button type="submit">Příhlásit</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
