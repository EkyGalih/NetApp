@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table table-row-bordered table-row-dashed gy-4">
    <thead>
        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th>No</th>
            <th>Action</th>
            <th>Chain</th>
            <th>Src.Address</th>
            <th>Dst.Address</th>
            <th>Protocol</th>
            <th>Src.Port</th>
            <th>Dst.Port</th>
            <th>In Interface</th>
            <th>Out Interface</th>
            <th>Src Address</th>
            <th>Dst Address</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
