@if (session()->has('flash_success'))
<div class="mt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('flash_success') }}</span>
        </div>
    </div>
</div>
@endif

@if (session()->has('flash_warning'))
<div class="mt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('flash_warning') }}</span>
        </div>
    </div>
</div>
@endif

@if (session()->has('flash_danger'))
<div class="mt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('flash_danger') }}</span>
        </div>
    </div>
</div>
@endif

@if (session()->has('flash_info'))
<div class="mt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('flash_info') }}</span>
        </div>
    </div>
</div>
@endif
