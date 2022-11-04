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
    @forelse ($memberActive as $item)
        <tr>
            <td>{{ $cPA++ }}</td>
            <td><img src="{{ asset('/storage') }}/{{ $item->profile_img }}" alt="{{ $item->name }} - Foto Profil">
            </td>
            <td>{{ $item->name }}</td>
            <td>
                <button type="button" class="badge bg-info border-0"
                    onclick="detailMember('{{ $item->acc_code }}')">Detail</button>
                |
                <button type="button" class="badge bg-warning border-0"
                    onclick="editMember('{{ $item->acc_code }}')">Edit</button>
                |
                <button type="button" class="badge bg-danger border-0"
                    onclick="deleteMember('{{ $item->acc_code }}', {{ $item->id }})">Hapus</button>
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
