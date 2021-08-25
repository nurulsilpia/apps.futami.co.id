<a href="{{route('test.create')}}">Tambah Data</a><br>
<table border="1">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>alamat</th>
        <th>action</th>
    </tr>
    @foreach ($data_test as $no => $data_test)
    <tr>
        <td>{{$no + 1}}</td>
        <td>{{$data_test->name}}</td>
        <td>{{$data_test->alamat}}</td>
        <td><a href="{{route('test.show',$data_test->id)}}">Show</a> | <a href="{{route('test.edit',$data_test->id)}}">Edit</a> 
        <form action="{{ route('test.destroy',$data_test->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" >Delete</button>
        </form>
    </td>
    <tr>
    @endforeach
</table>