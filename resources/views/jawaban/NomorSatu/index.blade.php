<div class="dropdown-menu dropdown-menu-right ">
    @if (Auth::user())
        <a href="{{ route('logout') }}" class="dropdown-item">
            <i class="ni ni-user-run"></i> <span>Logout</span>
        </a>
    @else
        <a class="dropdown-item" data-toggle="modal" data-target="#loginModal">
            <i class="ni ni-bold-right"></i> <span>Login</span>
        </a>
    @endif
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('auth') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="105222002@example.com" value="105222002@student.universitaspertamina.ac.id"
                        name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password anda"
                        value="password" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </form>
    </div>
</div>
