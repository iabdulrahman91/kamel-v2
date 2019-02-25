<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        {{$name}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
        @foreach($items as $item)
            <button class="dropdown-item" type="button">{{$item}}</button>
        @endforeach

    </div>
</div>
