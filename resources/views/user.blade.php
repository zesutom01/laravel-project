@extends('layouts.app')

@section('script')
<script>
  $(function(){
    $('.btn-delete').click(function(){
      if(confirm('Do you want to delete User #' + $(this).data('id'))){
        location.href = '/user/delete/' + $(this).data('id');
      }
    });
  });
</script>
@endsection

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List All User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td><button data-id="{{ $user->id }}" class="btn btn-danger btn-sm btn-delete">Delete</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">Add User</div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif

                     <form method="POST" action="/user">
                         @csrf

                         <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                             <div class="col-md-6">
                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                             <div class="col-md-6">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                             <div class="col-md-6">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                 @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                             <div class="col-md-6">
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                             </div>
                         </div>

                         <div class="form-group row mb-0">
                             <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-primary">
                                     Save
                                 </button>
                             </div>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
   </div>
@endsection
