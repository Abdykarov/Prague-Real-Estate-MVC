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
                        <div class="message_info">
                            <div class="row">
                                <div class="col s2">
                                    <a href="?controller=user&action=chat"><i class="material-icons">arrow_back</i></a>
                                </div>
                                <div class="col s6">
                                    {$partner['Name']} 
                                    {$partner['Surname']}
                                </div>
                                <div class="col s4">
                                    {$partner['Phone']}
                                </div>
                            </div>
                        </div>
                        <div class="message_text_form">
                            {foreach $messages as $message}
                                {if $message['FromUser'] == $userId}
                                    <div class="message_row">
                                        <div class="message_box right">
                                            <p>{$message['MessageText']}</p>
                                            <span>{$message['MessageDate']}</span>
                                        </div>
                                    </div>
                                {else}
                                     <div class="message_row">
                                        <div class="message_box left">
                                            <p>{$message['MessageText']}</p>
                                            <span>{$message['MessageDate']}</span>
                                        </div>
                                    </div>
                                {/if}
                            {/foreach}
                        </div>
                        <div class="message_submit">
                            <form method="post" id="chat_form">
                                <div class="row">
                                    <div class="col s10">
                                        <textarea name="messageText" required id="msg" placeholder="Napište zprávu"></textarea>
                                        <div class="error_handler msg_error">
                                            {if isset($msgError)}
                                                {$msgError}
                                            {/if}
                                        </div>  
                                    </div>
                                    <div class="col s2">
                                        <button type="submit">Napsat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>