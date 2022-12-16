@extends('layouts.admin')

@section('title', 'Add Delivery')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Category</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.delivery.store') }}" method="POST" class="col-md-6 align-items-center">
                        @csrf
                        <div class="mb-3">
                            <label for="city" class="form-label">Default select</label>
                            <select id="city" name="city" class="form-select choose city">
                                <option>Default select</option>
                                @foreach($city as $ci)
                                    <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Default select</label>
                            <select id="province" name="province" class="form-select choose province">
                                <option>Default select</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="wards" class="form-label">Default select</label>
                            <select id="wards" name="wards" class="form-select wards">
                                <option>Default select</option>
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fee_ship" class="form-label">Default input</label>
                            <input id="fee_ship" name="fee_ship" class="form-control fee_ship" type="text"
                                   placeholder="Default input">
                        </div>

                        <div class="row text-center justify-content-center">
                            <div class="col-sm-10">
                                <button type="submit" name="add_delivery" class="btn btn-primary add_delivery">Add
                                    Delivery
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.choose').on('change', function () {
                let action = $(this).attr('id');
                let ma_id = $(this).val();
                let _token = $('input[name="_token"]').val();
                let result = '';
                if (action === 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url('/admin/select-delivery') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token,
                    },
                    success: function (data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
@endpush
