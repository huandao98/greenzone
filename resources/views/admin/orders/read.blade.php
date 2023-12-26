@extends("admin.layout")
@section("append-du-lieu-view")

@php
    function getCustomerName($customer_id){
        $record = DB::table("customers")->where("id","=",$customer_id)->first();
        return isset($record->name) ? $record->name : "";
    }
@endphp
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orders</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if (count($data) > 0)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Price</th>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ getCustomerName($row->customer_id) }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->date)) }}</td>
                        <td>{{ number_format($row->price) }}đ</td>
                        <td style="text-align:center;">
                        @if($row->status == 1)
                            <span style="color:red;">Đã giao hàng</span>
                        @else
                            <span>Chưa giao hàng</span>
                        @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="{{ url('admin/orders/detail/'.$row->id) }}" class="btn btn-warning btn-sm">Chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="cart-text">Không có đơn đặt hàng nào</p>
        @endif
    </div>
</div>

@endsection
