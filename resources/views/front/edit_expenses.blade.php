@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <form action="{{ route('update', $expenses->id) }}" method="POST">
                    @csrf
                    <div class="body" style="margin-top: 20px">
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Item Name <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="item" value="{{ $expenses->item }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Amount <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="amount" value="{{ $expenses->amount }}"
                                    required>
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
                                <input class="datepicker-input form-control" type="text"
                                    value="{{ $expenses->purchaseDate }}" name="expense_date" data-date-format="dd-mm-yyyy"
                                    required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Category <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <select name="itemCategory" class="form-control m-b" id="main_category">
                                    <option value="" disabled="" selected="true">{{ $expenses->itemCategory }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ $expenses->itemCategory == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="submit-section ">
                            <button class="btn btn-success submit-btn">Update</button>
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
