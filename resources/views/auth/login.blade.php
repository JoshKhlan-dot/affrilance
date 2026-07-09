<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Sign In</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8}
body{font-family:'Inter',sans-serif;background:var(--bg2);color:var(--ink);min-height:100vh;display:flex;align-items:center;justify-content:center}
.card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:2.5rem;width:100%;max-width:420px;box-shadow:0 4px 24px rgba(17,18,16,0.06)}
.logo{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:900;color:var(--ink);text-decoration:none;display:block;text-align:center;margin-bottom:1.5rem}
.logo span{color:var(--gold)}
h1{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--ink);text-align:center;margin-bottom:0.4rem}
.subtitle{font-size:0.85rem;color:var(--ink3);text-align:center;margin-bottom:2rem}
.form-group{margin-bottom:1.2rem}
label{display:block;font-size:0.8rem;font-weight:500;color:var(--ink2);margin-bottom:0.4rem}
input[type=email],input[type=password]{width:100%;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color 0.2s;background:#fff}
input:focus{border-color:var(--gold)}
.error{font-size:0.75rem;color:#c94a2a;margin-top:4px}
.remember-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem}
.remember{display:flex;align-items:center;gap:6px;font-size:0.8rem;color:var(--ink2)}
.forgot{font-size:0.8rem;color:var(--gold);text-decoration:none}
.forgot:hover{text-decoration:underline}
.btn{width:100%;padding:0.85rem;background:var(--ink);color:#fff;border:none;border-radius:6px;font-size:0.9rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s}
.btn:hover{background:var(--gold)}
.divider{text-align:center;font-size:0.8rem;color:var(--ink3);margin:1.2rem 0}
.register-link{text-align:center;font-size:0.85rem;color:var(--ink2)}
.register-link a{color:var(--gold);text-decoration:none;font-weight:500}
.register-link a:hover{text-decoration:underline}
</style>
</head>
<body>
<div class="card">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to your AfriLance account</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')<div class="error">{{ $message }}</div>@enderror
        </div>

        <div class="remember-row">
            <label class="remember">
                <input type="checkbox" name="remember"> Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="btn">Sign in to AfriLance</button>

        <div class="divider">Don't have an account?</div>
        <div class="register-link"><a href="{{ route('register') }}">Create a free account →</a></div>
    </form>
</div>
</body>
</html>