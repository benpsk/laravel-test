@extends('layouts.app')

@section('content')
<div class="container my-3">

    <h4 class="my-3">Company Detail</h4>

    <div class="card">
        <div class="card-body">

            @if($company == null)
            <div class="row">
                <div class="col text-center text-success">
                    No Data FOund!
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <p>Company Id</p>
                </div>
                <div class="col">
                    <p>{{ $company->id }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Company Name</p>
                </div>
                <div class="col">
                    <p>{{ $company->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Email</p>
                </div>
                <div class="col">
                    <p>{{ $company->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Address</p>
                </div>
                <div class="col">
                    <p>{{ $company->address }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>

    <a hx-get="{{ route('company.index') }}" hx-swap="outerHTML" hx-target="#app" hx-push-url="true" type="button" class="btn btn-primary mt-3">Back</a>


</div>
@endsection
