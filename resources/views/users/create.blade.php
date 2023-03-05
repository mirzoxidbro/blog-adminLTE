<x-main>
    <form method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
      </form>
</x-main>