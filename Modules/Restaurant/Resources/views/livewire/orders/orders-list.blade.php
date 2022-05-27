<div>
    <div id="panel-4" class="panel">
        <div class="panel-hdr border-faded border-top-0 border-right-0 border-left-0 shadow-0">
            <h2>
                {{ __('restaurant::labels.order') }}
                <span class="fw-300">
                    <i>{{ __('restaurant::labels.panel') }}</i>
                </span>
            </h2>
            <div class="panel-toolbar pr-3 align-self-end">
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                    data-toggle="tooltip" data-offset="0,10"
                    data-original-title="{{ __('restaurant::labels.fullscreen') }}"></button>
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                @if (count($orders) > 0)
                    @php
                        $order_id = 0;
                    @endphp
                    @foreach ($orders as $order)
                        @if ($order_id != $order['id'])
                            <div class="card mb-g">
                                <div class="card-body pb-0 px-4">
                                    <div class="d-flex flex-row pb-3 pt-2  border-top-0 border-left-0 border-right-0">
                                        <h4 class="mb-0 flex-1 fw-500">
                                            P{{ $order['id'] }}
                                            <small class="m-0 l-h-n">
                                                @if ($order['command_state'] == 'P')
                                                    PENDIENTE
                                                @elseif($order['command_state'] == 'C')
                                                    PREPARANDO
                                                @elseif($order['command_state'] == 'M')
                                                    EN MESA
                                                @endif
                                            </small>
                                        </h4>
                                        <span class="fs-xs opacity-70">
                                            {{ \Carbon\Carbon::parse($order['order_created_at'])->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('labels.quantity') }}</th>
                                                    <th>{{ __('restaurant::labels.commands') }}</th>
                                                    <th>{{ __('labels.detail') }}</th>
                                                    <th>Servir</th>
                                                    <th>{{ __('labels.state') }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $item)
                                                    @if ($order['id'] == $item['id'])
                                                        <tr>
                                                            <td class="text-right align-middle">
                                                                {{ intval($item['quantity']) }}</td>
                                                            <td class="align-middle">
                                                                <h5 class="m-0">
                                                                    {{ $item['description'] }}
                                                                    <small class="m-0 l-h-n">
                                                                        {{ \Carbon\Carbon::parse($order['command_created_at'])->diffForHumans() }}
                                                                    </small>
                                                                </h5>
                                                            </td>
                                                            <td class="align-middle">
                                                                {{ $item['details'] }}
                                                            </td>
                                                            <td class="align-middle">
                                                                @if ($item['command_local'])
                                                                    Aquí
                                                                @else
                                                                    {{ __('restaurant::labels.to_carry_out') }}
                                                                @endif
                                                            </td>
                                                            <td class="align-middle">
                                                                @if ($item['command_state'] == 'P')
                                                                    <h1><span
                                                                            class="badge badge-danger">PENDIENTE</span>
                                                                    </h1>
                                                                @elseif ($item['command_state'] == 'C')
                                                                    <h1><span
                                                                            class="badge badge-warning">PREPARANDO</span>
                                                                    </h1>
                                                                @else
                                                                    <h1><span class="badge badge-primary">SERVIDO</span>
                                                                    </h1>
                                                                @endif
                                                            </td>
                                                            <td class="text-right align-middle">
                                                                <div class="btn-group btn-group-lg btn-block">
                                                                    <button type="button"
                                                                        wire:click="commandState({{ $item['id'] }},{{ $item['command_id'] }},'C')"
                                                                        class="btn btn-secondary waves-effect waves-themed">Preparando</button>
                                                                    <button type="button"
                                                                        wire:click="commandState({{ $item['id'] }},{{ $item['command_id'] }},'S')"
                                                                        class="btn btn-secondary waves-effect waves-themed">Servido</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" class="text-right align-middle">
                                                        <span>{{ __('restaurant::labels.waiter') }}:
                                                            {{ $order['full_name'] }}</span>
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <button wire:click="orderState({{ $order['id'] }})"
                                                            class="btn btn-primary btn-lg btn-block waves-effect waves-themed">
                                                            <i class="fal fa-check fs-xs mr-1"></i>
                                                            <span>TERMINADO</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @foreach ($order['array_tables'] as $array_table)
                                        <div class="position-relative js-waves-off" style="width: 55px;">
                                            <img
                                                src="{{ url('themes/smart-admin/img/icon-png/icons8-mesa-50.png') }}">
                                            <span
                                                class="badge border border-light rounded-pill bg-success-700 position-absolute pos-bottom pos-right">{{ $array_table['name'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @php
                                $order_id = $order['id'];
                            @endphp
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-info">
                        <h2 class="text-center">Aún no hay más pedidos</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
