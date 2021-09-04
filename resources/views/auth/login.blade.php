<x-auth-template>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>
                        <div class="input-group">
                            <span class="input-group-addon" id="email"><i class="icon-mail_outline"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="actions clearfix">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="or"></div>
                        <div class="mt-4">
                            <a href="/register" class="additional-link">Don't have an Account? <span>Create Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="signup-slider"></div>
                </div>
            </div>
        </div>
    </form>
</x-auth-template>
