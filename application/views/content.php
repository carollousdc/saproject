<div id="content" class="site-content center-relative">
    <div class="single-post-wrapper content-1070 center-relative">

        <article class="center-relative">
            <h1 class="entry-title">
                <?= ($x->name) ?>
            </h1>
            <div class="post-info content-660 center-relative">
                <div class="cat-links">
                    <ul>
                        <li><a href="#"><?= ($x->kategori) ?></a></li>
                    </ul>
                </div>
                <div class="entry-date published"><?= ($x->date) ?></div>
                <div class="clear"></div>
            </div>

            <div class="entry-content">
                <div class="content-wrap content-660 center-relative">
                    <p><i><?= ($x->description) ?></i></p>
                    <br>
                    <div class="clear"></div>
                </div>
                <div class="post-full-width">
                    <script>
                        var slider1_speed = "200";
                        var slider1_auto = "true";
                        var slider1_pagination = "true";
                        var slider1_hover = "true";
                    </script>
                    <div class="image-slider-wrapper">
                        <div class="caroufredsel_wrapper">
                            <ul id="slider1" class="image-slider slides center-text">
                                <li><img src="../asset/homepage/example/1.png" alt=""></li>
                            </ul>
                        </div>
                        <div class="slider1_pagination carousel_pagination left"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="content-wrap content-660 center-relative ">
                    <?= ($x->isi) ?>
                </div>

                <div class="content-wrap content-660 center-relative ">
                    <h1 class="entry-title">#</h1>
                    <div class="contact-form">
                        <p><input id="name" type="text" name="your-name" placeholder="Name"></p>
                        <p><input id="contact-email" type="email" name="your-email" placeholder="Email"></p>
                        <p><input id="subject" type="text" name="your-subject" placeholder="Subject"></p>
                        <p><textarea id="message" name="your-message" placeholder="Message"></textarea></p>
                        <p><input type="submit" onclick="SendMail()" value="SEND"></p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </article>
    </div>
</div>