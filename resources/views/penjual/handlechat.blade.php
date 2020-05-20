<table class="table table-striped" id="asd">
    <thead>
        <tr>
            <th>Pesan</th>
            <th>Tanggal</th>

        </tr>
    </thead>
    <tbody>

        @foreach($pesans as $pesan)
        <tr>

            <td>
                <p style="font-weight:bold;">{{$pesan['nama_pembeli']}}</p>{{$pesan['chat']}}
            </td>
            <td>{{$pesan['tanggal']}}</td>
        </tr>
        @endforeach
</table>