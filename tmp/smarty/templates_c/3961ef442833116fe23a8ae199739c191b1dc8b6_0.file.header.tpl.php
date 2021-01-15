<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:12:46
  from '/home/abdykili/www/views/default/inc/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6001244e96b457_67965382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3961ef442833116fe23a8ae199739c191b1dc8b6' => 
    array (
      0 => '/home/abdykili/www/views/default/inc/header.tpl',
      1 => 1610687412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6001244e96b457_67965382 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="cs-cz">
<head>
    <title>Prague Real Estate | <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/splide-skyblue.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/notification.css">
    <link rel="stylesheet" href="styles/snow.css">
    <link rel="stylesheet" media="print" href="styles/print.css">

    <?php if ((isset($_smarty_tpl->tpl_vars['dark']->value))) {?>
    <link rel="stylesheet" href="styles/dark.css">
    <?php }?>
    <noscript>
        <link rel="stylesheet" href="styles/noscript.css">

    </noscript>
</head>
<body <?php if ((isset($_smarty_tpl->tpl_vars['snow']->value))) {?> class="let-it-snow" <?php }?>>
    <div class="preloader">
        <img src="https://fashionnails-shop.ru/image/catalog/lazyload.gif"  alt="">
    </div>
    <div>
        
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
