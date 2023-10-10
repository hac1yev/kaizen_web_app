    
<footer class="footer">
    <div class="foot-left">
        <a target="_blank" href="https://www.butagrup.com.tr/?lang=az">        
            <img src="{{ asset($setting->logo_kaizen_footer) }}" alt="">
        </a>
        <p>Uğur, inkişaf və nailiyyətə gedən yolda fəaliyyət göstərən
            Fərdi İnkişaf platforması kaizen.az</p>
        <div class="foot-social">
            <a target="_blank" href="{{$social->facebook}}">
                <img src="{{asset('back/assets/img/fb.png')}}" alt="">
            </a>
            <a target="_blank" href="{{$social->twitter}}">
                <img src="{{asset('back/assets/img/twitter.svg')}}" alt="">
            </a>
            <a target="_blank" href="{{$social->instagram}}">
                <img src="{{asset('back/assets/img/in.png')}}" alt="">
            </a>
            <a target="_blank" href="{{$social->linkedin}}">
                <img src="{{asset('back/assets/img/lin.png')}}" alt="">
            </a>
            <a target="_blank" href="{{$social->telegram}}">
                <img src="{{asset('back/assets/img/tg.png')}}" alt="">
            </a>
            <a target="_blank" href="{{$social->tiktok}}">
                <img src="{{asset('back/assets/img/tk.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="foot-right">
        <div>
                <li>
                    <a href="{{route('ferdi')}}">Fərdi İnkişaf</a>
                </li>
                <li>
                    <a href="{{route('travel')}}">Səyahət</a>
                </li>
                <li>
                    <a href="{{route('story')}}">Hekayələr</a>
                </li>
                <li>
                    <a href="{{route('film')}}">Filmlər</a>
                </li>
                <li>
                    <a href="{{route('biznes')}}">Biznes Dünyası</a>
                </li>
                <li>
                    <a href="{{route('tech')}}">Texnologiya</a>
                </li>
        </div>
        <form action="{{route('contact')}}" method="POST" id="contact">
            @csrf
            <p>Təklif və iradlar</p>
            <div class="footer-input-groups">
                <div class="input-group">
                    <input placeholder="Ad:" name="name" type="text"> &nbsp;&nbsp;
                </div>
                <div class="input-group">
                    <input placeholder="E-mail:*" name="email" type="email"> <br>
                </div>
            </div>
            <textarea id="" name="message" cols="" rows=""></textarea> <br>
            <button type="submit">Mesajı göndərin</button>
        </form>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
    if(session('forgot-password-h78he129')) {
?>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#confirmModal').modal('show');
            });
        </script>
<?php
    }
?>



<script>
    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        })
    @endif
  
    @if(Session::has('error'))
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        })
    @endif
  
    @if(Session::has('warning'))
    Swal.fire({
        icon: 'warning',
        title: '{{ session('warning') }}',
        })
    @endif
</script>

<script>
    $(document).ready(function() {
        var errorMessages = {
            required: 'Bu sahə mütləq doldurulmalıdır!',
            email: 'Zəhmət olmasa düzgün email yazın'
        };
    
        $("#contact").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                },
                message: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: errorMessages.required,
                    email: errorMessages.email,
                },
                name: {
                    required: errorMessages.required,
                },
                message: {
                    required: errorMessages.required,
                },
            },
            submitHandler: function(form) {
                form.submit(); 
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var errorMessages = {
            required: 'Bu sahə mütləq doldurulmalıdır!',
            minlength: 'Bu sahə minimum 8 simvol olmalıdır!',
            email: 'Zəhmət olmasa düzgün email yazın'

        };
    
        $("#login").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8

                },
                email: {
                    required: true,
                    email: true

                }
            },
            messages: {
                password: {
                    required: errorMessages.required,
                    minlength: errorMessages.minlength,

                },
                email: {
                    required: errorMessages.required,
                    email: errorMessages.email,

                }
            },
            submitHandler: function(form) {
                form.submit(); // Formu gönder
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        var errorMessages = {
            required: 'Bu sahə mütləq doldurulmalıdır!',
            minlength: 'Bu sahə minimum 8 simvol olmalıdır!',
            email: 'Zəhmət olmasa düzgün email yazın'

        };
    
        $("#register").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8

                },
                email: {
                    required: true,
                    email: true

                },
                username: {
                    required: true
                },
                fullname: {
                    required: true
                },
            },
            messages: {
                password: {
                    required: errorMessages.required,
                    minlength: errorMessages.minlength,

                },
                email: {
                    required: errorMessages.required,
                    email: errorMessages.email,

                },
                username: {
                    required: errorMessages.required,

                },
                fullname: {
                    required: errorMessages.required,

                },
            },
            submitHandler: function(form) {
                form.submit(); 
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var errorMessages = {
            required: 'Bu sahə mütləq doldurulmalıdır!',
            email: 'Zəhmət olmasa düzgün email yazın'

        };
    
        $("#forget").validate({
            rules: {
                email: {
                    required: true,
                    email: true

                },
                
            },
            messages: {
                email: {
                    required: errorMessages.required,
                    email: errorMessages.email,

                },
            },
            submitHandler: function(form) {
                form.submit(); 
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        var errorMessages = {
            required: 'Bu sahə mütləq doldurulmalıdır!',
            minlength: 'Bu sahə minimum 8 simvol olmalıdır!',
            equalTo: 'Bu sahə şifrə ilə eyni olmalıdır!',

        };
    
        $("#confirm").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8

                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"


                },
                
            },
            messages: {
                password: {
                    required: errorMessages.required,
                    minlength: errorMessages.minlength,

                },
                password_confirmation: {
                    required: errorMessages.required,
                    minlength: errorMessages.minlength,

                },
                
            },
            submitHandler: function(form) {
                form.submit(); 
            }
        });
    });
</script>

<script>
    const password_eye = document.querySelector('#password_eye');
    const passwords = document.querySelector('#passwords');
    const register_password_eye = document.querySelector('#register_password_eye');
    const register_passwords = document.querySelector('#register_passwords');
    const confirm_pass = document.querySelector('#confirm_pass');
    const confirm_pass_eye = document.querySelector('#confirm_pass_eye');
    const confirm_pass2 = document.querySelector('#confirm_pass2');
    const confirm_pass_eye2 = document.querySelector('#confirm_pass_eye2');

    password_eye.addEventListener('click', () => {
        passwords.classList.toggle('add_input_type');

        if (passwords.classList.contains("add_input_type")) {
            passwords.setAttribute("type", "text");
            password_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eyeslash.png'
        } else {
            passwords.setAttribute("type", "password");
            password_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eye.png'
        }
    });

    confirm_pass_eye.addEventListener('click', () => {
        confirm_pass.classList.toggle('add_input_type');

        if (confirm_pass.classList.contains("add_input_type")) {
            confirm_pass.setAttribute("type", "text");
            confirm_pass_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eyeslash.png'
        } else {
            confirm_pass.setAttribute("type", "password");
            confirm_pass_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eye.png'
        }
    });

    confirm_pass_eye2.addEventListener('click', () => {
        confirm_pass2.classList.toggle('add_input_type');

        if (confirm_pass2.classList.contains("add_input_type")) {
            confirm_pass2.setAttribute("type", "text");
            confirm_pass_eye2.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eyeslash.png'
        } else {
            confirm_pass2.setAttribute("type", "password");
            confirm_pass_eye2.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eye.png'
        }
    });

    register_password_eye.addEventListener('click', () => {
        register_passwords.classList.toggle('add_input_type');

        if (register_passwords.classList.contains("add_input_type")) {
            register_passwords.setAttribute("type", "text");
            register_password_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eyeslash.png'
        } else {
            register_passwords.setAttribute("type", "password");
            register_password_eye.src = 'https://kaizen.butagrup.az/back/assets/img/profile/eye.png'
        }
    });
</script>

