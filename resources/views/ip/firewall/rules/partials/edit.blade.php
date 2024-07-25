<!-- Modal -->
<div class="modal fade" id="editRuleModal-{{ $loop->iteration }}" tabindex="-1"
    aria-labelledby="editRuleModalLabel-{{ $loop->iteration }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editRuleModalLabel-{{ $loop->iteration }}">Edit Firewall Rule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab-{{ $loop->iteration }}" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="generals-tab-{{ $loop->iteration }}"
                                data-bs-toggle="tab" data-bs-target="#generals-{{ $loop->iteration }}" type="button"
                                role="tab" aria-controls="generals-{{ $loop->iteration }}"
                                aria-selected="true">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="actions-tab-{{ $loop->iteration }}" data-bs-toggle="tab"
                                data-bs-target="#actions-{{ $loop->iteration }}" type="button" role="tab"
                                aria-controls="actions-{{ $loop->iteration }}" aria-selected="false">Action</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent-{{ $loop->iteration }}">
                        <div class="tab-pane fade show active" id="generals-{{ $loop->iteration }}" role="tabpanel"
                            aria-labelledby="generals-tab-{{ $loop->iteration }}">
                            <div class="mb-3">
                                <label for="chain-{{ $loop->iteration }}" class="form-label">Chain</label>
                                <select class="form-select" id="chain-{{ $loop->iteration }}" name="chain" required>
                                    <option value="input" {{ $item['chain'] === 'input' ? 'selected' : '' }}>Input
                                    </option>
                                    <option value="output" {{ $item['chain'] === 'output' ? 'selected' : '' }}>Output
                                    </option>
                                    <option value="forward" {{ $item['chain'] === 'forward' ? 'selected' : '' }}>
                                        Forward</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="srcAddress-{{ $loop->iteration }}" class="form-label">Src.Address</label>
                                <input type="text" class="form-control" id="srcAddress-{{ $loop->iteration }}"
                                    name="src-address" value="{{ isset($item['src-address']) }}">
                            </div>
                            <div class="mb-3">
                                <label for="dstAddress-{{ $loop->iteration }}" class="form-label">Dst.Address</label>
                                <input type="text" class="form-control" id="dstAddress-{{ $loop->iteration }}"
                                    name="dst-address" value="{{ isset($item['dst-address']) }}">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="protocol-{{ $loop->iteration }}" class="form-label">Protocol</label>
                                <select class="form-select" id="protocol-{{ $loop->iteration }}" name="protocol">
                                    <option selected value="">Choose</option>
                                    <option value="icmp" {{ isset($item['protocol']) === 'icmp' ? 'selected' : '' }}>
                                        icmp</option>
                                    <option value="igmp" {{ isset($item['protocol']) === 'igmp' ? 'selected' : '' }}>
                                        igmp</option>
                                    <option value="ggp" {{ isset($item['protocol']) === 'ggp' ? 'selected' : '' }}>
                                        ggp</option>
                                    <option value="ip-encap"
                                        {{ isset($item['protocol']) === 'ip-encap' ? 'selected' : '' }}>ip-encap
                                    </option>
                                    <option value="st" {{ isset($item['protocol']) === 'st' ? 'selected' : '' }}>st
                                    </option>
                                    <option value="tcp" {{ isset($item['protocol']) === 'tcp' ? 'selected' : '' }}>
                                        tcp</option>
                                    <option value="egp" {{ isset($item['protocol']) === 'egp' ? 'selected' : '' }}>
                                        egp</option>
                                    <option value="pup" {{ isset($item['protocol']) === 'pup' ? 'selected' : '' }}>
                                        pup</option>
                                    <option value="udp" {{ isset($item['protocol']) === 'udp' ? 'selected' : '' }}>
                                        udp</option>
                                    <option value="xns-idp"
                                        {{ isset($item['protocol']) === 'xns-idp' ? 'selected' : '' }}>xns-idp</option>
                                    <option value="rdp" {{ isset($item['protocol']) === 'rdp' ? 'selected' : '' }}>
                                        rdp</option>
                                    <option value="iso-tp4"
                                        {{ isset($item['protocol']) === 'iso-tp4' ? 'selected' : '' }}>iso-tp4</option>
                                    <option value="dccp" {{ isset($item['protocol']) === 'dccp' ? 'selected' : '' }}>
                                        dccp</option>
                                    <option value="xtp" {{ isset($item['protocol']) === 'xtp' ? 'selected' : '' }}>
                                        xtp</option>
                                    <option value="ddp" {{ isset($item['protocol']) === 'ddp' ? 'selected' : '' }}>
                                        ddp</option>
                                    <option value="idpr-cmtp"
                                        {{ isset($item['protocol']) === 'idpr-cmtp' ? 'selected' : '' }}>idpr-cmtp
                                    </option>
                                    <option value="ipv6-encap"
                                        {{ isset($item['protocol']) === 'ipv6-encap' ? 'selected' : '' }}>ipv6-encap
                                    </option>
                                    <option value="rsvp" {{ isset($item['protocol']) === 'rsvp' ? 'selected' : '' }}>
                                        rsvp</option>
                                    <option value="gre" {{ isset($item['protocol']) === 'gre' ? 'selected' : '' }}>
                                        gre</option>
                                    <option value="ipsec-esp"
                                        {{ isset($item['protocol']) === 'ipsec-esp' ? 'selected' : '' }}>ipsec-esp
                                    </option>
                                    <option value="ipsec-ah"
                                        {{ isset($item['protocol']) === 'ipsec-ah' ? 'selected' : '' }}>ipsec-ah
                                    </option>
                                    <option value="rspf" {{ isset($item['protocol']) === 'rspf' ? 'selected' : '' }}>
                                        rspf</option>
                                    <option value="vmtp"
                                        {{ isset($item['protocol']) === 'vmtp' ? 'selected' : '' }}>vmtp</option>
                                    <option value="ospf"
                                        {{ isset($item['protocol']) === 'ospf' ? 'selected' : '' }}>ospf</option>
                                    <option value="ipip"
                                        {{ isset($item['protocol']) === 'ipip' ? 'selected' : '' }}>ipip</option>
                                    <option value="etherip"
                                        {{ isset($item['protocol']) === 'etherip' ? 'selected' : '' }}>etherip</option>
                                    <option value="encap"
                                        {{ isset($item['protocol']) === 'encap' ? 'selected' : '' }}>encap</option>
                                    <option value="vim" {{ isset($item['protocol']) === 'vim' ? 'selected' : '' }}>
                                        vim</option>
                                    <option value="vrrp"
                                        {{ isset($item['protocol']) === 'vrrp' ? 'selected' : '' }}>vrrp</option>
                                    <option value="l2tp"
                                        {{ isset($item['protocol']) === 'l2tp' ? 'selected' : '' }}>l2tp</option>
                                    <option value="sctp"
                                        {{ isset($item['protocol']) === 'sctp' ? 'selected' : '' }}>sctp</option>
                                    <option value="udp-lite"
                                        {{ isset($item['protocol']) === 'udp-lite' ? 'selected' : '' }}>udp-lite
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="srcPort-{{ $loop->iteration }}" class="form-label">Src.Port</label>
                                <input type="text" class="form-control" id="srcPort-{{ $loop->iteration }}"
                                    name="src-port"
                                    value="{{ isset($item['src-port']) ? htmlspecialchars($item['src-port'], ENT_QUOTES, 'UTF-8') : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="dstPort-{{ $loop->iteration }}" class="form-label">Dst.Port</label>
                                <input type="text" class="form-control" id="dstPort-{{ $loop->iteration }}"
                                    name="dst-port"
                                    value="{{ isset($item['dst-port']) ? htmlspecialchars($item['dst-port'], ENT_QUOTES, 'UTF-8') : '' }}">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="inInterface-{{ $loop->iteration }}" class="form-label">In
                                    Interface</label>
                                <select class="form-select" id="inInterface-{{ $loop->iteration }}"
                                    name="in-interface">
                                    <option value="">Choose</option>
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}"
                                            {{ isset($item['in-interface']) == $interface['name'] ? 'selected' : '' }}>
                                            {{ $interface['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="outInterface-{{ $loop->iteration }}" class="form-label">Out
                                    Interface</label>
                                <select class="form-select" id="outInterface-{{ $loop->iteration }}"
                                    name="out-interface">
                                    <option value="">Choose</option>
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}"
                                            {{ isset($item['out-interface']) == $interface['name'] ? 'selected' : '' }}>
                                            {{ $interface['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="actions-{{ $loop->iteration }}" role="tabpanel"
                            aria-labelledby="actions-tab-{{ $loop->iteration }}">
                            <div class="mb-3 mt-3">
                                <label for="action-{{ $loop->iteration }}" class="form-label">Action</label>
                                <select class="form-select" id="action-{{ $loop->iteration }}" name="action"
                                    required>
                                    <option value="accept" {{ $item['action'] === 'accept' ? 'selected' : '' }}>accept
                                    </option>
                                    <option value="add-dst-to-address-list"
                                        {{ $item['action'] === 'add-dst-to-address-list' ? 'selected' : '' }}>add dst
                                        to address list</option>
                                    <option value="add-src-to-address-list"
                                        {{ $item['action'] === 'add-src-to-address-list' ? 'selected' : '' }}>add src
                                        to address list</option>
                                    <option value="drop" {{ $item['action'] === 'drop' ? 'selected' : '' }}>drop
                                    </option>
                                    <option value="fasttrack-connection"
                                        {{ $item['action'] === 'fasttrack-connection' ? 'selected' : '' }}>fasttrack
                                        connection</option>
                                    <option value="jump" {{ $item['action'] === 'jump' ? 'selected' : '' }}>jump
                                    </option>
                                    <option value="log" {{ $item['action'] === 'log' ? 'selected' : '' }}>log
                                    </option>
                                    <option value="passthrough"
                                        {{ $item['action'] === 'passthrough' ? 'selected' : '' }}>passthrough</option>
                                    <option value="reject" {{ $item['action'] === 'reject' ? 'selected' : '' }}>reject
                                    </option>
                                    <option value="return" {{ $item['action'] === 'return' ? 'selected' : '' }}>return
                                    </option>
                                    <option value="tarpit" {{ $item['action'] === 'tarpit' ? 'selected' : '' }}>tarpit
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-2 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i> Cancel
                    </button>
                    <button type="submit" class="btn btn-md btn-success">
                        <i class="ki-duotone ki-send fs-2 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
