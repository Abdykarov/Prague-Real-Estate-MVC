<div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="col s3">
                <div class="user_sidebar">
                <ul>
                    <li><a href="?controller=user&action=post">Moje inzeráty</a></li>
                    <li><a href="?controller=user&action=chat">Moje zprávy</a></li>
                    <li><a href="?controller=user&action=index" class="active">Můj profil</a></li>
                    <li><a href="?controller=user&action=logout">Log out</a></li>
                </ul>
                </div>
            </div>
            <div class="col s9">
                <div class="user_main">
                    <h2>Kontaktní informace</h2>
                    <h4>Váš email: <span>{$userEmail}</span></h4>
                    <h5>Váš id: <span>{$userId}</span></h5>
                    <h5>Číslo smlouvy: <span>#281001{$userId}</span></h5>
                    <div class="user_block">
                        <form id="change_form" method="post" action="?controller=user&action=updateUser">
                            <div class="row">
                            <input type="hidden" name="userId" value="{$userId}">
                                <div class="col s6">
                                    <label for="name">Jmemo [Musi byt A-Z a-z 9-0]</label>
                                    <input id="name" value="{$userName}" required pattern="[A-Za-z0-9]+" title="Špatny format" name="new_name" type="text" class="validate">
                                    <div class="error_handler name_error">
                                    {if isset($name_err)}
                                        {$name_err}
                                    {/if}
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="phone">Telefon [Musi byt 9-0]</label>
                                    <input id="phone" value="{$userPhone}"required pattern="[0-9]+"  name="new_phone" type="number" class="validate">
                                    <div class="error_handler phone_error">
                                    {if isset($phone_err)}
                                        {$phone_err}
                                    {/if}
                                </div>
                                </div>
                            </div>
                            <p>Změna hesla</p>
                            <div class="row">
                                <div class=" col s6">
                                    <label for="old_pass">Staré heslo [Musi byt 9-0]</label>
                                    <input id="old_pass" required pattern="[0-9]+" type="password" name="pass" class="validate">
                                    <div class="error_handler oldpass_error">
                                    {if isset($oldpass_err)}
                                        {$oldpass_err}
                                    {/if}
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="new_pass">Nové heslo [Musi byt 9-0]</label>
                                    <input id="new_pass" required pattern="[0-9]+"  name="new_pass" type="password" class="validate">
                                    <div class="error_handler newpass_error">
                                        {if isset($newpass_err)}
                                            {$newpass_err}
                                        {/if}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" name="update">Uložit změny</button>
                            </div>
                        </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>