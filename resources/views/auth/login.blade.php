<x-guest-layout>
    <!-- Session Status -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img
                    src="{{ asset('') }}img/casual-life-3d-young-people-in-the-aprons-with-gadgets.png"
                    alt="auth-login-cover"
                    class="img-fluid my-5 auth-illustration"
                    data-app-light-img="casual-life-3d-young-people-in-the-aprons-with-gadgets.png"
                    data-app-dark-img="casual-life-3d-young-people-in-the-aprons-with-gadgets.png"
                />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2">
                        <img width="50%" height="50%" src="/img/juicy-laundry-basket.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">Selamat Datang Di Laundry! 👋</h3>
                <p class="mb-4">Silakan masuk ke akun Anda</p>

                <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('name') }}"
                            placeholder="Enter your email"
                            required autofocus autocomplete="username"
                        />
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                            @endif
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                required autocomplete="current-password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                </form>
            </div>
        </div>
        <!-- /Login -->
    </div>
</x-guest-layout>
