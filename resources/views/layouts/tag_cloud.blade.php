@foreach(getTagCountData() as $tag=>$num)
    @if($num <= 3 )
        <li><a href="javascript:void(0)" class="tag-1">{{ $tag }}</a></li>
    @elseif($num > 3 && $num <= 6)
        <li><a href="javascript:void(0)" class="tag-2">{{ $tag }}</a></li>
    @elseif($num > 6 && $num <= 9)
        <li><a href="javascript:void(0)" class="tag-3">{{ $tag }}</a></li>
    @elseif($num > 9 && $num <= 12)
        <li><a href="javascript:void(0)" class="tag-4">{{ $tag }}</a></li>
    @elseif($num > 12 && $num <= 15)
        <li><a href="javascript:void(0)" class="tag-5">{{ $tag }}</a></li>
    @elseif($num > 15 && $num <= 18)
        <li><a href="javascript:void(0)" class="tag-6">{{ $tag }}</a></li>
    @elseif($num > 18 )
        <li><a href="javascript:void(0)" class="tag-7">{{ $tag }}</a></li>
    @endif
@endforeach