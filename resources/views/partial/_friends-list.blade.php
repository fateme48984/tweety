<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @foreach(range(0,8) as $index)
    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img src="https://i.pravatar.cc/40"
                 alt=""
                class="rounded-full mr-4"
            />
            Jhon Doe
        </div>
    </li>
    @endforeach
</ul>
