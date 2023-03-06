<x-main>
    <form method="POST" action="{{route('user.update', ['user' => $user])}}">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input name="name" type="text" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input name="email" type="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Role</label>
            <select class="form-control" name="role_id">
              @foreach ($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
          </select>
      </div>
        <button class="btn btn-success">Save</button>
      </form>
</x-main>
