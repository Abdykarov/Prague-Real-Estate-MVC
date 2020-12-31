<?php
/* Smarty version 3.1.36, created on 2020-12-30 17:04:01
  from '/home/abdykili/www/views/default/inc/filter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fecb301774e22_23207670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7134b2f3db815cd625b461cd9aaf698afb219724' => 
    array (
      0 => '/home/abdykili/www/views/default/inc/filter.tpl',
      1 => 1609347840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fecb301774e22_23207670 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="row">
        <form method="post" class="ajax_filter_form">
            <div class="filter cat">

                    <div class="hidden_filter">
                        
                        <div class="hidden_form">
                            <button value="Byt" class="button">Byt</button>
                            <button value="Dum" class="button">Dum</button>
                            <button value="Garaž" class="button">Garaž</button>
                        </div>

                    </div>
                    <div class="input-field">
                        <select>
                            <option value="buy" selected>Koupit</option>
                            <option value="rent">Pronajmout</option>
                            </select>
                    </div>
                    <div class="input-field">
                        <select multiple>
                            <option value="" disabled selected>Počet pokojí</option>
                            <option value="buy">1+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            <option value="rent">2+kk</option>
                            </select>
                    </div>
                    <div class="input-field filter_price">
                        <input placeholder="Cena od" type="number" class="validate">
                    </div>
                    <div class="input-field filter_price">
                        <input placeholder="do" type="number" class="validate">
                    </div>
                    <div class="input-field">
                        <div class="custom_select">
                            Byt
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="custom_select">
                            Upřesnit filtry
                        </div>
                    </div>
                    <div class="input-field">
                        <button class="btn waves-effect waves-light" type="submit" name="action">
                            <i class="material-icons right">search</i>
                            </button>                        
                    </div>
            </div>
        </form>
    </div>
</div><?php }
}
