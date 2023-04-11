@extends('layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Expenses
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="body" style="margin-top: 20px">
                    <div class="form-group form-row">
                        <label class="col-lg-12 control-label">Itemname <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" placeholder="item name" name="item">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-12 control-label">Amount <span class="text-danger">*</span></label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="800.00" name="amount">
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
                            <input class="datepicker-input form-control" type="text" value="{{ 07 - 05 - 2021 }}"
                                name="expense_date" data-date-format="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-12 control-label">Category <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <select name="category" class="form-control m-b" id="main_category">
                                <option value="" disabled="" selected="">Choose Category</option>
                                <option value="4">{{ $expenses->ItemCategory }}</option>
                                <option value="5">{{ $expenses->ItemCategory }}</option>
                                <option value="6">{{ $expenses->ItemCategory }}</option>
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('create') }}" method="post">
                        @csrf

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@stop
