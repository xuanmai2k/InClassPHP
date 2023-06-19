@extends('client.layout.master')
@section('content')
<div class="container">
    @if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li><span style="color:red">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<form action="{{ route('nguoidung.dangky') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
      </div>
      @error('name')
        <div class="alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    </div>
    @error('email')
        <div class="alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{ old('password') }}">
    </div>
    @error('password')
        <div class="alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary" value="register" name="register">Register</button>
  </form>

@endsection
