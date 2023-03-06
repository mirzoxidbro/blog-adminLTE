<x-main>
    <form action="{{route('post.update', ['post' => $post])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Post</label>
            <textarea name="post" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$post->post}}"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" name="status">
                <option value="in_process">IN PROCESS</option>
                <option value="approved">APPROVED</option>
                <option value="rejected">REJECTED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select class="form-control" name="user_id">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-main>