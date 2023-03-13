@extends('backend.config.blank')
@section('blank')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mb-3">
            <div class="card border-0 p-4 rounded shadow">
                <form action="{{ route('owner.update') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Brand Email</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Number</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-light border border-end-0 text-dark" id="insta-id">+880</span>
                                    <input name="number" type="number" class="form-control @error('number') is-invalid @enderror" value="{{ $data->number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Number</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-light border border-end-0 text-dark" id="insta-id">+880</span>
                                    <input name="landline" type="number" class="form-control @error('landline') is-invalid @enderror" value="{{ $data->landline }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Address </label>
                                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $data->address }}">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
