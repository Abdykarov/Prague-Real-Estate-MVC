<section class="category_info">
    <div class="wrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="http://wa.toad.cz/~abdykili/">Hlavní stranka</a></li>
                {foreach $breadcrumbs as $row}
                    <li><a href="?controller=category&id={$row['CategoryId']}">{$row['CategoryName']}</a></li>
                {/foreach}
            </ul>
        </div>
        <div class="category_title">
            <h1>{$categoryName}</h1>
        </div>
        <div class="subcategories">
            <ul>
                {foreach $childCategories as $category}
                    <li><a href="?controller=category&id={$category['CategoryId']}">{$category['CategoryName']}</a></li>
                {/foreach}
            </ul>
        </div>
    </div>
</section>
<section class="main_category">
    <div class="wrapper">
        <div class="row">
            <div class="col s9 main_posts">
                <div class="filters">
                    <div class="row">
                        <div class="col s8 forms_flex">
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byDateDESC">
                                <input type="submit" {if $sorted == 'byDateDESC'} class="active" {else}{/if} value="Nejnovější">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byDateASC">
                                <input type="submit" {if $sorted == 'byDateASC'} class="active" {else}{/if} value="Nejstarší">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byPriceASC">
                                <input type="submit" {if $sorted == 'byPriceASC'} class="active" {else}{/if} value="Nejlevnější">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byPriceDESC">
                                <input type="submit" {if $sorted == 'byPriceDESC'} class="active" {else}{/if} value="Nejdražší">
                            </form>
                        </div>
                        <div class="col s4">
                        </div>  
                    </div>
                </div>
                <div class="post_row">
                    {foreach $posts as $post}
                        {assign var="images" value=","|explode:$post['PostImage']}
                        <div class="post_item">
                            <div class="row">
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id={$post['PostId']}">
                                        <img src="http://wa.toad.cz/~abdykili/images/postImages/{$images[0]}" alt="">
                                    </a>
                                </div>
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id={$post['PostId']}">
                                        <img src="http://wa.toad.cz/~abdykili/images/postImages/{$images[1]}" alt="">
                                    </a>                               
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col s8 post_info">
                                    <a href="?controller=post&id={$post['PostId']}">{$post['PostName']}</a>
                                    <p>{$post['PostAddress']}</p>
                                    <span>{$post['PostPrice']} Kč </span>
                                </div>
                                <div class="col s4 add_love">
                                </div>
                            </div>
                        </div>  
                    {/foreach}
                </div>
                <div class="pagination">
                    <ul>
                    {for $id=1 to $pageCount + 1}
                        <li><a href="{$paginationUrl}{$id}" 
                        {if $id == $page}
                            class="active"
                        {else}
                        {/if}>{$id}</a></li>
                    {/for}              
                    </ul>
                </div>
            </div>
            
            <div class="col s3 side_posts">
                <h3>VIP inzeráty</h3>
                <div class="post_row">
                {foreach $vipposts as $vipPost}
                    {assign var="image" value=","|explode:$vipPost['PostImage']}

                    <div class="post_item">
                        <div class="row">
                            <div class="col s12">
                                <a href="?controller=post&id={$vipPost['PostId']}">
                                <img src="http://wa.toad.cz/~abdykili/images/postImages/{$image[0]}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 post_info">
                                <a href="?controller=post&id={$vipPost['PostId']}">{$vipPost['PostName']}</a>
                                <p>{$vipPost['PostAddress']}</p>
                                <span>{$vipPost['PostPrice']} Kč </span>
                            </div>
                        </div>  
                    </div>    
                
                {/foreach}
                     
                    
                </div>
            </div>
        </div>
    </div>
</section>