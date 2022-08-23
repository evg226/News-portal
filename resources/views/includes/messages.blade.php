@if(session()->has('error'))
    <x-alert type="danger" :text="session()->get('error')"></x-alert>
@endif

@if(session()->has('success'))
    <x-alert type="success" :text="session()->get('success')"></x-alert>
@endif

{{--@if($errors->any())--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        <x-alert type="danger" :text="$error"></x-alert>--}}
{{--    @endforeach--}}
{{--@endif--}}
