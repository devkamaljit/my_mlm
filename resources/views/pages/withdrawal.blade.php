<x-app-layout>
    <!-- Session Status -->
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Withdrawal') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> 
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-session-error class="mb-4" :error="session('error')" />
    <form method="POST" action="{{ route('withdrawal.withdraw') }}">
        @csrf

        <!-- Email Address -->
        <span>Wallet : {{$user->wallet->main_wallet}}</span>
         

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="Amount" :value="__('Enter Amount')" />

            <x-text-input id="amount" class="block mt-1 w-full"
                            type="text"
                            name="amount"
                            placeholder="Enter Amount"
                            required autocomplete="amount" />

            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        

        <div class="flex items-center justify-end mt-4">
             

            <x-primary-button class="ml-3">
                {{ __('Withdraw') }}
            </x-primary-button>
        
        </div>
    </form>
</div>
</div>
        </div>
        </div>
</x-app-layout>
