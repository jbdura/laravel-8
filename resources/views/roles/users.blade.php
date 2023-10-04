@props(['role_name', 'users'])
<section>

<h1>
    Showing Users for: {{ $role_name }}
</h1>
@foreach ($users as $user)
    <p>{{ $user->name }}</p>
@endforeach

</section>