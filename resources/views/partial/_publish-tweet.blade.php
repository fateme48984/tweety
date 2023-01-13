<form method="post" action="{{ route('tweets.store') }}">
    @csrf
                <textarea name="body"
                          class="w-full outline-none"
                          placeholder="What's up docs?"
                ></textarea>
    <hr class="mb-2">
    <footer class="flex justify-between">
        <img src="{{auth()->user()->avatar}}"
             alt=""
             class="rounded-full mr-4"
             style="width:50px; height:50px"
        />
        <button type="submit" class="bg-blue-500 rounded-lg shadow p-2 text-white" >Tweet-a-root!</button>

    </footer>
</form>
@error('body')
<div class="text-red-500 text-sm mt-2 text-bold">{{$message}}</div>
@enderror
