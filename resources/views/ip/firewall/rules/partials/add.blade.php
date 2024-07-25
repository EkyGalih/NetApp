<!-- Modal -->
<div class="modal fade" id="addRuleModal" tabindex="-1" aria-labelledby="addRuleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addRuleModalLabel">New Firewall Rule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                data-bs-target="#general" type="button" role="tab" aria-controls="general"
                                aria-selected="true">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="action-tab" data-bs-toggle="tab" data-bs-target="#action"
                                type="button" role="tab" aria-controls="action"
                                aria-selected="false">Action</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel"
                            aria-labelledby="general-tab">
                            <div class="mb-3">
                                <label for="chain" class="form-label">Chain</label>
                                <select class="form-select" id="chain" name="chain" required>
                                    <option value="input">Input</option>
                                    <option value="output">Output</option>
                                    <option value="forward">Forward</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="srcAddress" class="form-label">Src.Address</label>
                                <input type="text" class="form-control" id="srcAddress" name="src-address">
                            </div>
                            <div class="mb-3">
                                <label for="dstAddress" class="form-label">Dst.Address</label>
                                <input type="text" class="form-control" id="dstAddress" name="dst-address">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="protocol" class="form-label">Protocol</label>
                                <select class="form-select" id="protocol" name="protocol">
                                    <option value="icmp">icmp</option>
                                    <option value="igmp">igmp</option>
                                    <option value="ggp">ggp</option>
                                    <option value="ip-encap">ip-encap</option>
                                    <option value="st">st</option>
                                    <option value="tcp">tcp</option>
                                    <option value="egp">egp</option>
                                    <option value="pup">pup</option>
                                    <option value="udp">udp</option>
                                    <option value="xns-idp">xns-idp</option>
                                    <option value="rdp">rdp</option>
                                    <option value="iso-tp4">iso-tp4</option>
                                    <option value="dccp">dccp</option>
                                    <option value="xtp">xtp</option>
                                    <option value="ddp">ddp</option>
                                    <option value="idpr-cmtp">idpr-cmtp</option>
                                    <option value="ipv6-encap">ipv6-encap</option>
                                    <option value="rsvp">rsvp</option>
                                    <option value="gre">gre</option>
                                    <option value="ipsec-esp">ipsec-esp</option>
                                    <option value="ipsec-ah">ipsec-ah</option>
                                    <option value="rspf">rspf</option>
                                    <option value="vmtp">vmtp</option>
                                    <option value="ospf">ospf</option>
                                    <option value="ipip">ipip</option>
                                    <option value="etherip">etherip</option>
                                    <option value="encap">encap</option>
                                    <option value="vim">vim</option>
                                    <option value="vrrp">vrrp</option>
                                    <option value="l2tp">l2tp</option>
                                    <option value="sctp">sctp</option>
                                    <option value="udp-lite">udp-lite</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="srcPort" class="form-label">Src.Port</label>
                                <input type="text" class="form-control" id="srcPort" name="src-port">
                            </div>
                            <div class="mb-3">
                                <label for="dstPort" class="form-label">Dst.Port</label>
                                <input type="text" class="form-control" id="dstPort" name="dst-port">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="inInterface" class="form-label">In Interface</label>
                                <select class="form-select" id="inInterface" name="in-interface">
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}">
                                            {{ $interface['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="outInterface" class="form-label">Out Interface</label>
                                <select class="form-select" id="outInterface" name="out-interface">
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}">
                                            {{ $interface['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="action" role="tabpanel" aria-labelledby="action-tab">
                            <div class="mb-3 mt-3">
                                <label for="action" class="form-label">Action</label>
                                <select class="form-select" id="action" name="action" required>
                                    <option value="accept">accept</option>
                                    <option value="add-dst-to-address-list">add dst to address list</option>
                                    <option value="add-src-to-address-list">add src to address list</option>
                                    <option value="drop">drop</option>
                                    <option value="fasttrack-connection">fasttrack connection</option>
                                    <option value="jump">jump</option>
                                    <option value="log">log</option>
                                    <option value="passthrough">passthrough</option>
                                    <option value="reject">reject</option>
                                    <option value="return">return</option>
                                    <option value="tarpit">tarpit</option>
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
                    <button type="submit" class="btn btn-md btn-primary">
                        <i class="ki-duotone ki-plus fs-2 me-1"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
