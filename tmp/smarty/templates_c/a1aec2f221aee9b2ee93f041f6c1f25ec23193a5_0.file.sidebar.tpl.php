<?php
/* Smarty version 3.1.36, created on 2021-01-10 19:37:24
  from '/home/abdykili/www/views/admin/inc/sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffb577456cc01_55411288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1aec2f221aee9b2ee93f041f6c1f25ec23193a5' => 
    array (
      0 => '/home/abdykili/www/views/admin/inc/sidebar.tpl',
      1 => 1610307198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffb577456cc01_55411288 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar" data-color="purple" data-background-color="black" data-image="images/sidebar-2.jpg">
      
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Prague Real Estate
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="?controller=admin&action=index">
              <i class="material-icons">library_books</i>
              <p>Inzeráty</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?controller=admin&action=pages">
              <i class="material-icons">library_books</i>
              <p>Stranky</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?controller=admin&action=categories">
              <i class="material-icons">dashboard</i>
              <p>Kategorie</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?controller=admin&action=users">
              <i class="material-icons">person</i>
              <p>Uživately</p>
            </a>
          </li>
        </ul>
      </div>
    </div><?php }
}
