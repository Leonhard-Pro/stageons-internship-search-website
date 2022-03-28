<div id="display_list">
    <div class="list" id="left_pannel">
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo ('<div class="tab_list" onclick="PannelAppear()">
                    <div>
                        <h3>Title of the offer '.$i.'</h3>
                        <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse. We continue, as we want to test responsiveness and any kind of automatic modification.</p>
                    </div>
                </div>');
        }
        ?>
    </div>
    <div class="container_info" id="right_pannel">
    </div>
</div>