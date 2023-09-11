    
<footer class="footer">
    <div class="foot-left">
        <img src="{{asset('back/assets/img/f-logo.png')}}" alt="">
        <p>Uğur, inkişaf və nailiyyətə gedən yolda fəaliyyət göstərən
            Fərdi İnkişaf platforması kaizen.az</p>
        <div class="foot-social">
            <a target="_blank" href="">
                <img src="{{asset('back/assets/img/fb.png')}}" alt="">
            </a>
            <a target="_blank" href="">
                <img src="{{asset('back/assets/img/tw.png')}}" alt="">
            </a>
            <a target="_blank" href="">
                <img src="{{asset('back/assets/img/in.png')}}" alt="">
            </a>
            <a target="_blank" href="">
                <img src="{{asset('back/assets/img/lin.png')}}" alt="">
            </a>
            <a target="_blank" href="">
                <img src="{{asset('back/assets/img/tg.png')}}" alt="">
            </a>
            <a target="_blank" href="">
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


