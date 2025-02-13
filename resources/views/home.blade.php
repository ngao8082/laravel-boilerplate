@extends('ui.layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="row flex-grow">
    <div class="col-md-4 mx-auto">
        <div class="auth-form-light p-5 border border-dark">
            <form method="POST" action="{{ route('student.register') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="regid" class="sr-only">Registration Number</label>
                    <input type="text" id="regid" name="regno" class="form-control @error('regno') is-invalid @enderror" value="{{ old('regno') }}" required placeholder="Registration number">
                    @error('regno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="passWord" class="form-control @error('password') is-invalid @enderror" required placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-block btn-primary">
                   Add student
                </button>

            </form>
        </div>
    </div>
</div>
<div class="row flex-grow mt-2">
<div class="col-md-6 mx-auto">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">RegNo</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($StudentsModel as $StudentsModels)
    <tr>
      <th scope="row">1</th>
      <td>{{$StudentsModels->name}}</td>
      <td>{{$StudentsModels->regno}}</td>
        <td><form action="{{route('remove', $StudentsModels->id)}}" method="post">
                @csrf
                @method('delete')
                <button style="background-color: darkcyan; margin: 1rem 0rem 0rem 4rem;padding: 1rem 2rem 1rem 2rem; border-radius: 4rem; ">Delete</button>
            </form></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@endsection


