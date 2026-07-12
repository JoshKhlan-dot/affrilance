<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Submit Proposal</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--teal-bg:#eaf5f0;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8;--red:#c94a2a;--red-bg:#fdf0ec}
body{font-family:'Inter',sans-serif;background:var(--bg2);color:var(--ink)}
.topbar{background:#fff;border-bottom:1px solid var(--border);padding:1rem 2.5rem;display:flex;align-items:center;justify-content:space-between;position:fixed;top:0;left:0;right:0;z-index:100}
.logo{font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:900;color:var(--ink);text-decoration:none}
.logo span{color:var(--gold)}
.topbar-right{display:flex;align-items:center;gap:1.5rem}
.btn-sm{padding:0.5rem 1.1rem;border-radius:5px;font-size:0.8rem;font-weight:500;text-decoration:none;border:none;cursor:pointer;font-family:'Inter',sans-serif}
.btn-outline{background:transparent;border:1px solid var(--border);color:var(--ink2)}
.main{margin-top:85px;padding:2.5rem;max-width:800px;margin-left:auto;margin-right:auto}
.back-link{font-size:0.85rem;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:5px;margin-bottom:1.5rem}
.back-link:hover{text-decoration:underline}
.layout{display:grid;grid-template-columns:1fr 300px;gap:1.5rem;align-items:start}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3);margin-bottom:2rem}
.card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:2rem;margin-bottom:1.2rem}
.card-title{font-size:0.9rem;font-weight:600;color:var(--ink);margin-bottom:1.2rem;padding-bottom:0.8rem;border-bottom:1px solid var(--border)}
.form-group{margin-bottom:1.2rem}
label{display:block;font-size:0.8rem;font-weight:500;color:var(--ink2);margin-bottom:0.4rem}
input[type=number],select,textarea{width:100%;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color 0.2s;background:#fff}
input:focus,select:focus,textarea:focus{border-color:var(--gold)}
textarea{resize:vertical;min-height:150px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.error{font-size:0.75rem;color:var(--red);margin-top:4px}
.hint{font-size:0.75rem;color:var(--ink3);margin-top:4px}
.btn-submit{background:var(--ink);color:#fff;padding:0.9rem 2rem;border-radius:6px;border:none;font-size:0.9rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s;width:100%}
.btn-submit:hover{background:var(--gold)}
.success{background:var(--teal-bg);border:1px solid rgba(23,107,85,0.2);color:var(--teal);padding:0.75rem 1rem;border-radius:6px;font-size:0.85rem;margin-bottom:1.5rem}
.alert-error{background:var(--red-bg);border:1px solid rgba(201,74,42,0.2);color:var(--red);padding:0.75rem 1rem;border-radius:6px;font-size:0.85rem;margin-bottom:1.5rem}
.job-summary{background:var(--bg2);border:1px solid var(--border);border-radius:10px;padding:1.2rem}
.job-summary-title{font-size:0.95rem;font-weight:600;color:var(--ink);margin-bottom:0.5rem}
.job-summary-budget{font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--gold);margin-bottom:0.5rem}
.job-summary-meta{font-size:0.78rem;color:var(--ink3);line-height:1.7}
.already-applied{background:var(--teal-bg);border:1px solid rgba(23,107,85,0.2);border-radius:10px;padding:1.5rem;text-align:center}
.already-applied h3{font-size:1rem;font-weight:600;color:var(--teal);margin-bottom:0.4rem}
.already-applied p{font-size:0.85rem;color:var(--ink2)}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <a href="{{ route('jobs.index') }}" class="btn-sm btn-outline">Find Jobs</a>
        <a href="{{ route('freelancer.dashboard') }}" class="btn-sm btn-outline">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-sm btn-outline">Logout</button>
        </form>
    </div>
</div>

<div class="main">
    <a href="{{ route('jobs.show', $job) }}" class="back-link">← Back to job</a>

    <div class="layout">
        <div>
            <div class="page-title">Submit a Proposal</div>
            <div class="page-sub">Tell the client why you're the best person for this job.</div>

            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            @if($existing)
                <div class="already-applied">
                    <h3>✓ Proposal Already Submitted</h3>
                    <p>You submitted a proposal for this job on {{ $existing->created_at->format('M d, Y') }}. Status: <strong>{{ ucfirst($existing->status) }}</strong></p>
                </div>
            @else
                <form method="POST" action="{{ route('proposals.store', $job) }}">
                    @csrf

                    <div class="card">
                        <div class="card-title">Your Proposal</div>

                        <div class="form-group">
                            <label for="cover_letter">Cover Letter</label>
                            <textarea id="cover_letter" name="cover_letter" placeholder="Introduce yourself and explain why you're the perfect fit for this job. Mention relevant experience, your approach, and what makes you stand out..." required>{{ old('cover_letter') }}</textarea>
                            <div class="hint">Minimum 50 characters. Be specific and professional.</div>
                            @error('cover_letter')<div class="error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="bid_amount">Your Bid Amount</label>
                                <input type="number" id="bid_amount" name="bid_amount" value="{{ old('bid_amount') }}" placeholder="500" min="1" required>
                                @error('bid_amount')<div class="error">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select id="currency" name="currency">
                                    <option value="USD">🌍 USD — US Dollar</option>
                                    <option value="KES">🇰🇪 KES — Kenyan Shilling</option>
                                    <option value="NGN">🇳🇬 NGN — Nigerian Naira</option>
                                    <option value="GHS">🇬🇭 GHS — Ghanaian Cedi</option>
                                    <option value="ZAR">🇿🇦 ZAR — South African Rand</option>
                                    <option value="EGP">🇪🇬 EGP — Egyptian Pound</option>
                                    <option value="TZS">🇹🇿 TZS — Tanzanian Shilling</option>
                                    <option value="UGX">🇺🇬 UGX — Ugandan Shilling</option>
                                    <option value="RWF">🇷🇼 RWF — Rwandan Franc</option>
                                    <option value="ETB">🇪🇹 ETB — Ethiopian Birr</option>
                                    <option value="MAD">🇲🇦 MAD — Moroccan Dirham</option>
                                    <option value="GBP">🇬🇧 GBP — British Pound</option>
                                    <option value="EUR">🇪🇺 EUR — Euro</option>
                                    <option value="SEK">🇸🇪 SEK — Swedish Krona</option>
                                    <option value="CHF">🇨🇭 CHF — Swiss Franc</option>
                                </select>
                                @error('currency')<div class="error">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="delivery_days">Delivery Time (days)</label>
                            <input type="number" id="delivery_days" name="delivery_days" value="{{ old('delivery_days') }}" placeholder="7" min="1" required>
                            <div class="hint">How many days will you need to complete this project?</div>
                            @error('delivery_days')<div class="error">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Submit Proposal →</button>
                </form>
            @endif
        </div>

        <div>
            <div class="job-summary">
                <div class="job-summary-title">{{ $job->title }}</div>
                <div class="job-summary-budget">${{ number_format($job->budget_min) }} — ${{ number_format($job->budget_max) }}</div>
                <div class="job-summary-meta">
                    📁 {{ $job->category }}<br>
                    📍 {{ $job->location }}<br>
                    📅 Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}<br>
                    👤 {{ $job->client->name }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>