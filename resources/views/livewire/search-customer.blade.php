<div>
    <div class="px-4 space-y-4 mt-8">
        <form method="get">
            <input class="border-solid border border-gray-300 p-2 w-full md:w-1/4"
                   type="text" placeholder="Search Users" wire:model="term"/>
        </form>
        <div wire:loading>Searching users...</div>
        <div wire:loading.remove>
            <!--
                notice that $term is available as a public
                variable, even though it's not part of the
                data array
            -->
            @if ($term == "")
                <div class="text-gray-500 text-sm">
                    Enter a term to search for users.
                </div>
            @else
                @if($users->isEmpty())
                    <div class="text-gray-500 text-sm">
                        No matching result was found.
                    </div>
                @else
                    @foreach($users as $user)
                        <div>
                            <h3 class="text-lg text-gray-900 text-bold">{{$user->shipping_name}}</h3>
                            <p class="text-gray-500 text-sm">{{$user->email}}</p>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
    <div class="px-4 mt-4">
        {{$users->links()}}
    </div>
</div>