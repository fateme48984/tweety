<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse(Auth()->user()->follows as $follow)
        <li class="mb-4">
                <a class="flex items-center text-sm block" href="{{ route('profile.show',$follow) }}">
                    <img src="{{$follow->avatar}}"
                         alt=""
                        class="rounded-full mr-4"
                         style="width:40px;height:40px"
                    />
                    {{$follow->name}}
                </a>
        </li>
    @empty
        <li class="mb-4">
            No friends yet!
        </li>
    @endforelse
</ul>
