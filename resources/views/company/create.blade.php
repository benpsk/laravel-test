@extends('layouts.app')
@section('content')
<div class="container" id="company-create-form">
    <h4 class="my-3">Company Form</h4>
    <form hx-post="{{ route('company.store')}}" hx-target="#app" hx-swap="outerHTML" hx-push-url="true">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-3">
            <label for="cname" class="form-label">Company Name</label>
            <input type="text" name="name" class="form-control" id="cname" aria-describedby="emailHelp" placeholder="eg. ABC Company" onkeyup="this.setCustomValidity('')" hx-on:htmx:validation:validate="if(this.value == '') { this.setCustomValidity('Please enter the company name'); }">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="eg. example@example.com" onkeyup="this.setCustomValidity('')" hx-on:htmx:validation:validate="if(this.value == '') { this.setCustomValidity('Please enter the email address');} ">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="eg. example@example.com">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button hx-get="{{ route('company.index')}}" hx-trigger="click" hx-swap="outerHTML" hx-target="#app" hx-push-url="true" class="btn btn-secondary">
            Back
        </button>
    </form>
</div>
@endsection
