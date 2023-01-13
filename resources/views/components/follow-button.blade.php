@auth
<form method="post" action="{{route('user.follow',$user)}}">
    @csrf
    <button type="submit"
            class="text-sm bg-blue-400 rounded-full shadow py-2 px-4 text-white" >
        {{ auth()->user()->isFollowing($user) ? 'Unfollow Me' : 'Follow me' }}
    </button>
</form>
@endauth
