<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script>
    function handleClickLogout(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>
