<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Create Account</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8}
body{font-family:'Inter',sans-serif;background:var(--bg2);color:var(--ink);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem 1rem}
.card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:2.5rem;width:100%;max-width:440px;box-shadow:0 4px 24px rgba(17,18,16,0.06)}
.logo{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:900;color:var(--ink);text-decoration:none;display:block;text-align:center;margin-bottom:1.5rem}
.logo span{color:var(--gold)}
h1{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--ink);text-align:center;margin-bottom:0.4rem}
.subtitle{font-size:0.85rem;color:var(--ink3);text-align:center;margin-bottom:2rem}
.form-group{margin-bottom:1.2rem}
label{display:block;font-size:0.8rem;font-weight:500;color:var(--ink2);margin-bottom:0.4rem}
input[type=text],input[type=email],input[type=password],select{width:100%;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color 0.2s;background:#fff}
input:focus,select:focus{border-color:var(--gold)}
.error{font-size:0.75rem;color:#c94a2a;margin-top:4px}
.role-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:0.4rem}
.role-option{border:1.5px solid var(--border);border-radius:8px;padding:0.85rem;cursor:pointer;transition:all 0.2s;text-align:center}
.role-option:hover{border-color:var(--gold);background:var(--gold-bg)}
.role-option input{display:none}
.role-option.selected{border-color:var(--gold);background:var(--gold-bg)}
.role-icon{font-size:1.3rem;margin-bottom:4px}
.role-title{font-size:0.82rem;font-weight:500;color:var(--ink)}
.role-desc{font-size:0.72rem;color:var(--ink3);margin-top:2px}
.btn{width:100%;padding:0.85rem;background:var(--ink);color:#fff;border:none;border-radius:6px;font-size:0.9rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s;margin-top:1.5rem}
.btn:hover{background:var(--gold)}
.login-link{text-align:center;font-size:0.85rem;color:var(--ink2);margin-top:1.2rem}
.login-link a{color:var(--gold);text-decoration:none;font-weight:500}
.login-link a:hover{text-decoration:underline}
</style>
</head>
<body>
<div class="card">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <h1>Create your account</h1>
    <p class="subtitle">Join Africa's freelance revolution</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')<div class="error">{{ $message }}</div>@enderror