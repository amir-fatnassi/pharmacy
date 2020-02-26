<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('register_success'); ?>
<section id="main" class="site-main">
  <section id="opal-breadscrumb" class="opal-breadscrumb" style="">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo URLROOT; ?>">Home</a></li>
        <li class="active">My Account</li>
      </ol>
    </div>
  </section>
  <section id="main-container" class="container inner">
    <div class="row">
      <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">
            <article id="post-55" class="post-55 page type-page status-publish hentry">
              <div class="entry-content-page">
                <div class="woocommerce">
                  <div class="woocommerce-notices-wrapper"></div>

                  <div class="u-columns col2-set" id="customer_login">
                    <div class="u-column1 col-1">
                      <h2>Login</h2>

                      <form class="woocommerce-form woocommerce-form-login login" action="<?php echo URLROOT; ?>/users/login" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                          <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                          <input type="email" name="email" class="woocommerce-Input woocommerce-Input--text input-text <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                          <label for="password">Password&nbsp;<span class="required">*</span></label>
                          <input type="password" name="password" class="woocommerce-Input woocommerce-Input--text input-text <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </p>

                        <p class="form-row">
                          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                            <span>Remember me</span>
                          </label>
                          <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="329b9e3b88" /><input type="hidden" name="_wp_http_referer" value="/medicare/?page_id=55" />
                          <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">
                            Log in
                          </button>
                        </p>
                        <!-- <p class="woocommerce-LostPassword lost_password">
                          <a href="index57b4.html?page_id=55&amp;lost-password">Lost your password?</a>
                        </p> -->
                      </form>
                    </div>

                    <!-- <div class="u-column2 col-2">
                      <h2>Register</h2>

                      <form method="post" class="woocommerce-form woocommerce-form-register register">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                          <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
                          <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="" />
                        </p>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                          <label for="reg_password">Password&nbsp;<span class="required">*</span></label>
                          <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                        </p>

                        <div class="woocommerce-privacy-policy-text"></div>
                        <p class="woocommerce-FormRow form-row">
                          <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="4a9af3431c" /><input type="hidden" name="_wp_http_referer" value="/medicare/?page_id=55" />
                          <button type="submit" class="woocommerce-Button button" name="register" value="Register">
                            Register
                          </button>
                        </p>
                      </form>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- .entry-content -->
            </article>
            <!-- #post-## -->
          </div>
          <!-- #content -->
        </div>
        <!-- #primary -->
      </div>
      <!-- #main-content -->
    </div>
  </section>
</section>
<!-- #main -->
<?php require APPROOT . '/views/inc/footer.php'; ?>