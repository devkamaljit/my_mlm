<x-app-layout>
    <!-- Session Status -->
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Topup') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> 
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-session-error class="mb-4" :error="session('error')" />
    <form method="POST" action="{{ route('investment.topup') }}">
        @csrf

        <!-- Email Address -->
        <span>Wallet : {{$user->wallet->fund_wallet}}</span>
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="Package" :value="__('Select Package')" />

            <x-text-input id="package" class="block mt-1 w-full"
                            type="text"
                            name="package"
                            required autocomplete="package" />

            <x-input-error :messages="$errors->get('package')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        

        <div class="flex items-center justify-end mt-4">
             

            <x-primary-button class="ml-3">
                {{ __('TopUp') }}
            </x-primary-button>
        
        </div>
    </form>
</div>
</div>
        </div>
        </div>
</x-app-layout>
