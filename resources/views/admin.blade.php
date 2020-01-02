@extends('layouts.app')

@section('content')

@if (isset($users))
        
    <table border="1" class="center mt-4">
        <tr>
            <th style="width:60px;text-align:center;">No.</th>
            <th style="width:130px;text-align:center;">Name</th>
            <th style="width:100px;text-align:center;">Role</th>
            <th style="width:250px;text-align:center;">E-mail</th>
        </tr>
        @foreach ($users as $user)

        <tr>
            <th style="width:60px;text-align:center;">{{ $loop->iteration }}</th>
            <th style="width:130px;text-align:center;font-size:16px">&nbsp;{{ $user->name }}</th>
            <th style="width:100px;text-align:center;font-size:16px">&nbsp;{{ $user->roles }}</th>
            <th style="width:250px;text-align:center;font-size:16px">&nbsp;{{ $user->email }}</th>
            @if ($user->roles == 'normal')

            <th style="width:120px;text-align:center;">&nbsp;<a href="/admin/role/{{ $user->id }}/upgrade" class="active">upgrade</th>
            @elseif ($user->roles == 'admin')

            <th style="width:120px;text-align:center;">&nbsp;<a href="/admin/role/{{ $user->id }}/downgrade" class="active">downgrade</th>
            @endif

        </tr>
        @endforeach

    </table>
    @endif

@endsection
