<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Harga</th>
            <th scope="col">Foto</th>
            <th scope="col">No Telfon</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jeniskelamin }}</td>
                <td>{{ $row->harga }}</td>
                <td>
                    <img src="{{ asset('fotoclossing/' . $row->foto) }}" style="width: 40px" alt="">
                </td>
                <td>{{ $row->notlp }}</td>
                <td>{{ $row->created_at->diffForHumans() }}</td>
                <td>
                    <a href="/deleteclossing/{{ $row->id }}"><button type="button"
                            class="btn btn-danger">Hapus</button></a>
                    <a href="/editclossing/{{ $row->id }}"><button type="button"
                            class="btn btn-primary">Edit</button></a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
