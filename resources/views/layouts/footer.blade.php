<footer id="footer" class="footer px-4 px-md-0">
    <div class="container">
        <div class="footer-logo mb-4">
            <h3>L O G O</h3>
            <div class="footer-nav-container d-block d-md-none">
                <h5 class="nav-title">About</h5>
                <ul class="footer-nav mt-2">
                </ul>
                <p class="footer-about-text">
                    AGA Holidays, based in Delhi, India, offers comprehensive travel services including 
                    domestic and international tour packages, hotel bookings, flight tickets, tourist 
                    visas, and cruise packages...
                </p>
                <ul class="footer-nav mt-2">
                    <li><a href="{{ route('user_about') }}">Read more...</a></i></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col col-6 col-lg-3 d-none d-md-block">
                <div class="footer-nav-container">
                    <h5 class="nav-title">About</h5>
                    <p class="footer-about-text">
                        AGA Holidays, based in Delhi, India, offers comprehensive travel services including 
                        domestic and international tour packages, hotel bookings, flight tickets, tourist 
                        visas, and cruise packages...
                    </p>
                    <ul class="footer-nav mt-2">
                        <li><a href="{{ route('user_about') }}">Read more...</a></i></li>
                    </ul>
                </div>
            </div>
            <div class="col col-6 col-lg-3">
                <div class="footer-nav-container">
                    <h5 class="nav-title">Support</h5>
                    <ul class="footer-nav mt-2">
                        <li><a href="{{ route('user_contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('user_privacy_policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('user_terms') }}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col col-6 col-lg-3">
                <div class="footer-nav-container">
                    <h5 class="nav-title">Explore</h5>
                    <ul class="footer-nav mt-2">
                        <li><a href="{{ route('user_packages') }}">Packages</a></li>
                        <li><a href="{{ route('user_destinations') }}">Destinations</a></li>
                        <li><a href="{{ route('user_blogs') }}">Blogs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col col-6 col-lg-3 flex-grow-1">
                <div class="footer-nav-container">
                    <h5 class="nav-title">Contact</h5>
                    <ul class="footer-nav mt-2">
                        <li><a>Reach Us at:</a></li>
                        <li><a>Office No. C-5, 3rd Floor, B-156, New Ashok Nagar, New Delhi, Delhi 110096</a></li>
                        <li><a href="tel:+91 8800690188"><i class="bi bi-telephone"></i> +91 8800690188/89</a></li>
                        <li><a href="mailto:info@agaholidays.com"><i class="bi bi-envelope"></i> info@agaholidays.com</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-icons">
            <div class="row">
                <div class="col-12  col-md-6">
                    <ul class="footer-icons-nav nav mt-2">
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>

                {{--<div class="col-12  col-md-6">
                    <ul class="footer-payments-nav nav mt-2">
                        <li><img src="{{ asset('assets/img/visa.png') }}" alt="VISA" /></li>
                        <li><img src="{{ asset('assets/img/mastercard.png') }}" alt="MasterCard" /></li>
                        <li><img src="{{ asset('assets/img/paypal.png') }}" alt="Paypal" /></li>
                        <li><img src="{{ asset('assets/img/rupay.png') }}" alt="Rupay" /></li>
                    </ul>
                </div>--}}
            </div>
        </div>

        <hr style="color: #fff;"/>

        <div class="sub-footer text-center">
            <span><i class="bi bi-c-circle"></i> Aga Holidays -  All rights reserved</span>
        </div>
    </div>
</footer>