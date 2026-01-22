<!-- Main Footer -->
<footer class="main-footer style-two">
    <div class="pattern-layer-one"></div>
    <div class="pattern-layer-two"></div>
    
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <div class="row clearfix">
                <!-- Column -->
                <div class="big-column col-lg-9 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{url('/')}}">
                                        <img src="{{url('/')}}/uploads/RoyalTechComputersLogow-05.png" alt="Royal Tech Computers Limited" />
                                    </a>
                                </div>
                                <div class="text">
                                    <p>We are Kenya's best Information Technology Company. Providing the highest quality in hardware & Network solutions. About more than 11 years of experience and 1000+ of innovative achievements.</p>
                                </div>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    <li>
                                        <a href="https://www.facebook.com/royaltechcomps" class="fa fa-facebook-f" target="_blank" rel="noopener noreferrer" aria-label="Facebook"></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/royaltech-computers-ltd/" class="fa fa-linkedin" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/RoyaltechC" class="fa fa-twitter" target="_blank" rel="noopener noreferrer" aria-label="Twitter"></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/royaltechcomps/" class="fa fa-instagram" target="_blank" rel="noopener noreferrer" aria-label="Instagram"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-youtube" target="_blank" rel="noopener noreferrer" aria-label="YouTube"></a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=254724404935&text=Hello there, i am texing from Royal Tech Website" class="fa fa-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Quick Links</h5>
                                <ul class="list-link two-columns">
                                    <?php $Ser = DB::table('services')->get(); ?>
                                    @foreach ($Ser as $ser)
                                    <li>
                                        <a href="{{url('/')}}/center-of-excellence/{{$ser->slung}}">{{$ser->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="big-column col-lg-3 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!-- Footer Column -->
                        <div class="footer-column col-lg-12 col-md-12 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h5>Contact Us</h5>
                                <ul>
                                    <li>
                                        <span class="icon flaticon-placeholder-2"></span>
                                        <strong>Address</strong>
                                        Biashara Street, Revlon Professional Plaza, 2nd Floor, Suite 1
                                    </li>
                                    <li>
                                        <span class="icon flaticon-phone-call"></span>
                                        <strong>Phone</strong>
                                        <a href="tel:+254724404935">0724 404935</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-1"></span>
                                        <strong>E-Mail</strong>
                                        <a href="mailto:info@royaltech.co.ke">info@royaltech.co.ke</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <div class="copyright">Copyright &copy; {{date('Y')}} by RoyalTech Computers Limited | All Rights Reserved.</div>
            <ul class="footer-nav">
                <li><a href="{{url('/')}}/privacy-policy">Privacy Policy</a></li>
                <li><a href="{{url('/')}}/terms-and-conditions">Terms and Conditions</a></li>
                <li><a href="{{url('/')}}/copyright">Copyright Statement</a></li>
            </ul>
        </div>
    </div>
</footer>
