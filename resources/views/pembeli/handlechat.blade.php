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

<td>{{$pesan['nama_pembeli']}}<br>{{$pesan['chat']}}
</td>
<td>{{$pesan['tanggal']}}</td>
@endforeach
</table>