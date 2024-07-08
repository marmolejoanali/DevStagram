<div>

{{-- @php
dd($posts)
@endphp --}}
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grind-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div>
            <a href="{{route('posts.show',['user'=>$post->user,'post'=>$post])}}">
                <img src="{{ asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{ $post->titulo}}">
            </a>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold"> No hay posts</p>
    @endif
    <div class="my-5">
        {{$posts->links()}}
    </div>
    {{--  @if ($posts->count())

    <div class="grid md:grid-cols-2 lg:grind-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div>
            <a href="{{route('posts.show',['user'=>$post->user,'post'=>$post])}}">
                <img src="{{ asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{ $post->titulo}}">
            </a>
        </div>
        @endforeach
    </div>

    <div class="my-5">
        {{$posts->links()}}
    </div>
  @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold"> No hay posts, sigue a alguien para ver posts</p>
    @endif  --}}


</div>
