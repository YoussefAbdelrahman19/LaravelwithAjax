<div id="table_data">
    <x-layout>
        <form method="GET" action="/users">
            @if (request('gender'))
                <input type="hidden" name="gender" value="{{ request('gender') }}">
            @endif
            <div class="form-inline my-3">
                <div class="form-group">
                    <label for="search" class="">Search:</label>
                    <input type="text" name="search" class="form-control mx-sm-3" id="search" value="{{request('search')}}" placeholder="Search by name" />
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gender
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/users?gender=male&{{ http_build_query(request()->except('gender', 'page')) }}">Male</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/users?gender=female&{{ http_build_query(request()->except('gender', 'page')) }}">Female</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-header">All Users</div>
            <div class="card-body">
                    <div>
                <table class="table table-hover m-0" id="table-user">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr id="user{{ $user->id }}">
                                <th id="id{{ $user->id }}" scope="row">{{ $user->id }}</th>
                                <td id="name{{ $user->id }}">{{ $user->name }}</td>
                                <td id="email{{ $user->id }}">{{ $user->email }}</td>
                                <td id="gender{{ $user->id }}">{{ $user->gender }}</td>
                                <td id="age{{ $user->id }}">{{$user->age}}</td>
                                <td>
                                    <a href="/users/{{ $user->id }}"class="btn btn-success">Show</a>
                                    <a href="javascript:void(0)" onclick="editUser({{ $user->id }})" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">Edit</a>
                                    <a href="javascript:void(0)" onclick="getUserId({{ $user->id }})" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links('pagination::bootstrap-4') }}
                    </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="edit-user">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                    <small class="text-secondary">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @error('email')
                                    <small class="text-secondary">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="age" class="col-form-label">Age:</label>
                                <input type="number" class="form-control" id="age" name="age">
                                @error('age')
                                    <small class="text-secondary">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label">gender:</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-secondary">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary">Edit User</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal delete -->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm mt-5 mb-0" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="deleteUser()">delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="script">
        <script>
      

            function editUser(id) {
                $.get('/edit/'+id, function(user){
                    $('#id').val(user.id);
                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('#age').val(user.age);
                    $('#gender').val(user.gender);
                })
            }
        </script>
        <script>
            $('#edit-user').submit(function(e) {
                e.preventDefault();
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();
                let name = $('#name').val();
                let email = $('#email').val();
                let age = $('#age').val();
                let gender = $('#gender').val();
                $.ajax({
                    url:"{{ route('editUser') }}",
                    type:"POST",
                    data:{
                        _token,
                        id,
                        name,
                        email,
                        age,
                        gender
                    },
                    success: function(response) {
                        if(response) {
                            $('#id'+response.id).text(response.id)
                            $('#name'+response.id).text(response.name);
                            $('#email'+response.id).text(response.email);
                            $('#gender'+response.id).text(response.gender);
                            $('#age'+response.id).text(response.age);
                            $('#edit-modal').modal('toggle');
                            $('#edit-user')[0].reset();
                        }
                    }
                })
            })
        </script>
        <script>
            let id;
            function getUserId(user_id) {
                id = user_id
                return Number(id)
            }
            function deleteUser() {
                    $.ajax({
                        url: '/delete/'+id,
                        type: 'DELETE',
                        data: {
                            _token: $('input[name=_token]').val()
                        },
                        success: function(response) {
                            $('#user'+id).remove();
                            $('#delete-modal').modal('toggle');
                        }
                    })
            }
        </script>
        <script>
            $(document).ready(function(){
                $('#table-user').DataTable();
                $(document).on('click', '.pagination a', function(event){
                    event.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    fetch_data(page);
                });
                function fetch_data(page)
                {
                    $.ajax({
                        url:"/users?page="+page+"&",
                        success:function(users)
                        {
                            $('#table_data').html(users);
                        }
                    });
                }
            });
        </script>
        
        </x-slot>
    </x-layout>
    </div>
