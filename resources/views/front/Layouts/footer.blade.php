    
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
        <form action="{{route('contact')}}" method="POST">
            @csrf
            <p>Təklif və iradlar</p>
            <input placeholder="Ad:" name="name" type="text"> &nbsp;&nbsp;
            <input placeholder="E-mail:*" name="email" type="email"> <br>
            <textarea id="" name="message" cols="" rows=""></textarea> <br>
            <button type="submit">Mesajı göndərin</button>
        </form>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
 