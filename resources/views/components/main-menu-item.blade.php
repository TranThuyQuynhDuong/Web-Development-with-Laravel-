@if (count($listmenu)==0)
<li><a href="{{ $menu_item->link }}" >{{ $menu_item->name }}</a></li>
@else
<li class="dropdown"><a href="{{ $menu_item->link }}">{{ $menu_item->name }}<i class="fa fa-angle-down"></i></a>
    <ul role="menu" class="sub-menu">
        @foreach ($listmenu as $item)
        <li><a href="{{ $item->link }}">{{ $item->name }}</a></li>
        @endforeach
    </ul>
</li> 
@endif

