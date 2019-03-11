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
    <div class="process_chart" style="display:flex;">
        <div id="youth_placed">
            <canvas width="50" height="50"></canvas>
            <p>OF 1,224 YOUTH PLACED</p>
            <p class="chart_text"></p>
        </div>
        <div id="month_remain">
            <canvas width="50" height="50"></canvas>
            <p>MONTHS REMAINING</p>
            <p class="chart_text"></p>
        </div>
    </div>
    <div class="menu">
        <div class="item active">
            <div class="left_bar" style="margin-right: 0px;"></div>
            <svg style="width:34px; height: 34px; margin-top: 0px" width="34px" height="34px" viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path d="M17.339844,10 L10,16.8125 L10.679688,17.546875 L11.339844,16.933593 L11.339844,22.679687 L16.339844,22.679687 L16.339844,17.679687 L18.339844,17.679687 L18.339844,22.679687 L23.339844,22.679687 L23.339844,16.933593 L24,17.546875 L24.679688,16.8125 L17.339844,10 Z M17.339844,11.359375 L22.339844,16.007812 L22.339844,21.679687 L19.339844,21.679687 L19.339844,16.679687 L15.339844,16.679687 L15.339844,21.679687 L12.339844,21.679687 L12.339844,16.007812 L17.339844,11.359375 Z" id="path-home"></path>
                </defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <mask fill="white">
                        <use xlink:href="#path-1"></use>
                    </mask>
                    <use fill="#9aa8af" fill-rule="nonzero" xlink:href="#path-home"></use>
                </g>
            </svg>
            <p>HOME</p>
        </div>
        <div class="clear"></div>

        <div class="item">
            <div class="left_bar" style="margin-right: 0px;"></div>
            <svg style="width:34px; height: 34px; margin-top: 0px" width="34px" height="34px" viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path d="M17,12 C15.347656,12 14,13.347656 14,15 C14,16.652344 15.347656,18 17,18 C18.652344,18 20,16.652344 20,15 C20,13.347656 18.652344,12 17,12 Z M17,18 C14.246094,18 12,20.246094 12,23 L13,23 C13,20.785156 14.785156,19 17,19 C19.214844,19 21,20.785156 21,23 L22,23 C22,20.246094 19.753906,18 17,18 Z M17,13 C18.109375,13 19,13.890625 19,15 C19,16.109375 18.109375,17 17,17 C15.890625,17 15,16.109375 15,15 C15,13.890625 15.890625,13 17,13 Z" id="path-user"></path>
                </defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <use fill="#9aa8af" fill-rule="nonzero" xlink:href="#path-user"></use>
                </g>
            </svg>

            <p><a href="{{url('/youth_uploader')}}">MY YOUTH</a></p>
            
        </div>
        <div class="clear"></div>

        <div class="item">
            <div class="left_bar" style="margin-right: 0px;"></div>
            
            <svg style="width:34px; height: 34px; margin-top: 0px" width="34px" height="34px" viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path d="M15.570313,10 L15.328125,11.289063 C14.398438,11.5625 13.570313,12.046875 12.890625,12.695313 L11.652344,12.261719 L10.222656,14.738281 L11.210938,15.585938 C11.097656,16.042969 11,16.507813 11,17 C11,17.492188 11.097656,17.957031 11.210938,18.414063 L10.222656,19.261719 L11.652344,21.738281 L12.886719,21.300781 C13.570313,21.957031 14.398438,22.4375 15.328125,22.714844 L15.570313,24 L18.429688,24 L18.671875,22.714844 C19.601563,22.4375 20.429688,21.953125 21.109375,21.300781 L22.34375,21.738281 L23.777344,19.261719 L22.785156,18.414063 C22.898438,17.957031 23,17.492188 23,17 C23,16.507813 22.902344,16.042969 22.789063,15.585938 L23.777344,14.738281 L22.347656,12.261719 L21.113281,12.695313 C20.429688,12.042969 19.601563,11.5625 18.671875,11.289063 L18.429688,10 L15.570313,10 Z M16.398438,11 L17.601563,11 L17.796875,12.054688 L18.117188,12.132813 C19.109375,12.359375 19.984375,12.878906 20.65625,13.597656 L20.878906,13.835938 L21.894531,13.480469 L22.496094,14.519531 L21.683594,15.21875 L21.78125,15.53125 C21.921875,15.992188 22,16.488281 22,17 C22,17.511719 21.921875,18.003906 21.78125,18.46875 L21.683594,18.78125 L22.496094,19.480469 L21.894531,20.519531 L20.878906,20.160156 L20.65625,20.402344 C19.984375,21.121094 19.109375,21.640625 18.117188,21.871094 L17.796875,21.941406 L17.601563,23 L16.398438,23 L16.203125,21.941406 L15.882813,21.871094 C14.890625,21.640625 14.015625,21.121094 13.34375,20.402344 L13.117188,20.160156 L12.101563,20.519531 L11.503906,19.480469 L12.316406,18.78125 L12.21875,18.46875 C12.078125,18.007813 12,17.511719 12,17 C12,16.488281 12.078125,15.992188 12.21875,15.53125 L12.316406,15.21875 L11.503906,14.519531 L12.101563,13.480469 L13.121094,13.835938 L13.34375,13.597656 C14.015625,12.878906 14.890625,12.359375 15.882813,12.132813 L16.203125,12.054688 L16.398438,11 Z M17,14 C15.347656,14 14,15.347656 14,17 C14,18.652344 15.347656,20 17,20 C18.652344,20 20,18.652344 20,17 C20,15.347656 18.652344,14 17,14 Z M17,15 C18.109375,15 19,15.890625 19,17 C19,18.109375 18.109375,19 17,19 C15.890625,19 15,18.109375 15,17 C15,15.890625 15.890625,15 17,15 Z" id="path-setting"></path>
                </defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <mask id="mask-2" fill="white">
                        <use xlink:href="#path-setting"></use>
                    </mask>
                    <use fill="#9aa8af" fill-rule="nonzero" xlink:href="#path-setting"></use>
                </g>
            </svg>
            <p>SETTINGS</p>
        </div>
        <div class="clear"></div>
    </div>
</div>

<script>
var youth_placed_num =  {!! $youth_placed !!};
$("#youth_placed .chart_text").html(youth_placed_num);

var total_placed_num = 1224;

var month_remain_num = {!! $month_remain !!};
$("#month_remain .chart_text").html(month_remain_num);

Chart.defaults.RoundedDoughnut = Chart.helpers.clone(Chart.defaults.doughnut);
Chart.controllers.RoundedDoughnut = Chart.controllers.doughnut.extend({
    draw: function (ease) {
            var ctx = this.chart.chart.ctx;
        
        var easingDecimal = ease || 1;
        Chart.helpers.each(this.getDataset().metaData, function (arc, index) {
            arc.transition(easingDecimal).draw();

            var vm = arc._view;
            var radius = (vm.outerRadius + vm.innerRadius) / 2;
            var thickness = (vm.outerRadius - vm.innerRadius) / 2;
            var angle = Math.PI - vm.endAngle - Math.PI / 2;
            
            ctx.save();
            ctx.fillStyle = vm.backgroundColor;
            ctx.translate(vm.x, vm.y);
            ctx.beginPath();
            ctx.arc(radius * Math.sin(angle), radius * Math.cos(angle), thickness, 0, 2 * Math.PI);
            ctx.arc(radius * Math.sin(Math.PI), radius * Math.cos(Math.PI), thickness, 0, 2 * Math.PI);
            ctx.closePath();
            ctx.fill();
            ctx.restore();
        });
    },
});

var deliveredOpt = {
    cutoutPercentage: 85,
    responsive: false,
    maintainAspectRatio: false,
    animation: {
        animationRotate: true,
        duration: 2000
    },
    legend: {
        display: false
    },
    tooltips: {
        enabled: false
    }
};

var youth_placed = $("#youth_placed canvas");
var youth_placed_chart = new Chart(youth_placed, {
  type: 'pie',
  data: {
    datasets: [{
      data: [youth_placed_num, total_placed_num - youth_placed_num],
      backgroundColor: [
        '#f6a723',
        '#545d6d'        
      ],
      borderColor: [
        '#f6a723',
        '#545d6d'        
      ],
      borderWidth: 1
    }]
  },
  options: deliveredOpt
});

var month_remain = $("#month_remain canvas");
var month_remain_chart = new Chart(month_remain, {
  type: 'pie',
  data: {
    datasets: [{
      data: [month_remain_num, 12 - month_remain_num],
      backgroundColor: [
        '#f6a723',
        '#545d6d'        
      ],
      borderColor: [
        '#f6a723',
        '#545d6d'        
      ],
      borderWidth: 1
    }]
  },
  options: deliveredOpt
});
</script>