@extends('layouts.main')

@section('content')
    <table>
        <tr>
            <th>Pangkat</th>
            <th>Golongan</th>
        </tr>
        @foreach ($data as $key=>$value)
            <tr>
                <td>{{ $value->pangkat }}</td>
                <td>{{ $value->golongan }}</td>
            </tr> 
        @endforeach
    </table>
@endsection