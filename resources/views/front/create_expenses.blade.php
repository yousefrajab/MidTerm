@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @if (session('status'))
                    <div class="alert alert-info">{{ session('status') }}</div>
                @endif
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="body" style="margin-top: 20px">
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Item Name <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" placeholder="item name" name="item" required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Amount <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="800.00" name="amount" required>
                            </div>
                            <div class="col-lg-6">
                                <select name="currency_symbol" class="form-control">
                                    <option value="$ - US">$ - US Dollar</option>
                                    <option value="£ - GBP">£ - British Pound</option>
                                    <option value="$ - CAD">$ - Canadian Dollar</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Expense Date <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input class="datepicker-input form-control" type="text" value="07-05-2021"
                                    name="expense_date" data-date-format="dd-mm-yyyy" required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Category <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <select name="itemCategory" class="form-control m-b" id="main_category">
                                    <option value="" disabled="" selected="">Choose
                                        Category</option>

                                    @foreach ($expenses as $expense)
                                        <option value="{{ $expense->itemCategory }}">{{ $expense->itemCategory }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        {{-- style="color: white;text-decoration: none" --}}
                        <div class="submit-section ">
                            <button class="btn btn-primary submit-btn">Submit</button>
                            <button class="btn btn-danger"><a class="text-decoration-none text-white"
                                    href="{{ route('expenses') }}">Go
                                    Back</a></button>

                        </div>
                    </div>
            </main>
            </form>
        </div>
    </div>
@endsection
