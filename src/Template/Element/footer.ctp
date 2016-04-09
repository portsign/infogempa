<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="/images/home/under.png" class="img-responsive inline" alt="">
                <br />
                <p class="disclaimer"><strong>Disclaimer:</strong> Kami mencoba untuk menjaga informasi yang akurat dan terkini, namun Kami tidak dapat menjamin keakuratan informasi.</p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                    <h2>Testimonial</h2>
                    <div class="media">  
                    <div class="pull-left">
                            <a href="#"><img src="/images/home/profile1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Bagus nih, bermanfaat jadi semakin tertarik belajar Geografi.</blockquote>
                            <h3><a href="#">- Nur Kholis</a></h3>
                        </div>
                     </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img src="/images/home/profile2.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Bagus, tapi lebih bagus lagi kalo dibuatin aplikasi androidya.</blockquote>
                            <h3><a href="">- Abraham Abdullah</a></h3>
                        </div>
                    </div>   
                </div> 
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <h2>Contacts</h2>
                    <address>
                    E-mail: <a href="mailto:info@infogempa.com">info@infogempa.com</a> <br> 
                    Build with : <a href="http://cakephp.org/">CakePHP 3</a><br />
                    Developed by : <a href="https://indocreator.co.id">IndoCreator</a>
                    </address>

                    <h2>Pages</h2>
                    <address>
                        <a href="/">Home</a> <br> 
                        <a href="/belajar">Belajar</a> <br> 
                        <a href="/dmca">DMCA</a> <br> 
                        <a href="privacy-policy">Privacy Policy</a> <br> 
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div id="contact" class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form name="contact-form" method="post" action="/contact-action">
                        <div class="form-group">
                            <?= $this->Flash->render('success_contact') ?>
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; <a href="https://indocreator.co.id">InfoGempa 2016</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->