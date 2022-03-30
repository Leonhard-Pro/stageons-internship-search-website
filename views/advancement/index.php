<div id="main">
    <div id="advancement">
        <div class="menu-advancement">
            <form action="" method="POST">
                <input type="submit" name="typeAdvancement" value="Wishlist">
                <input type="submit" name="typeAdvancement" value="Applied">
                <input type="submit" name="typeAdvancement" value="Step 1">
                <input type="submit" name="typeAdvancement" value="Step 2">
                <input type="submit" name="typeAdvancement" value="Step 3">
                <input type="submit" name="typeAdvancement" value="Step 4">
                <input type="submit" name="typeAdvancement" value="Step 5">
                <input type="submit" name="typeAdvancement" value="Step 6">
                <input type="submit" name="typeAdvancement" value="Rating">
            </form>
        </div>
        <div id="filters">
            <?php include("views/layout/filters.php"); ?>
        </div>

        <div class="advancement-offer">

            <div class="offer">
                <div class="informations">
                    <h1 class="information-offer offer-title">a</h1>
                    <h2 class="information-offer offer-name-company">a</h2>
                    <h3 class="information-offer offer-locate">a</h3>
                    <h3 class="information-offer offer-degree">a</h3>
                    <h3 class="information-offer offer-date-publish">a</h3>
                </div>
                <div class="advancement-step">
                    <form class="form" method="POST">
                        <?php if($advancement['type'] == "Wishlist"): ?>
                        <button type="submit" name="actionAdvancement" value="applied">Applied</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 1"): ?>
                        <button type="submit" name="actionAdvancement" value="step1">Validate Step 1</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 2"): ?>
                        <button type="submit" name="actionAdvancement" value="step2">Validate Step 2</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 3"): ?>
                        <button type="submit" name="actionAdvancement" value="step3">Validate Step 3</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 4"): ?>
                        <button type="submit" name="actionAdvancement" value="step4">Validate Step 4</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 5"): ?>
                        <button type="submit" name="actionAdvancement" value="step5">Validate Step 5</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Step 6"): ?>
                        <button type="submit" name="actionAdvancement" value="step6">Validate Step 6</button>
                        <?php endif; ?>
                        <?php if($advancement['type'] == "Rating"): ?>
                        <button type="submit" name="actionAdvancement" value="rate">Rate</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($advancement['action'] == "applied") : ?>
    <div class="applied-blur">
    </div>
    <form id="applied-popup">
        <div class="applied-popup-box">
            <h1 class="applied-title">Applied</h1>
            <label for="applied-resum">Resum:</label>
            <textarea class="applied-resum applied-textarea" id="applied-resum" placeholder="Your resum" name="applied-resum" form="applied-popup"></textarea>
            <label for="applied-cl">CL:</label>
            <textarea class="applied-cl applied-textarea" id="applied-cl" placeholder="Your CL" name="applied-cl" form="applied-popup"></textarea> 
            <button type="submit" value="" class="refuse-button">Refuse</button>
            <button type="submit" name="actionAdvancement" value="applied-confirm" class="applied-button">Applied</button>
        </div>
    </form>
    <?php endif; ?>
</div>