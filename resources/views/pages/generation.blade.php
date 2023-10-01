<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generation Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <x-filters  />
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Join Date</th>
                        </tr>
                        @if ($team)
                            @foreach ($team as $item)
                            <tr>
                                <th>{{$item->name}}</th>
                                <th>{{$item->username}}</th>
                                <th>{{$item->created_at}}</th>
                                
                            </tr>
                            @endforeach
                        @endif
                        
                    </table>
                    <br>
                    <div>{{$team->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
