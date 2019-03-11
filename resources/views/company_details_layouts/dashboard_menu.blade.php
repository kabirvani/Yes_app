<div class="dashboard_menu">
    <div class="dashboard_menu_nav">
        <a href="/home"><img src="{{ asset('img/logo.svg') }}"></a>
        <ul class="logout_btn">
            <!-- Authentication Links -->
            @guest
                
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <!-- {{ Auth::user()->name }}  -->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30">
                            <defs>
                                <clipPath id="clip_0">
                                    <rect x="-373" y="-102" width="1440" height="1054" clip-rule="evenodd"/>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#clip_0)">
                                <path fill="rgb(42,53,73)" stroke="none" d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z"/>
                            </g>
                            <defs>
                                <clipPath id="clip_1">
                                    <rect x="-373" y="-102" width="1440" height="1054" clip-rule="evenodd"/>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#clip_1)">
                                <path fill="#949aa4" stroke="none" transform="translate(8 7)" d="M6.76923 0C4.73798 0 3.07692 1.29327 3.07692 3.69231C3.07692 5.29808 3.82452 6.96154 4.92308 7.88462L4.92308 8.73077C4.92308 9.10096 4.67308 9.41827 4.36538 9.48077C1.96635 10.2188 0 11.8077 0 12.7308L0 13.8462C0 15.0144 3.01442 16 6.76923 16C10.524 16 13.5385 15.0144 13.5385 13.8462L13.5385 12.7308C13.5385 11.8702 11.6346 10.2188 9.17308 9.48077C8.86539 9.41827 8.61538 9.03846 8.61538 8.73077L8.61538 7.88462C9.71394 6.96154 10.4615 5.29808 10.4615 3.69231C10.4615 1.29327 8.80048 0 6.76923 0Z"/>
                            </g>
                        </svg>
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="logout_menu">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    <div class="company_setup_progress" style="display:flex;">
        <canvas id="progress_chart" style="height: 75px; width: 75px; margin-top: -4px"></canvas>
        <p>Company Setup Progress</p>
        <p id="progress_text"></p>
    </div>
    <div class="menu">
        <div class="item active">
            <div class="left_bar"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" version="1.1" fill="#455565"><g id="surface1" fill="#455565"><path style=" " d="M 4.5 2 C 3.671875 2 3 2.671875 3 3.5 L 3 13 L 8.085938 13 L 7.585938 12.5 L 8.085938 12 L 4 12 L 4 3.5 C 4 3.226563 4.222656 3 4.5 3 L 10.5 3 C 10.777344 3 11 3.226563 11 3.5 L 11 9 L 11.085938 9 L 12 8.085938 L 12 3.5 C 12 2.671875 11.328125 2 10.5 2 Z M 5 4 L 5 5 L 7 5 L 7 4 Z M 8 4 L 8 5 L 10 5 L 10 4 Z M 5 6 L 5 7 L 7 7 L 7 6 Z M 8 6 L 8 7 L 10 7 L 10 6 Z M 5 8 L 5 9 L 7 9 L 7 8 Z M 8 8 L 8 9 L 10 9 L 10 8 Z M 12.5 9 L 11.5 10 L 10 10 L 10 11.5 L 9 12.5 L 10 13.5 L 10 15 L 11.5 15 L 12.5 16 L 13.5 15 L 15 15 L 15 13.5 L 16 12.5 L 15 11.5 L 15 10 L 13.5 10 Z M 5 10 L 5 11 L 7 11 L 7 10 Z M 8 10 L 8 11 L 9 11 L 9 10 Z M 12.5 10.414063 L 13.085938 11 L 14 11 L 14 11.914063 L 14.585938 12.5 L 14 13.085938 L 14 14 L 13.085938 14 L 12.5 14.585938 L 11.914063 14 L 11 14 L 11 13.085938 L 10.414063 12.5 L 11 11.914063 L 11 11 L 11.914063 11 Z " fill="#455565"/></g></svg>
            <p>COMPANY DETAILS</p>
            @if($contact_details)
                <img src="{{ asset('img/check.svg')}}"/>
            @endif
        </div>
        <div class="clear"></div>

        <div class="item {{$contact_details?'active':''}}">
            <div class="left_bar"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" version="1.1" fill="#455565"><g id="surface1" fill="#455565"><path style=" " d="M 2.5 2 C 1.675781 2 1 2.675781 1 3.5 L 1 11.5 C 1 12.324219 1.675781 13 2.5 13 L 13.5 13 C 14.324219 13 15 12.324219 15 11.5 L 15 3.5 C 15 2.675781 14.324219 2 13.5 2 Z M 2.5 3 L 13.5 3 C 13.78125 3 14 3.21875 14 3.5 L 14 11.5 C 14 11.78125 13.78125 12 13.5 12 L 12 12 C 12 11.449219 11.550781 11 11 11 C 10.449219 11 10 11.449219 10 12 L 6 12 C 6 11.449219 5.550781 11 5 11 C 4.449219 11 4 11.449219 4 12 L 2.5 12 C 2.21875 12 2 11.78125 2 11.5 L 2 3.5 C 2 3.21875 2.21875 3 2.5 3 Z M 6 4 C 4.902344 4 4 4.902344 4 6 C 4 6.535156 4.21875 7.023438 4.5625 7.382813 C 3.636719 7.894531 3 8.871094 3 10 L 4 10 C 4 8.890625 4.890625 8 6 8 C 7.109375 8 8 8.890625 8 10 L 9 10 C 9 8.871094 8.363281 7.894531 7.4375 7.382813 C 7.78125 7.023438 8 6.535156 8 6 C 8 4.902344 7.097656 4 6 4 Z M 6 5 C 6.558594 5 7 5.441406 7 6 C 7 6.558594 6.558594 7 6 7 C 5.441406 7 5 6.558594 5 6 C 5 5.441406 5.441406 5 6 5 Z M 10 6 L 10 7 L 13 7 L 13 6 Z M 10 8 L 10 9 L 13 9 L 13 8 Z " fill="#455565"/></g></svg>

            <p>CONTACT DETAILS</p>
            @if($my_commitment)
                <img src="{{ asset('img/check.svg')}}"/>
            @endif
        </div>
        <div class="clear"></div>

        <div class="item {{$my_commitment?'active':''}}">
            <div class="left_bar"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" version="1.1" fill="#455565"><g id="surface1" fill="#455565"><path style=" " d="M 2.5 1 C 1.675781 1 1 1.675781 1 2.5 L 1 12.5 C 1 13.324219 1.675781 14 2.5 14 L 12.5 14 C 13.324219 14 14 13.324219 14 12.5 L 14 2.5 C 14 1.675781 13.324219 1 12.5 1 Z M 2.5 2 L 12.5 2 C 12.78125 2 13 2.21875 13 2.5 L 13 12.5 C 13 12.78125 12.78125 13 12.5 13 L 2.5 13 C 2.21875 13 2 12.78125 2 12.5 L 2 2.5 C 2 2.21875 2.21875 2 2.5 2 Z M 4 5 L 4 6 L 11 6 L 11 5 Z M 4 7 L 4 8 L 11 8 L 11 7 Z M 4 9 L 4 10 L 9 10 L 9 9 Z " fill="#455565"/></g></svg>
            <p>MY COMMITMENT</p>
            @if($submit_payment)
                <img src="{{ asset('img/check.svg')}}"/>
            @endif
            
        </div>
        <div class="clear"></div>

        <div class="item {{$submit_payment?'active':''}}">
            <div class="left_bar"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" version="1.1" fill="#455565"><g id="surface1" fill="#455565"><path style=" " d="M 2.5 3 C 1.675781 3 1 3.675781 1 4.5 L 1 9.5 C 1 10.324219 1.675781 11 2.5 11 L 13.5 11 C 14.324219 11 15 10.324219 15 9.5 L 15 4.5 C 15 3.675781 14.324219 3 13.5 3 Z M 3 4 L 13 4 C 13 4.546875 13.453125 5 14 5 L 14 9 C 13.453125 9 13 9.453125 13 10 L 3 10 C 3 9.453125 2.546875 9 2 9 L 2 5 C 2.546875 5 3 4.546875 3 4 Z M 8 5 C 6.902344 5 6 5.902344 6 7 C 6 8.097656 6.902344 9 8 9 C 9.097656 9 10 8.097656 10 7 C 10 5.902344 9.097656 5 8 5 Z M 4 6 C 3.449219 6 3 6.449219 3 7 C 3 7.550781 3.449219 8 4 8 C 4.550781 8 5 7.550781 5 7 C 5 6.449219 4.550781 6 4 6 Z M 8 6 C 8.558594 6 9 6.441406 9 7 C 9 7.558594 8.558594 8 8 8 C 7.441406 8 7 7.558594 7 7 C 7 6.441406 7.441406 6 8 6 Z M 12 6 C 11.449219 6 11 6.449219 11 7 C 11 7.550781 11.449219 8 12 8 C 12.550781 8 13 7.550781 13 7 C 13 6.449219 12.550781 6 12 6 Z M 2 12 C 2.207031 12.582031 2.757813 13 3.40625 13 L 4.476563 13 C 6.125 13 7.789063 13.128906 9.417969 13.378906 L 12.269531 13.816406 C 12.347656 13.828125 12.425781 13.835938 12.5 13.835938 C 12.855469 13.835938 13.203125 13.710938 13.476563 13.472656 C 13.808594 13.1875 14 12.773438 14 12.332031 L 14 12 L 12.875 12 C 12.367188 12 11.976563 12.324219 11.90625 12.75 L 9.570313 12.390625 C 7.890625 12.132813 6.175781 12 4.476563 12 Z " fill="#455565"/></g></svg>

            <p>PLEDGE AND PAYMENT</p>
            @if($submit_payment)
                <img src="{{ asset('img/submit_loading.svg')}}"/>
            @endif
        </div>
        <div class="clear"></div>

    </div>
</div>

<script>
var percent =  {!! json_encode($percent) !!};
if(percent<10)
    $("#progress_text").css('left', '27px');
var ctx = $("#progress_chart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [percent, 100 - percent],
      backgroundColor: [
        '#ffffff',
        '#949aa4'
      ],
      borderColor: [
        '#ffffff',
        '#949aa4'
      ],
      borderWidth: 1
    }]
  },
  options: {
   	cutoutPercentage: 90,
    responsive: false,
  }
});
$("#progress_text").html(percent + "<span class='percent'>%</span>");
</script>