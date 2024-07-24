<div class="modal fade" id="editAddressModal-{{ $loop->index }}" tabindex="-1"
    aria-labelledby="editAddressModalLabel-{{ $loop->index }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel-{{ $loop->index }}">
                    Edit IP Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('address.update', $address['.id']) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="addressInput-{{ $loop->index }}"
                            class="form-label">Address</label>
                        <input type="text" class="form-control" name="address"
                            id="addressInput-{{ $loop->index }}"
                            value="{{ $address['address'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="networkInput-{{ $loop->index }}"
                            class="form-label">Network</label>
                        <input type="text" class="form-control" name="network"
                            id="networkInput-{{ $loop->index }}"
                            value="{{ $address['network'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="interfaceOption-{{ $loop->index }}"
                            class="form-label">Interface</label>
                        <select name="interface" class="form-control">
                            @foreach ($interfaces as $interface)
                                <option value="{{ $interface['.id'] }}"
                                    {{ $interface['name'] == $address['interface'] ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-md btn-success">
                    <i class="ki-duotone ki-send fs-2 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i> Save
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
