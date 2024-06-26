@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Languages') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Language') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.languages.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">–– Select ––</option>
                            @foreach($languages as $code => $language)
                            <option value="{{ $code }}">{{ $language['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input name="name" readonly type="text" class="form-control" id="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Language') }}</label>
                        <input name="slug" readonly type="text" class="form-control" id="slug">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Is it default?') }}</label>
                        <select name="default" id="" class="form-control">
                            <option value="0">{{ __('No') }}</option>
                            <option value="1">{{ __('Yes') }}</option>
                        </select>
                        @error('default')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#language-select').on('change', function () {
                const value = $(this).val()
                const name = $(this).children(':selected').text()
                $('#slug').val(value)
                $('#name').val(name)
            })
        })
    </script>
@endpush
