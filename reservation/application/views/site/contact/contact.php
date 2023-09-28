<div class="container">
    <div class="row">

        <!-- Contact details -->
        <section class="contact-details">
            <div class="col-md-5">
                <h2 class="lined-heading  mt50"><span>Adres</span></h2>
                <!-- Panel -->
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-star"></i> <strong>SecondHome</strong></div>
                    </div>
                    <div class="panel-body">
                        <address>
                            <strong><?php echo $contact->title; ?></strong><br>
                            <?php echo $contact->address; ?>
                            <br>
                            <abbr title="Phone">P:</abbr> <a href="#"><?php echo $contact->phone; ?></a><br>
                            <abbr title="Email">E:</abbr> <a href="#"><?php echo $contact->email; ?></a><br>
                            <abbr title="Website">W:</abbr> <a href="#"><?php echo $contact->web; ?></a><br>
                        </address>
                    </div>
                </div>
                <!-- GMap -->
                <div class="mt30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385396.60596766684!2d29.01217945!3d41.0053215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1674705068387!5m2!1str!2str" width="457" height="298" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <!-- Contact form -->
        <section id="contact-form" class="mt50">
            <div class="col-md-7">
                <h2 class="lined-heading"><span>Mesaj Gönder</span></h2>
                <form class="clearfix mt50" role="form" method="post" action="<?php base_url('homeroom/contact') ?>">
                    <div id="message"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" accesskey="U"><span class="required">*</span> Adınızı Giriniz</label>
                                <input name="gonderen" type="text" id="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" accesskey="E"><span class="required">*</span> E-mail</label>
                                <input name="mail" type="text" id="email" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" accesskey="S">Konu</label>
                        <input name="baslik" type="text" id="subject" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="comments" accesskey="C"><span class="required">*</span> Mesajınızı giriniz...</label>
                        <textarea name="icerik" rows="9" id="comments" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label><span>*&nbsp;&nbsp;</span><span id="num1"></span> + <span id="num2"></span> = ?</label>
                        <input name="verify" type="text" id="captchaAnswer" class="form-control" placeholder="Lütfen matematik işlem sonucunu giriniz." />
                        <small>
                            <p id="captchaMessage"></p>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary" disabled id="checkCaptcha">Mesaj Gönder</button>
                </form>
            </div>
        </section>
    </div>
</div>