<section id="opal-topbar" class="opal-topbar hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 info">
                <div class="hidden-xs hidden-sm"></div>
                <div class="fa fa-whatsapp icon space-right-5"></div>
                <div class="space-right-5">Call us :</div>
                <div class="telephone before">(216)-21 927 930</div>

                <div class="space-right-10">social :</div>
                <div class="header-social">
                    <ul class="social list-unstyled list-inline bo-sicolor">
                        <li>
                            <a href="#" class="facebook">
                                <i class="fa fa-facebook bo-social-facebook">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="fa fa-twitter bo-social-twitter">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="youtube">
                                <i class="fa fa-youtube bo-social-youtube">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="pinterest">
                                <i class="fa fa-pinterest bo-social-pinterest">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="google-plus">
                                <i class="fa fa-google-plus bo-social-google-plus">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="fa fa-linkedin bo-social-linkedin">&nbsp;</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="instagram">
                                <i class="fa fa-instagram bo-social-instagram">&nbsp;</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <ul class="list-style  pull-right">
                    <li class="fa fa-pencil-square-o icon space-right-13" aria-hidden="true"></li>

                    <ul class="account-links dropdown">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <li>
                                <a href="<?php echo URLROOT; ?>/users/register" class="opal-user-register">
                                    <span class="fa fa-pencil"></span> Add User
                                </a>
                            </li>
                            <li>
                                <?php echo $_SESSION['user_name']; ?>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/users/logout" class="opal-user-register">
                                    <span class="fa fa-pencil"></span> Logout
                                </a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#modalLoginForm" class="opal-user-login">
                                    <span class="fa fa-user"></span> Login
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</section>