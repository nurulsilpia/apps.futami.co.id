<form action="{{route('test.store')}}" method="post">
    @csrf
    <table border="1">
        <tr>
            <td>input nama</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>input alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" ></td>
        </tr>
    </table>
</form>