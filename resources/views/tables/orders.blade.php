@extends('./admin/main')


@section('title', 'Orders')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/order-create" class="btn btn-primary">Create</a>

                    <div class="card mt-2">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Products</th>
                                        <th>Users</th>
                                        <th>Owners</th>
                                        <th>Count</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order['id']}}</td>
                                            <td>
                                                @foreach ($products as $product)
                                                    @if ($product['id'] == $order['product_id'])
                                                        {{$product['name']}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($users as $user)
                                                    @if ($user['id'] == $order['user_id'])
                                                        {{$user['name']}}
                                                    @endif
                                                @endforeach

                                            </td>
                                            <td>@foreach ($users as $user)
                                                @if ($user['id'] == $order['owner_id'])
                                                    {{$user['name']}}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td>{{$order['count']}}</td>
                                            <td>
                                                @if ($order['status'] == 1)
                                                    Active
                                                @elseif($order['status'] == 0)
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/order-show/{{$order->id}}" class="btn btn-primary">Show</a>

                                                <form action="/order/{{$order->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>


@endsection