<div style="text-align: center; margin-bottom: 10px; font-family: DejaVu Sans;">
    <table width="100%" style="margin-bottom: 5px;">
        <tr>
            <td style="width: 80px; text-align: center;">
                <img src="{{ public_path('logo.png') }}" height="70" alt="Logo">
            </td>
            <td style="text-align: center;">
                <div style="font-size: 18px; font-weight: bold;">PT XYZ</div>
                <div style="font-size: 13px;">Jl. Jalanin Aja Dulu, Jakarta</div>
                <div style="font-size: 13px;">Telp: 021-113456789 | Email: info@ptxyz.co.id</div>
            </td>
        </tr>
    </table>

    <!-- Garis ganda -->
    <hr style="border: 1.5px solid black; margin: 0;">
    <hr style="border: 0.5px solid black; margin-top: 1px;">

    <!-- Nomor surat -->
    <div style="font-size: 12px; margin-top: 6px; text-align: center;">
        <strong>Nomor: </strong>{{ $nomor ?? 'HRD/BJ/01/V/2022' }}
    </div>
</div>
