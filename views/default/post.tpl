<div class="post_section">
    <div class="wrapper">
        <div class="row">
            <div class="col s12 post_slider">
                {assign var="images" value=","|explode:$postData[0]['PostImage']}

                <div id="primary-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            {foreach $images as $image}
                                <li class="splide__slide">
                                    <img src="http://wa.toad.cz/~abdykili/images/postImages/{$image}">
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
                <div id="secondary-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            {foreach $images as $image}
                                <li class="splide__slide">
                                    <img src="http://wa.toad.cz/~abdykili/images/postImages/{$image}">
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>

            </div>
            
        </div>

        <div class="row">
            <div class="col s9 post_container">
                <div class="row">
                    <div class="breadcrumbs">
                        <ul>
                        {foreach $breadcrumbs as $row}
                            <li><a href="?controller=category&id={$row['CategoryId']}">{$row['CategoryName']}</a></li>
                        {/foreach}
                        
                        </ul>
                    </div>
                </div>
                <div class="post_desc">
                    <div class="post_block">
                        <h1>{$postData[0]['PostName']}</h1>
                        <h5>{$postData[0]['PostAddress']}</h5>
                    </div>
                    
                    <div class="post_block">
                        <h4>Popís inzerátu</h4>
                        <p>{$postData[0]['PostDescription']}</p>
                    </div>
                    <div class="post_block ">
                        <h4>Detailně o inzerátu</h4>
                        <div class="row">
                            <div class="col s6 post_attr">Číslo zakázky<span>PRE-{$postData[0]['PostId']}-NPO281001</span></div>
                            <div class="col s6 post_attr">Jmeno autora<span>{$userData['Name']}</span></div>
                            <div class="col s6 post_attr">Užitná plocha<span>{$postData[0]['PostArea']} &#13217;</span></div>
                            <div class="col s6 post_attr">Cena<span>{$postData[0]['PostPrice']} kč</span></div>
                            <div class="col s6 post_attr">Adresa<span>{$postData[0]['PostAddress']}</span></div>
                            <div class="col s6 post_attr">Konstrukce budovy<span>{$postData[0]['PostConstruction']}</span></div>
                            <div class="col s6 post_attr">Datum<span>{$postData[0]['PostDate']}</span></div>
                            <div class="col s6 post_attr">Vlastnictví<span>{$postData[0]['PostOwnership']}</span></div>
                            <div class="col s6 post_attr">Vip<span>({$postData[0]['VipStatus']})</span></div>
                            <div class="col s6 post_attr">Stav bytu<span>{$postData[0]['PostCondition']}</span></div>
                        </div>
                    </div>
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" src="https://maps.google.it/maps?q={$url}&output=embed"></iframe>
                </div>
                
            </div>
            <div class="col s3 post_aside">
                <div class="post_contacts">
                    <p>{$postData[0]['PostPrice']} kč</p>
                    <div class="post_phone"><span>Telefon</span> {$userData['Phone']}</div>
                    <form action="?controller=user&action=startChat" method="post">
                        <input type="hidden" name="userId" value="{if isset($userId)}{$userId}{/if}">
                        <input type="hidden" name="postAuthorId" value="{$postData[0]['AuthorId']}">
                        <button type="submit" name="startChat">Napsat zprávu</button>
                    </form>
                    <h5> <i class='material-icons'>gps_fixed</i> {$postData[0]['PostAddress']}</h5>
                </div>               
           </div>
        </div>
        <div class="post_block post_details">
            <h4>Podobné nabídky</h4>
        </div>
        <div class="row">
            <div class="col s9">
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
            </div>
            <div class="col s3">
            </div>
        </div>
    
    </div>
</div>