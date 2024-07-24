<div class="modal fade" id="createIPModal" tabindex="-1" aria-labelledby="createIPModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createIPModal">
                    Add IP Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="addressInput" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="addressInput"
                            value="{{ old('address') }}" placeholder="ext: 192.168.1.1/24">
                    </div>
                    <div class="mb-3">
                        <label for="networkInput" class="form-label">Network</label>
                        <input type="text" class="form-control" name="network" id="networkInput"
                            value="{{ old('network') }}" placeholder="ext: 192.168.1.0">
                    </div>
                    <div class="mb-3">
                        <label for="interfaceOption" class="form-label">Interface</label>
                        <select name="interface" class="form-control">
                            @foreach ($interfaces as $interface)
                                <option value="{{ $interface['name'] }}">
                                    {{ $interface['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Close
                </button>
                <button type="submit" class="btn btn-md btn-primary">
                    <i class="ki-duotone ki-plus fs-2 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> Add
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
