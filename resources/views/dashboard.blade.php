@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Payment</h4>
                <h3 class="mb-1 ">
                    {{ App\Payment::whereType('rent')->count() }} | Total <span class="float-right text-success">${{ $rentPayment = App\Payment::whereType('rent')->sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('payment.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Refund</h4>
                <h3 class="mb-1 ">
                    {{ App\PaymentReturn::count() }} | Total <span class="float-right text-danger">${{ $rentReturn = App\PaymentReturn::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('payment.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Borrow</h4>
                <h3 class="mb-1 ">
                    {{ App\Borrow::count() }} | Total <span class="float-right text-danger">${{ $borro = App\Borrow::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('borrow.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan</h4>
                <h3 class="mb-1 ">
                    {{ App\Loan::count() }} | Total <span class="float-right text-danger">${{ $loan = App\Loan::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan Return</h4>
                <h3 class="mb-1 ">
                    {{  App\LoanReturn::count() }} | Total <span class="float-right text-success">${{ $loanReturn =  App\LoanReturn::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Expense</h4>
                <h3 class="mb-1 ">
                    {{ App\Expense::count() }} | Total <span class="float-right text-danger">${{ $expense = App\Expense::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('expense.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Well Part</h4>
                <h3 class="mb-1 ">
                    {{ App\WellPart::count() }} | Total <span class="float-right text-danger">${{ $wellPart = App\WellPart::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('wellpart.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">User</h4>
                <h3 class="mb-1 ">
                    Total <span class="float-right text-danger">{{ App\User::count() }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('user.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Cash on hand</h4>
                <h2 class="mb-1 ">
                    <span class="float-right text-primary">
                    ${{ ($rentPayment+$loanReturn)-($rentReturn+$borro+$loan+$expense+$wellPart) }}</span>
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="card col-12">
        <h5 class="card-header">Over All Reports</h5>
        <div class="card-body">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th scope="col">No</th> --}}
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        <th scope="col">Taker/Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($reports as $report)
                    <tr class="{{ $report->type == 'Payment' || $report->type == 'Loan Return' ? 'text-success':'text-danger' }}">
                        {{-- <td scope="row">{{ $i++ }}</td> --}}
                        <td scope="row">{{ $report->loancounter ?? $report->id }}</td>
                        <td scope="row">{{ $report->created_at->format('d-m-Y') }}</td>
                        <td scope="row">{{ $report->type }}</td>
                        <td scope="row">{{ $report->user->name ?? 'a' }}</td>
                        <td scope="row">{{ $report->amount }}</td>
                        <td scope="row">{{  $report->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


@section('scripts')
<script>
    alert('User Roles and Permission Does not Completed Yet! Please consider it, will update soon');
</script>
@endsection
