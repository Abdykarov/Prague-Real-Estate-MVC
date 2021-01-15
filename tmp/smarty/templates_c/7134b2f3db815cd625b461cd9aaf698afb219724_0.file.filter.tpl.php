<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:30:28
  from '/home/abdykili/www/views/default/inc/filter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012874bc05d9_79119849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7134b2f3db815cd625b461cd9aaf698afb219724' => 
    array (
      0 => '/home/abdykili/www/views/default/inc/filter.tpl',
      1 => 1610688593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012874bc05d9_79119849 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="bigform">
    <div class="wrapper">
        <div class="row">
            <form method="post">
                <div class="filter cat">
                        <div class="input-field">
        
                            <div class="custom_fields category_select category_friends">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
">
                                <span><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</span>
                                <ul class="main_category_filter_hidden">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryFriends']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                        <li data-categoryid="<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="input-field filter_price">
                        <input placeholder="Cena od" type="text" pattern="[0-9]+" name="fromPrice" 
                            <?php if ((isset($_smarty_tpl->tpl_vars['fromPrice']->value))) {?>
                                value="<?php echo $_smarty_tpl->tpl_vars['fromPrice']->value;?>
"
                            <?php } else { ?>
                        
                            <?php }?> 
                            class="fromPrice validate">
                        </div>
                        <div class="input-field filter_price">
                        <input placeholder="Cena do" type="text" pattern="[0-9]+" name="toPrice" 
                            <?php if ((isset($_smarty_tpl->tpl_vars['toPrice']->value))) {?>
                                value="<?php echo $_smarty_tpl->tpl_vars['toPrice']->value;?>
"
                            <?php } else { ?>
                        
                            <?php }?> 
                            class="toPrice validate">
                        </div>
                        <div class="input-field">
                            <div class="custom_select big_form_btn">
                                Upřesnit filtry
                            </div>
                        </div>
                        <div class="input-field">
                            <button class="btn waves-effect waves-light" type="submit" name="filter">
                                <i class="material-icons right">search</i>
                                </button>                        
                        </div>
                </div>
                <div class="form_center">
                    <div class="post_block">
                        <h4>Forma vlastnictví</h4>
                        <div class="row post_flex">
                            <label>
                                <input name="owner" value="Osobní" type="radio" />
                                <span>Osobní</span>
                            </label>
                            <label>
                                <input name="owner" value="Družstevní" type="radio" />
                                <span>Družstevní</span>
                            </label>
                            <label>
                                <input name="owner" value="S.r.o." type="radio" />
                                <span>S.r.o.</span>
                            </label>
                            <label>
                                <input name="owner" value="Jiný" type="radio" />
                                <span>Jiný</span>
                            </label>
                        </div>
                        <h4>Stav nemovitosti</h4>
                        <div class="row post_flex">
                            <label>
                                <input name="cond" value="Novostavba" type="radio" />
                                <span>Novostavba</span>
                            </label>
                            <label>
                                <input name="cond" value="Ve výstavbě" type="radio" />
                                <span>Ve výstavbě</span>
                            </label>
                            <label>
                                <input name="cond" value="Dobrý stav" type="radio" />
                                <span>Dobrý stav</span>
                            </label>
                            <label>
                                <input name="cond" value="Udržovaný" type="radio" />
                                <span>Udržovaný</span>
                            </label>
                            <label>
                                <input name="cond" value="Špatný stav" type="radio" />
                                <span>Špatný stav</span>
                            </label>
                            <label>
                                <input name="cond" value="Po rekonstrukci" type="radio" />
                                <span>Po rekonstrukci</span>
                            </label>
                            <label>
                                <input name="cond" value="Před rekonstrukci" type="radio" />
                                <span>Před rekonstrukci</span>
                            </label>
                            <label>
                                <input name="cond" value="K demolici" type="radio" />
                                <span>K demolici</span>
                            </label>
                        </div>
                        <h4>Konstrukce</h4>
                        <div class="row post_flex">
                            <label>
                                <input name="const" value="Cihlová" type="radio" />
                                <span>Cihlová</span>
                            </label>
                            <label>
                                <input name="const" value="Panelová" type="radio" />
                                <span>Panelová</span>
                            </label>
                            <label>
                                <input name="const" value="Dřevěná" type="radio" />
                                <span>Dřevěná</span>
                            </label>
                            <label>
                                <input name="const" value="Kamenná" type="radio" />
                                <span>Kamenná</span>
                            </label>
                            <label>
                                <input name="const" value="Skeletová" type="radio" />
                                <span>Skeletová</span>
                            </label>
                            <label>
                                <input name="const" value="Montovaná" type="radio" />
                                <span>Montovaná</span>
                            </label>
                            <label>
                                <input name="const" value="Smíšená" type="radio" />
                                <span>Smíšená</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div><?php }
}
