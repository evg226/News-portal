<h1 class="mb-3">{{$title}}</h1>

@if (count($breadcrumbs)>1)
    <nav>
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $link=>$name)
                <li class="breadcrumb-item">
                    @if($link!==array_key_last($breadcrumbs))
                        <a href="{{route($link)}}">{{$name}}</a>
                    @else
                        <span>{{$name}}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif

