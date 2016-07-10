@if( isset($size) && $size == 'small')
    <a href="{{ route('articles_list',[ $key => $item ]) }}" class="tag-piece-sm {{ getTagClass($item) }}">{{ $item }}</a>
@elseif(isset($size) && $size == 'normal')
    <a href="{{ route('articles_list',[ $key => $item ]) }}" class="tag-piece {{ getTagClass($item) }}">{{ $item }}</a>
@else
    <a href="{{ route('articles_list',[ $key => $item ]) }}" class="tag-piece {{ getTagClass($item) }}">{{ $item }}</a>
@endif