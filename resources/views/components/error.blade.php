@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="error notification notification-error relative top-right" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)"  :class="{'active' : show, '' : show }" >{{ $error }}</p>
    @endforeach
@endif