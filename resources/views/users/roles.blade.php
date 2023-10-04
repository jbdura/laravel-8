@props(['user'])
<section>

    <h1>
        Showing Roles for: {{ $user->name }}
    </h1>

    @foreach ($user->roles as $role)
        <p>{{ $role->name }}</p>
    @endforeach

</section>