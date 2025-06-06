<table width="100%" style="margin-top: 50px;">
    <tr>
        <td width="60%"></td>
        <td width="40%" style="text-align: center;">
            {{-- QR Code bisa ditambahkan di sini --}}
            <img src="data:image/png;base64,{{ $qrCode ?? "" }}" height="80" alt="QR Code"><br>
            <br><br>
            <span>{{ $manajer->name ?? '-' }}</span><br>
            <span>{{ $manajer->jabatan ?? 'Manager' }}</span>
        </td>
    </tr>
</table>
