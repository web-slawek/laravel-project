@for ($i = 0; $i < sizeOf($lista); $i++)
    <div class="item @if($i ==0) active @endif">
        <img src="uploads/{{ $lista[$i]->image }}" alt="{{ $lista[$i]->title }}">
        <div class="carousel-caption">
            <h3>{{ $lista[$i]->title }}</h3>
            <p>{{ $lista[$i]->subtitle }}</p>
        </div>
    </div>
@endfor