<div class="title">
    <p style="float: left;">Let's calculate your target</p>
    <div>
        <label class="clear_result">CLEAR RESULTS</label>
    </div>
</div>
<div class="yellow_line"></div>
<div class="content">

    <div class="item" style="margin-bottom:3px;width:25%;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="total_anual_revenue_title">Total annual revenue</p>
        </div>
        <div class="clear"></div>
        <div class="calc_r_div total_anual_revenue">R</div>
        <input type="text" class="form-control total_anual_revenue" name="total_anual_revenue" id="total_anual_revenue"/>
        <input hidden type="text" class="total_anual_revenue_num" />
        <p class="warning_message total_anual_revenue" style="margin-bottom: 0px;">Total annual revenue is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;width:25%;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="average_npat_title">Average NPAT last 3 years</p>
        </div>
        <div class="clear"></div>
        <div class="calc_r_div average_npat">R</div>
        <input type="text" class="disabled form-control average_npat" name="average_npat" id="average_npat"/>
        <input hidden type="text" class="average_npat_num" />
        <p class="warning_message average_npat" style="margin-bottom: 0px;">Average NPAT last 3 years is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;width:25%;margin-left: 5%;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="total_headcount_title">Total headcount</p>
        </div>
        <div class="clear"></div>
        <input type="text" class="form-control total_headcount" name="total_headcount" id="total_headcount"/>
        <input hidden type="text" class="total_headcount_num" />
        <p class="warning_message total_headcount" style="margin-bottom: 0px;">Total headcount is required</p>
    </div>

    <div class="calculate_go inactive">GO</div>

</div>
