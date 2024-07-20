<div class="contact-body">
    <div class="row justify-content-center card-row">
        <div class="col-12 col-md-4 contact-card contact-card-map">
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.3560433633475!2d77.3077271!3d28.589093799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0543f46aa09b%3A0xe023d89d9ec64ec9!2sAGA%20Holidays!5e0!3m2!1sen!2sin!4v1721315010445!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-12 col-md-4  contact-card contact-card-details">
            <div class="contact-infos">
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="text-box">
                        <h4 class="title">Call Us</h4>
                        <p class="text"><a href="tel:+91 8800690188">+91 8800690188/89</a></p>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="text-box">
                        <h4 class="title">Mail Us</h4>
                        <p class="text"><a href="mailto:info@agaholidays.com">info@agaholidays.com</a></p>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="text-box">
                        <h4 class="title">Address</h4>
                        <p class="text">Office No. C-5, 3rd Floor, B-156, <br> New Ashok Nagar, New Delhi, Delhi 110096</p>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div class="text-box">
                        <h4 class="title">Working Days</h4>
                        <p class="text">Mon - Sat, 10:30AM - 7:00PM</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 contact-card contact-card-form">
            <form action="{{ route('user_submit_contact_query') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <input type="text" id="user_name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your Name" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group mt-4">
                    <input type="email" id="user_email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group mt-4">
                    <input type="phone" id="user_phone" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Your Phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="form-group mt-4">
                    <input type="text" id="user_subject" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="Subject" required />
                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                </div>
                <div class="form-group mt-4">
                    <textarea id="user_message" class="form-control" name="message" value="{{ old('message') }}" placeholder="Your Message" required></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>