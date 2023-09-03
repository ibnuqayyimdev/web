<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-9">
                <select class="form-control form-control-lg" id="province" name="province" onchange="getCities(this)" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $val => $province)
                        <option value="{{ $province->id }}" {{ old('province') == $province->id ? 'selected' : ''}}>{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-9">
                <select class="form-control form-control-lg" id="cities" name="cities" onchange="getDistrict(this)" required>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-9">
                <select class="form-control form-control-lg" id="district" name="district" onchange="getVillage(this)" required>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                <div class="col-sm-9">
                    <select class="form-control form-control-lg" id="village" name="village" required>
                        <option value=""></option>
                    </select>
                </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function getCities(input) {
            $('#cities').empty();
            $.ajax({
                type: "POST",
                url: "{{ url('city') }}",
                data: {
                    province_id: input.value
                },
                dataType: "json",
                success: function(res) {
                    var option = `<option value="">Pilih Kota</option>`;
                    $.each(res.data.cities, function(idx, city) {
                        option += `<option value="${city.id}">${city.name}</option>`
                    });
                    $('#cities').append(option);
                }
            });
        }

        function getDistrict(input) {
            $('#district').empty();
            $.ajax({
                type: "POST",
                url: "{{ url('district') }}",
                data: {
                    city_id: input.value
                },
                dataType: "json",
                success: function(res) {
                    var option = `<option value="">Pilih Kecamatan</option>`;
                    $.each(res.data.districts, function(idx, district) {
                        option += `<option value="${district.id}">${district.name}</option>`
                    });
                    $('#district').append(option);
                }
            });
        }

        function getVillage(input) {
            $('#village').empty();
            $.ajax({
                type: "POST",
                url: "{{ url('village') }}",
                data: {
                    district_id: input.value
                },
                dataType: "json",
                success: function(res) {
                    var option = `<option value="">Pilih Desa</option>`;
                    $.each(res.data.villages, function(idx, village) {
                        option += `<option value="${village.id}">${village.name}</option>`
                    });
                    $('#village').append(option);
                }
            });
        }
    </script>
@endpush
