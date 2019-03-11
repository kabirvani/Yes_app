@extends('layouts.home_page_layout')
    
@section('content')
<div id="placement_stats">
    <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email"/>
    <div class="placement_stats">
        <p class="title">Youth Placement Stats</p>
        <div class="stats_chart">
            <canvas height="194" width="1104" id="stats_chart"></canvas>
        </div>
    </div>
    <div class="placement_orders">
        <p class="title">Youth Placement Orders</p>
        <div class="orders_table">
            <table>
                <thead>
                    <tr>
                        <td style="width: 70px;" class="center">
                            <div class="oval grey"></div>
                        </td>
                        <td class="left" style="width: 228px;">PLACEMENT TYPE</td>
                        <td class="left" style="width: 155px;">DATE</td>
                        <td class="center" style="width: 166px;">STATUS</td>
                        <td class="center" style="width: 160px;">YOUTH</td>
                        <td class="right" style="width: 122px;">TOTAL</td>
                        <td class="center" style="">ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user['result'] as $result)
                        @if($result->exp_type == 1)
                            <tr>
                                <td class="center">
                                    <div class="oval green"></div>
                                </td>
                                <td class="left">In-House</td>
                                <td class="left">{{date('j M Y', strtotime($result->created_at))}}</td>
                                <td class="center">
                                    @if($result->checkout_status == 0)
                                        <div class="status not_paid">
                                            not paid
                                        </div>
                                    @elseif($result->checkout_status == 1)
                                        <div class="status paid">
                                            paid
                                        </div>
                                    @endif
                                </td>
                                <td class="center">{{$result->youth_num}}</td>
                                <td class="right">R{{number_format($result->excluding_vat)}}</td>
                                <td class="center">ACTIONS</td>
                            </tr>
                        @elseif($result->exp_type == 2)
                            <tr>
                                <td class="center">
                                    <div class="oval blue"></div>
                                </td>
                                <td class="left">In-House Assisted</td>
                                <td class="left">{{date('j M Y', strtotime($result->created_at))}}</td>
                                <td class="center">
                                    @if($result->checkout_status == 0)
                                        <div class="status not_paid">
                                            not paid
                                        </div>
                                    @elseif($result->checkout_status == 1)
                                        <div class="status paid">
                                            paid
                                        </div>
                                    @endif
                                </td>
                                <td class="center">{{$result->youth_num}}</td>
                                <td class="right">R{{number_format($result->excluding_vat)}}</td>
                                <td class="center">ACTIONS</td>
                            </tr>
                        @elseif($result->exp_type == 3)
                            <tr>
                                <td class="center">
                                    <div class="oval pink"></div>
                                </td>
                                <td class="left">Boost A Business</td>
                                <td class="left">{{date('j M Y', strtotime($result->created_at))}}</td>
                                <td class="center">
                                    @if($result->checkout_status == 0)
                                        <div class="status not_paid">
                                            not paid
                                        </div>
                                    @elseif($result->checkout_status == 1)
                                        <div class="status paid">
                                            paid
                                        </div>
                                    @endif</td>
                                <td class="center">{{$result->youth_num}}</td>
                                <td class="right">R{{number_format($result->excluding_vat)}}</td>
                                <td class="center">ACTIONS</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="new_work_exp btn btn-primary">
        <a>NEW WORK EXPERIENCE</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function randomScalingFactor(){
        return Math.random();
    }
    var chart_info = {!! $user['chart_info'] !!};

    var not_paid = [0,0,0,0,0,0,0,0,0,0,0,0,0];
    var in_house = [0,0,0,0,0,0,0,0,0,0,0,0,0];
    var in_house_assisted = [0,0,0,0,0,0,0,0,0,0,0,0,0];
    var boost_business = [0,0,0,0,0,0,0,0,0,0,0,0,0];
    for(var i = 0; i < chart_info.length; i++)
    {
        var index = chart_info[i]['month'];
        index = parseInt(index) - 1;
        
        if(chart_info[i]['checkout_status'] == 0)
            not_paid[index] = parseInt(not_paid[index]) + parseInt(chart_info[i]['sum']);
        else{
            if(chart_info[i]['exp_type'] == 1)
                in_house[index] = chart_info[i]['sum'];

            else if(chart_info[i]['exp_type'] == 2)
                in_house_assisted[index] = chart_info[i]['sum'];

            else if(chart_info[i]['exp_type'] == 3)
                boost_business[index] = chart_info[i]['sum'];
        }
    }
    
    var barChartData = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AUG','SEP','OCT','NOV','DEC'],
        datasets: [{
            label: 'Not paid',
            backgroundColor: "#9ca8ae",
            data: not_paid,
        }, {
            label: 'In-House',
            backgroundColor: "#c3d836",
            data: in_house
        }, {
            label: 'In-House Assisted',
            backgroundColor: "#03badd",
            data: in_house_assisted
        }, {
            label: 'Boost A Businesss',
            backgroundColor: "#f15b67",
            data: boost_business
        }]

    };
    function drawCanvas(){
        var ctx = document.getElementById('stats_chart').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                        stacked: true,
                    }],
                    yAxes: [{                            
                        stacked: true
                    }]
                }
            }
        });
    }
    $(document).ready(function(){
        drawCanvas();
        $(window).resize(function(){
            drawCanvas();
        })
        
        $.ajax({
            url: '/test',
            type: 'GET',
            success: function(res){
                
                console.log("result" + JSON.stringify(res,null,2));
            }
        })
    })
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection