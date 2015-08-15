<div id="flash-message">
    @if ($errors->has())
        <ul class="one">
            @foreach ($errors->all() as $error)
                <li class="message-item"> {{ $error }} </li>
            @endforeach
        </ul>
    @elseif(Session::has('message'))
        <ul class="one">
            <li class="message-item"> {{ Session::get('message') }} </li>
        </ul>
    @endif
        <ul class="two">
            <li class="message-item"> </li>
        </ul>
</div>