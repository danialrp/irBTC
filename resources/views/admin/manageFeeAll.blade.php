@extends('layout/admin')

@section('title', 'کارمزد سیستم مدیریت')

@section('content')
    <div class="table-container">
        <table id="" class="table-general">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>مقدار کارمزد</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($fees as $fee)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $fee->fa_name }}</td>
                <td class="numbers">{{ floatval($fee->fee_value) }}</td>
                <td>{{ $fee->description }}</td>
                <td><a id="detail-link" href="{{ url('/iadmin/fee', $fee->id) }}">ویرایش</a></td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {!! $fees->appends(Input::query())->render() !!}
        </div>
    </div>
@stop