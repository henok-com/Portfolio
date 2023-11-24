@if(session()->has('success'))
        <p class="success notification notification-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" :class="{'active' : show, '' : show }" >{{ session('success') }}</p>
@endif