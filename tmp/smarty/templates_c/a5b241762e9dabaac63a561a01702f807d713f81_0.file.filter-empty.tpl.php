<?php
/* Smarty version 3.1.36, created on 2021-01-15 01:45:38
  from '/home/abdykili/www/views/default/inc/filter-empty.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6000f3c2d85888_83455480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5b241762e9dabaac63a561a01702f807d713f81' => 
    array (
      0 => '/home/abdykili/www/views/default/inc/filter-empty.tpl',
      1 => 1610674906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6000f3c2d85888_83455480 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
        <div class="row">
                    <form method="post" id="filterForm">
                        <input type="hidden" name='categoryId' id='hiddenCategory' value="">
                            <div class="filter">
                                <div class="input-field">
                                    <div class="custom_fields main_category_filter">
                                        <span data-categoryid="<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</span>
                                        <ul class="main_category_filter_hidden">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainCategories']->value, 'category');
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
                                <div class="input-field">
                                    <div class="custom_fields child_category_filter">
                                        <span data-categoryid=""></span>
                                        <ul class="child_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <div class="custom_fields grand_category_filter">
                                    <span data-categoryid=""></span>
                                        <ul class="grand_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                <div class="input-field filter_price">
                                    <input placeholder="Cena od" type="number" pattern="[0-9]+" name="fromPrice" class="validate">
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="do" type="number" pattern="[0-9]+" name="toPrice" class="validate">
                                </div>
                                <div class="input-field">
                                    <button class="btn waves-effect waves-light" type="submit" name="filter">
                                        <i class="material-icons right">search</i>
                                        </button>                        
                                </div>
                        </div>
                    </form>
                </div>
</div><?php }
}
