@foreach ($edit as $no => $data_test)
<form action="{{route('test.update',$data_test->id)}}" method="POST">
    @method('PUT')
    <table border="1">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>alamat</th>
        <th>action</th>
    </tr>
    <tr>
        <td>1</td>
        <td><input type="text" name="name" value="{{$data_test->name}}"></td>
        <td><input type="text" name="alamat" value="{{$data_test->alamat}}"></td>
        @csrf
        <td><input type="submit" value="submit"></td>
    <tr>
    </table>
</form>
@endforeach
