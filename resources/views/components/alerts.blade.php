@if(session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)" 
        class="absolute top-6 right-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md z-50 transition-all duration-500"
    >
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)" 
        class="absolute top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md z-50 transition-all duration-500"
    >
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)" 
        class="absolute top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md z-50 transition-all duration-500"
    >
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
