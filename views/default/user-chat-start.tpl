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
                <h5>Napsat zprávu uživatelu {$postAuthor['Name']}</h5>     
                <form action="?controller=user&action=InitMessage" id="msg_form" method="post">
                    <label for="msg_text">Zpráva</label>
                    <textarea class="materialize-textarea" required id="msg_text" name="message"></textarea>
                    <div class="error_handler msg_error">
                                
                    </div>  
                    <input type="hidden" name="postAuthor" value="{$postAuthor['Id']}">
                    <input type="hidden" name="userId" value="{$userId}">
                    <button type="submit" name="sendMessage">Odeslat</button>
                </form>        

            </div>
        </div>
    </div>
</div>