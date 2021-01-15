<div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post" class="active">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>
                </ul>
                </div>
            </div>
            <div class="col s9">
                {if empty($posts)}
                    <p>Nemáte inzeráty</p>
                {else}
                    <div class="post_block_section">
                        {foreach $posts as $post}
                            <a class="post-block" href="?controller=post&id={$post['PostId']}">{$post['PostName']}</a>
                        {/foreach}
                    </div>
                {/if}         
                    <a class="add_btn" href="?controller=post&action=add">Vytvořit nový</a>
            </div>
        </div>
    </div>
</div>