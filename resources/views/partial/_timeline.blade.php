@forelse($tweets as $tweet)
    <div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-300 '}}">
        <div class="mr-4 flex-shrink-0">
            <a href="{{ route('profile.show',$tweet->user) }}">
                <img src="{{$user->avatar}}"
                     alt=""
                     class="rounded-full mr-2"
                     style="width:50px; height:50px"
                />
            </a>
        </div>
        <div class="">
            <h5 class="font-bold mb-4">
                <a href="{{ route('profile.show',$tweet->user) }}">
                    {{$tweet->user->username}}
                </a>
            </h5>
            <p class="text-sm">
                {{$tweet->body}}
            </p>
            @auth
                <x-like-buttons :tweet="$tweet" />
            @endauth
        </div>
    </div>
@empty
    <div class="flex p-4">
        No tweets yet!
    </div>
@endforelse


