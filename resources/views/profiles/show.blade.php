<x-app>
    <div class="lg:flex-1 lg:mx-10" style="max-width: 900px;">
        <header class="mb-6 relative">
            <div class="relative">
                <img src="{{$user->background}}"
                     alt=""
                     class="mb-2"
                     style="width:820px;height:261px;"

                />
                <img src="{{$user->avatar}}"
                     alt=""
                     class="rounded-full absolute bottom-0"
                     with="150"
                     height="150"
                     style="left:50%; transform: translateX(-50%) translateY(36%);width:150px;height:150px;"
                />
            </div>

            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="font-bold text-2xl">{{$user->username}}</h2>
                    <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
                </div>
                    <div class="flex">
                        @can('update',$user)
                        <form method="get" action="/profile/{{$user->username}}/edit">
                            @csrf
                            <button type="submit"
                                    class="text-sm rounded-full border border-gray-400 mr-2 py-2 px-4 text-black" >
                                Edit Profile
                            </button>

                        </form>
                        @endcan
                        @if($user != auth()->user())
                       <x-follow-button :user="$user"></x-follow-button>
                        @endif
                    </div>
            </div>

            <p class="text-sm mt-5">
                {{$user->description}}
            </p>
        </header>
        <div class="border border-gray-300 rounded-3xl">
            @include('partial._timeline',['tweets' => $tweets])
        </div>
    </div>
</x-app>
