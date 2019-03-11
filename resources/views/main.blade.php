@isset($user['payment_approved'])
    @if($user['payment_approved'] == 0)
        @include('my_commitment')
    @elseif($user['payment_approved'] == 1)
        @include('home_page_layouts.placement_stats')
    @endif
@endisset