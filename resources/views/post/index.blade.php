<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('post.create')}}">add new post</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{$post->id}}</th>
                                <td>{{$post->post}}</td>
                                <td>{{$post->status}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td class="d-flex flex-between">
                                    <a href="{{route('post.edit', ['post' => $post])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('post.destroy',$post) }}" method="POST">   
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                    <div class="d-flex">
                        {{ $posts->links() }}
                    </div>
                </table>
            </div>
        </div>
    </div>
</x-main>