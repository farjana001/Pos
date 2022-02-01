    <!-- Content Row -->
    <div class="d-flex flex-wrap py-2">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $totalSale = 0;
                                    foreach ($user->sales as $sale){
                                        $totalSale += $sale->items()->sum('total');
                                    }
                                    echo $totalSale;
                                ?>
                            </div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between no-gutters align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Purchases</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $totalPurchase = 0;
                                    foreach ($user->purchases as $purchase) {
                                        $totalPurchase += $purchase->items()->sum('total');
                                    }

                                    echo $totalPurchase;
                                ?>
                            </div>
                        </div>
                        <div class="">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Receipts</div>
                            <div class="">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalReceipts = $user->receipts()->sum('amount') }}</div>
                            </div>
                        </div>
                        <div class="">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPayment = $user->payments()->sum('amount') }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <?php
            $totalBalance = ($totalPurchase + $totalReceipts) - ($totalSale + $totalPayment)
        ?>
        <div class="col mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Balace</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if ($totalBalance >= 0)
                                {{ $totalBalance }}
                            @else
                            0
                            @endif</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Due</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ($totalBalance < 0)
                                    {{ $totalBalance }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
