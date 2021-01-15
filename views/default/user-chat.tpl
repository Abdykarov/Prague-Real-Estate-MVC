<div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat" class="active">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>

                </ul>
                </div>
            </div>
            <div class="col s9">
                <div class="row">
                    <div class="message_section">
                        {if empty($messageGroups)}
                            <p>Nemáte zpravy</p>
                        {else}
                        {foreach $messageGroups as $group}
                            <a class="message_block" href="?controller=user&action=chatPage&id={$group['GroupId']}">
                                <div class="row">
                                    <div class="col s2">
                                        <img src="https://www.pinclipart.com/picdir/middle/355-3553881_stockvader-predicted-adig-user-profile-icon-png-clipart.pnghttps://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png" alt="">
                                    </div>
                                    <div class="col s10 message_text">
                                        <div class="row">
                                            <div class="col s8">
                                                {$group['PartnerName']} {$group['PartnerSurname']}
                                            </div>
                                            <div class="col s4">
                                                {$group['LastMessage']}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        {/foreach}
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>