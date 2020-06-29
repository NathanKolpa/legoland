@extends('admin.layout')

@section('content')
    <div class="home">
        <h1>Admin klanten</h1>

        <table style="width:100%; text-align: center">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <form method="POST" action="/admin/users/{{ $user->id  }}">
                        @csrf()
                        <td>#{{ $user->id  }}</td>
                        <td><input type="text" name="name" value="{{ $user->name }}"></td>
                        <td><input type="email" name="email" value="{{ $user->email }}"></td>
                        <td>
                            <select name="is_admin">
                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Klant</option>
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                            </select>
                        </td>

                        <td>
                            <button type="submit" name="_method" value="PUT">Wijzig</button>
                            @if(auth()->user()->id != $user->id)
                                <button type="submit" name="_method" value="DELETE">Verwijder</button>
                            @else
                                <button disabled>Verwijder</button>
                            @endif
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
