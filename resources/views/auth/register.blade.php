<x-auth-template>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>
                        <div class="input-group">
                            <span class="input-group-addon" id="name"><i class="icon-account_circle"></i></span>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="email"><i class="icon-mail_outline"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="age"><i class="icon-today"></i></span>
                            <input type="number" class="form-control" name="age">
                        </div>
                        @error('age')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="gender"><i class="icon-accessibility2"></i></span>
                            <select id="gender" name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="password-confirm"><i class="icon-verified_user"></i></span>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required />
                        </div>
                        <div class="actions clearfix">
                            <button type="submit" class="btn btn-primary">Signup</button>
                        </div>
                        <div class="or"></div>
                        <div class="mt-4">
                            <a href="/login" class="additional-link">Already have an Account? <span>Login Now</span></a>
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
