<thead>
    <tr>
        <td>No</td>
        <td>Foto Profil</td>
        <td>Nama</td>
        <td>Aksi</td>
    </tr>
</thead>
<tbody>
    @php
        $cPA = 1;
    @endphp
    @forelse ($pengurusActive as $item)
        <tr>
            <td>{{ $cPA++ }}</td>
            <td><img src="{{ asset('/storage') }}/{{ $item->profile_img }}" alt="{{ $item->name }} - Foto Profil">
            </td>
            <td>{{ $item->name }}</td>
            <td>
                <button type="button" class="badge bg-info border-0"
                    onclick="detailPengurus('{{ $item->acc_code }}')">Detail</button>
                |
                <button type="button" class="badge bg-warning border-0"
                    onclick="editPengurus('{{ $item->acc_code }}')">Edit</button>
                |
                <button type="button" class="badge bg-danger border-0"
                    onclick="deletePengurus('{{ $item->acc_code }}', {{ $item->id }})">Hapus</button>
            </td>
        </tr>
    @empty
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    @endforelse
</tbody>
