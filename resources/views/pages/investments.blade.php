<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Investments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-filters  />
                    <table class="table table-hover">
                        <tr>
                             
                            <th>Amount</th>
                            <th>Join Date</th>
                        </tr>
                        @if ($investments)
                            @foreach ($investments as $item)
                            <tr>
                                
                                <th>{{$item->amount}}</th>
                                <th>{{$item->created_at}}</th>
                                
                            </tr>
                            @endforeach
                        @endif
                        
                    </table>
                    <div>{{$investments->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
