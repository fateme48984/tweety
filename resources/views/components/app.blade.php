<x-master>
    <section class="px-12">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                <div class="lg:w-32">
                    @auth
                        @include('partial._sidebar-links')
                    @endauth
                </div>

                <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 900px;">
                    {{$slot}}
                </div>

                <div class="lg:w-1/6">
                    @auth
                        <div class="bg-blue-100 p-4 rounded-3xl">
                            @include('partial._followins-list')
                        </div>
                    @endauth
                </div>

            </div>
        </main>
    </section>
</x-master>
