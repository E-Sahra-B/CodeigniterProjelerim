<?php $this->load->view('front/include/header'); ?>

<div class="container ptb-100">
    <?= uyarimesajioku(); ?>
    <div class="row">
        <div class="col-xxl-10 offset-xxl-1">
            <div class="contact-wrap">
                <div class="row justify-content-center pb-75">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-card">
                            <span class="contact-icon">
                                <i class="flaticon-phone-call"></i>
                            </span>
                            <div class="contact-info">
                                <h3>Telefon</h3>
                                <a href="tel:0123456789">(090) 123-456 789</a>
                                <a href="tel:9876543210">(090) 987-654 321</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-card">
                            <span class="contact-icon">
                                <i class="flaticon-mail"></i>
                            </span>
                            <div class="contact-info">
                                <h3>E-Posta</h3>
                                <a href="#"><span class="__cf_email__">blank@blank.com.tr</span></a>
                                <a href="#"><span class="__cf_email__">blank@blank.com</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-card">
                            <span class="contact-icon">
                                <i class="flaticon-location"></i>
                            </span>
                            <div class="contact-info">
                                <h3>Adres</h3>
                                <p>Küçükbakkalköy / İstanbul / Türkiye</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <h2 class="section-title mb-40">Mesaj Gönder</h2>
                    <form class="form-wrap" action="<?php base_url('home/iletisim') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Ad Soyad*" id="name" required="" data-error="Lütfen Adınızı Yazınız.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" required="" placeholder="Mail Adresi*" data-error="Lütfen Mail Adresinizi Yazınız.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Başlık*" id="msg_subject" required="" data-error="Lütfen Mesaj Başlığını Yazınız.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group v1">
                                    <textarea name="message" id="message" placeholder="Mesajınız" cols="30" rows="10" required="" data-error="Lütfen Mesaj İçeriğini Yazınız."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="mesajpost" class="btn-two">Mesaj Gönder<i class="flaticon-right-arrow"></i></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $this->load->view('front/include/footer'); ?>