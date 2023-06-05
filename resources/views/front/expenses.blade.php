@extends('layouts.dashboard')
@section('content')

    <body>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @if (session('msg'))
                <div class="alert alert-danger">{{ session('msg') }}</div>
            @endif
            @if (session('info'))
                <div class="alert alert-success">{{ session('info') }}</div>
            @endif

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">All Expenses</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="{{ route('create') }}" class="btn btn-outline-secondary">Add New
                            Expenses</a>
                    </div>
                </div>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Item Category</th>
                            <th>Purchase Date</th>
                            <th>Amount</th>
                            <th width="280px">Actions</th>
                        </tr>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->item }}</td>
                                <td>{{ $expense->itemCategory }}</td>
                                <td>{{ $expense->purchaseDate }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td class="d-flex justify-content-around ">
                                    {{-- <a class="btn btn-info" href="">Edit</a> --}}
                                    <form action="{{ route('edit', $expense->id) }}" method="POST">
                                        @csrf
                                        {{-- @method('patch') --}}
                                        <button type="submit" class="btn btn-info me-1">Edit</button>
                                    </form>
                                    <form action="{{ route('delete', $expense->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </main>
        </div>
        </div>
    @endsection
