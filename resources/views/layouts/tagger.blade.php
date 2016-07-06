@if( isset($size) && $size == 'small')
    <a href="" class="tag-piece-sm {{ getTagClass($tag) }}">{{ $tag }}</a>
@elseif(isset($size) && $size == 'normal')
    <a href="" class="tag-piece {{ getTagClass($tag) }}">{{ $tag }}</a>
@else
    <a href="" class="tag-piece {{ getTagClass($tag) }}">{{ $tag }}</a>
@endif