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
                            <a class="nav-link" href="all_products.html">
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Expenses</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a href="{{ route('/create') }}" class="btn btn-outline-secondary">Add New Expenses</a>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Item</th>
                                <th>ItemCategory</th>
                                <th>PurchaseDate</th>
                                <th>Amount</th>
                                <th width="280px">Actions</th>


                            </tr>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <th>{{ $expense->Item }}</th>
                                    <th>{{ $expense->ItemCategory }}</th>
                                    <th>{{ $expense->PurchaseDate }}</th>
                                    <th>{{ $expense->Amount }}</th>

                                    <td>
                                        <form action="{{ url('delete/' . $expense->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>

                                        <a href="{{ route('edit', $expense->id) }}">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil"></i>Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@stop
