@extends('client.layout.master')
@section('content')
<form action="{{ route('nguoidung.dangnhap') }}" method="POST">
    <h3>Đăng nhập</h3>
    @csrf
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
    @if ($message = Session::get('error'))
        <div class="alert-danger">{{ $message }}</div>
    @endif
    <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
  </form>

@endsection
