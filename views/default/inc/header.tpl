<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <title>Prague Real Estate | {$pageTitle}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/splide-skyblue.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/notification.css">
    <link rel="stylesheet" href="styles/snow.css">
    {if isset($dark)}
    <link rel="stylesheet" href="styles/dark.css">
    {/if}
    <noscript>
        <style>
            #filterForm {
                display:none;
            }
            .post_slider{
                display: none;
            }
            .preloader{
                display: none;
            }
            iframe{
                display: none;
            }
            .input-field>label{
                top: -20px !important;
            }
        </style>
    </noscript>
</head>
<body {if isset($snow)} class="let-it-snow" {/if}>
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
                           
                            {if isset($userEmail)}
                                <li><a href="?controller=user&action=index"><i class="material-icons">person_outline</i> {$userEmail}</a></li>
                            {else}
                                <li><a href="?controller=user&action=login"><i class="material-icons">person_outline</i> Přihlásit</a></li>
                            {/if}                               
                             <li><a href="?controller=post&action=add">Přidat inzerát</a></li>
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