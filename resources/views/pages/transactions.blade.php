<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-hover">
                        <tr>
                             
                            <th>Username</th>
                            <th>Amount</th>
                            <th>Tx Type</th>
                            <th>Debit/Credit</th>
                            <th> Date</th>
                        </tr>
                        @if ($transactions)
                            @foreach ($transactions as $item)
                            <tr>
                                
                                <th>{{$item->user->username}}</th>
                                <th>{{$item->amount}}</th>
                                <th>{{$item->tx_type}}</th>
                                <th>{{$item->type}}</th>
                                <th>{{$item->created_at}}</th>
                                
                            </tr>
                            @endforeach
                        @endif
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
