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
        <button class="btn btn-success">Save</button>
      </form>
</x-main>
