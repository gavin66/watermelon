@if ($paginator->lastPage() > 1)
    <nav>
        <ul class="pagination pagination-sm">
            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                @if( $paginator->currentPage() == 1 )
                    <span aria-hidden="true">&laquo;</span>
                @else
                    <a href="{{ $paginator->appends($paginator_params)->url($paginator->currentPage()-1) }}" aria-label="Previous">&laquo;</a>
                @endif
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->appends($paginator_params)->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                @if( $paginator->currentPage() == $paginator->lastPage() )
                    <span aria-hidden="true">&raquo;</span>
                @else
                    <a href="{{ $paginator->appends($paginator_params)->url($paginator->currentPage()+1) }}" aria-label="Next">&raquo;</a>
                @endif
            </li>
        </ul>
    </nav>
@endif