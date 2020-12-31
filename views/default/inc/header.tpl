<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/snow.css">
    <title>Prague Real Estate | {$pageTitle}</title>
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
            {if isset($mainCategories)}
            <div class="sub_nav">
                <ul>
                    {foreach $mainCategories as $category}
                        <li><a href="?controller=category&id={$category['CategoryId']}">{$category['CategoryName']}</a></li>
                    {/foreach}
                    
                </ul>
            </div>
            {/if}
        </div>
    </div>