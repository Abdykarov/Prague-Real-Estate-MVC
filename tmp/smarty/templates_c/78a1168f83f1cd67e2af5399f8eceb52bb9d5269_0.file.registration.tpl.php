<?php
/* Smarty version 3.1.36, created on 2020-12-31 01:11:23
  from '/home/abdykili/www/views/default/registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fed253bace713_76854609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a1168f83f1cd67e2af5399f8eceb52bb9d5269' => 
    array (
      0 => '/home/abdykili/www/views/default/registration.tpl',
      1 => 1609377072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fed253bace713_76854609 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="register_section">
    <div class="wrapper">
        <h1>Registrace</h1>
        <form id="reg_form">
                <div class="reg_section">
                    <div class="reg_block">
                        <h4><i class="material-icons">person_outline</i> Vaší údaje</h4>    
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="name" name="name" type="text" required="required" class="validate">
                                <label for="name">Jmemo</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="last_name" name="last_name" type="text" required="required"  class="validate">
                                <label for="last_name">Přijmení</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="phone" name="phone" type="number" required="required"  class="validate">
                                <label for="phone">Telefon</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="email" name="email" type="email" required="required"  class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="reg_block">
                        <h4><i class="material-icons">build</i> Nastavení hesla</h4>    
                        <div class="row">
                            
                            <div class="input-field col s4">
                                <input id="pass" name="pass" type="number" required="required"  class="validate">
                                <label for="pass">Heslo</label>
                            </div>

                            <div class="input-field col s4">
                                <input id="pass_confirm" name="pass_confirm" required="required"  type="number" class="validate">
                                <label for="pass_confirm">Potvrzení hesla</label>
                            </div>
                            
                        </div>      
                        <div class="row">
                            <div class="col s4">
                                <button type="submit">Zaregistrovat se</button>
                            </div>
                        </div>              
                    </div>
                </div>
        </form>
    </div>
</div><?php }
}
