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

{{-- <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div> --}}