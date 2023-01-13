<?php
wp_footer()
?>
<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__info">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <h3 class="footer__company-name">PT. Sugih Makmur Eka Industri</h3>
                <p class="footer__company-address">Komplek Sunter Agung Podomoro Jl. Agung Timur 2 Blok 03 No. Kav 4-6 Sunter - Jakarta Utara 14350, Indonesia</p>

                <h4 class="footer__note-title">Notes :</h4>
                <ul class="footer__note-list">
                    <li class="footer__note-item">
                        Some products may not be available in your area.

                    </li>
                    <li class="footer__note-item">
                        Please check with your nearest reseller for updated prices.

                    </li>
                    <li class="footer__note-item">
                        All pictures shown are for illustration purpose only, Actual product may vary.
                    </li>
                </ul>
            </div>
            <div class="footer__contact">
                <h3 class="footer__title">Contact</h3>
                <h4 class="footer__subtitle">Phone</h4>
                <ul class="footer__contact-lists">
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                </ul>
                <h4 class="footer__subtitle">Fax</h4>
                <ul class="footer__contact-lists">
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                    <li class="footer__contact-item">
                        <a class="footer__contact-link" href="tel:+6221 652 0162">+6221 652 0162</a>
                    </li>
                </ul>
            </div>
            <div class="footer__menu">
                <h3 class="footer__title">Products</h3>
                <ul class="footer__menu-lists">
                    <li class="footer__menu-item">
                        <a href="" class="footer__menu-link">Premium Series</a>
                    </li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Premium Series</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Premium Series</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Premium Series</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Premium Series</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Premium Series</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__copyright">
            <ul class="social-icons">
                <li class="social-icons__item">
                    <a href="" class="social-icons__link">
                        <iconify-icon class="social-icons__icon" height="24" icon="bxl:facebook"></iconify-icon>
                    </a>
                </li>
                <li class="social-icons__item">
                    <a href="" class="social-icons__link">
                        <iconify-icon class="social-icons__icon" height="24" icon="bxl:instagram-alt"></iconify-icon>

                    </a>
                </li>
                <li class="social-icons__item">
                    <a href="" class="social-icons__link">
                        <iconify-icon class="social-icons__icon" height="24" icon="bxl:youtube"></iconify-icon>
                    </a>
                </li>
            </ul>
            <div class="footer__copyright-text">
                Copyright © 2022 SAN-EI Indonesia. All Rights Reserved. <div class="footer__copyright-higlight">Powered by <a class="footer__copyright-link" href="#">PT. Timedoor Indonesia.</a></div>
            </div>
        </div>
    </div>
</footer>

<div class="offcanvas offcanvas-end miniShopOffCanvas" tabindex="-1" id="miniShopOffCanvas">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Shopping Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php echo woocommerce_mini_cart() ?>
    </div>
</div>
</body>

</html>