<?php
/* Smarty version 3.1.36, created on 2021-01-12 05:58:59
  from '/home/abdykili/www/views/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffd3aa324c888_30910181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df39815d4102b6abff7aa383380025069a37fb65' => 
    array (
      0 => '/home/abdykili/www/views/default/index.tpl',
      1 => 1610431138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffd3aa324c888_30910181 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/notification.css">
    <?php if ((isset($_smarty_tpl->tpl_vars['dark']->value))) {?>
    <link rel="stylesheet" href="styles/dark.css">
    <?php }?>
    <noscript>
        <link rel="stylesheet" href="styles/noscript.css">
        <style>
            #filterForm {
                display:none;
            }
            .preloader{
                display: none;
            }
        </style>
    </noscript>
    <link rel="stylesheet" href="styles/snow.css">
    <title>Prague Real Estate | <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
</head>
<body <?php if ((isset($_smarty_tpl->tpl_vars['snow']->value))) {?> class="let-it-snow" <?php }?>>
    <div class="preloader">
        <img src="https://fashionnails-shop.ru/image/catalog/lazyload.gif"  alt="">
    </div>
    <header>
        <div class="wrapper">
            <div class="nav_block">
                <div class="row">
                    <div class="col s4 logo">
                        <a href="#">Prague RE</a>
                    </div>
                    <div class="col s8 nav">
                        <ul>
                            <li><form method="post"><button type="submit" name="snow"><i class="material-icons">ac_unit</i></button></form>
                            <li><form method="post"><button type="submit" name="dark"><i class="material-icons">brightness_2</i></button></form>
                            <?php if ((isset($_smarty_tpl->tpl_vars['userEmail']->value))) {?>
                                <li><a href="?controller=user&action=index"><i class="material-icons">person_outline</i> <?php echo $_smarty_tpl->tpl_vars['userEmail']->value;?>
</a></li>
                            <?php } else { ?>
                                <li><a href="?controller=user&action=login"><i class="material-icons">person_outline</i> Přihlásit</a></li>
                            <?php }?>
                            <li><a href="?controller=post&action=add">Přidat inzerát</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header_info">
                <div class="header_info_text">
                       <h1>Prodej a pronájem nemovitostí v Praze</h1>
                    <h4>Vyberte si z <?php echo $_smarty_tpl->tpl_vars['postsCount']->value;?>
 aktuálních nabídek realit</h4>
                </div>


                <div class="row">
                    <form method="post" id="filterForm">
                        <input type="hidden" name='categoryId' id='hiddenCategory' value="">
                            <div class="filter">
                                <div class="input-field">
                                    <div class="custom_fields main_category_filter">
                                        <span data-categoryid="<?php echo $_smarty_tpl->tpl_vars['mainCategories']->value[0]['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['mainCategories']->value[0]['CategoryName'];?>
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
                                        <span data-categoryid=""><span class="category_placeholder">Vyberte kategorii</span></span>
                                        <ul class="child_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <div class="custom_fields grand_category_filter">
                                    <span data-categoryid=""><span class="category_placeholder">Vyberte kategorii</span></span>
                                        <ul class="grand_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                <div class="input-field filter_price">
                                    <input placeholder="Cena od" type="number" name="fromPrice" class="validate">
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="do" type="number" name="toPrice" class="validate">
                                </div>
                                <div class="input-field">
                                    <button class="btn waves-effect waves-light" type="submit" name="filter">
                                        <i class="material-icons right">search</i>
                                        </button>                        
                                </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </header>
    
    <main>
        <div class="sub_nav">
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainCategories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <li><a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</a></li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                
            </ul>
        </div>
        <div class="main_categories">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCategories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>

                <div class="category_block">
                    
                    <div class="row">
                        <div class="col s5">
                            <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['CategoryImage']))) {?>
                                <img src="images/<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryImage'];?>
.png" alt="">
                            <?php } else { ?>
                                <img src="images/cat1.png" alt="">
                            <?php }?>
                        </div>

                        <div class="col s7">
                            <h3><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</h3>
                            <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['ChildrenCategories']))) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['ChildrenCategories'], 'childrenCategory');
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childrenCategory']->value) {
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = false;
?>
                                    <div class="category_sub">
                                        <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryName'];?>
</a>
                                        <div class="row">
                                            <?php if ((isset($_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories']))) {?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories'], 'grandChild');
$_smarty_tpl->tpl_vars['grandChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['grandChild']->value) {
$_smarty_tpl->tpl_vars['grandChild']->do_else = false;
?>
                                                    <div class="col s6">
                                                        <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['grandChild']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['grandChild']->value['CategoryName'];?>

                                                        <span>
                                                        <?php if ((isset($_smarty_tpl->tpl_vars['grandChild']->value['PostsCount']))) {?>
                                                            <?php echo $_smarty_tpl->tpl_vars['grandChild']->value['PostsCount'];?>

                                                        <?php } else { ?>
                                                            0
                                                        <?php }?>
                                                        </span></a>
                                                    </div>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                
                                            <?php }?>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                    </div>
                </div>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div>

    </main><?php }
}
