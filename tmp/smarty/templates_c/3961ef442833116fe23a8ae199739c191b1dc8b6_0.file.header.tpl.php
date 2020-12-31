<?php
/* Smarty version 3.1.36, created on 2020-12-30 20:47:07
  from '/home/abdykili/www/views/default/inc/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fece74b8672b0_01095002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3961ef442833116fe23a8ae199739c191b1dc8b6' => 
    array (
      0 => '/home/abdykili/www/views/default/inc/header.tpl',
      1 => 1609361215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fece74b8672b0_01095002 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/snow.css">
    <title>Prague Real Estate | <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
</head>
<body class="let-it-snowf">
    <div class="preloader">
        <img src="https://fashionnails-shop.ru/image/catalog/lazyload.gif"  alt="">
    </div>
    <div class="header">
        <div class="wrapper">
            <div class="nav_block">
                    <div class="row">
                        <div class="col s4 logo">
                            <a href="http://wa.toad.cz/~abdykili/">Prague RE</a>
                        </div>
                        <div class="col s8 nav">
                            <ul>
                                <li><a href="#"><i class="material-icons">star_border</i> Zvolené</a></li>
                                <li><a href="?controller=user&action=login"><i class="material-icons">person_outline</i> Přihlásit</a></li>
                                <li><a href="#">Přidat inzerát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['mainCategories']->value))) {?>
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
            <?php }?>
        </div>
    </div><?php }
}
