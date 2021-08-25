<table border="1">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>alamat</th>
    </tr>
    
    
    @foreach ($tampil as $no => $data_test)

    <tr>
        <td>1</td>
        <td>{{$data_test->name}}</td>
        <td>{{$data_test->alamat}}</td>
    <tr>
    @endforeach
</table>