<x-main>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('user.create')}}">Add User</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td class="d-flex flex-between">
                                    <a href="{{route('user.edit', ['user' => $user])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">   
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                    <div class="d-flex">
                        {{ $users->links() }}
                    </div>
                </table>
            </div>
        </div>
    </div>

</x-main>
