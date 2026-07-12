<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — My Proposals</title>
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
.layout{display:flex;margin-top:61px;min-height:calc(100vh - 61px)}
.sidebar{width:240px;background:#fff;border-right:1px solid var(--border);padding:1.5rem 0;position:fixed;top:61px;bottom:0;overflow-y:auto}
.sidebar-section{padding:0 1rem;margin-bottom:1.5rem}
.sidebar-label{font-size:0.65rem;font-weight:600;color:var(--ink3);text-transform:uppercase;letter-spacing:0.08em;padding:0 0.75rem;margin-bottom:0.5rem;display:block}
.sidebar-link{display:flex;align-items:center;gap:10px;padding:0.6rem 0.75rem;border-radius:7px;text-decoration:none;color:var(--ink2);font-size:0.85rem;transition:all 0.15s;margin-bottom:2px}
.sidebar-link:hover{background:var(--bg2);color:var(--ink)}
.sidebar-link.active{background:var(--gold-bg);color:var(--gold);font-weight:500}
.main{margin-left:240px;padding:2rem 2.5rem;flex:1}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3);margin-bottom:2rem}
.proposal-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.5rem;margin-bottom:1rem}
.proposal-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.75rem}
.proposal-job{font-size:1rem;font-weight:600;color:var(--ink);text-decoration:none}
.proposal-job:hover{color:var(--gold)}
.badge{font-size:0.7rem;font-weight:500;padding:4px 10px;border-radius:100px}
.badge-pending{background:var(--gold-bg);color:var(--gold)}
.badge-accepted{background:var(--teal-bg);color:var(--teal)}
.badge-rejected{background:var(--red-bg);color:var(--red)}
.proposal-meta{display:flex;gap:1.5rem;font-size:0.8rem;color:var(--ink3);margin-bottom:0.75rem}
.proposal-letter{font-size:0.85rem;color:var(--ink2);line-height:1.65;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.empty-state{text-align:center;padding:4rem;color:var(--ink3)}
.empty-state h3{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--ink);margin-bottom:0.5rem}
.empty-state a{color:var(--gold);text-decoration:none}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <a href="{{ route('jobs.index') }}" class="btn-sm btn-outline">Find Jobs</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-sm btn-outline">Logout</button>
        </form>
    </div>
</div>

<div class="layout">
    <aside class="sidebar">
        <div class="sidebar-section">
            <span class="sidebar-label">Main</span>
            <a href="{{ route('freelancer.dashboard') }}" class="sidebar-link">◆ Dashboard</a>
            <a href="{{ route('jobs.index') }}" class="sidebar-link">◆ Find Jobs</a>
            <a href="{{ route('proposals.my') }}" class="sidebar-link active">◆ My Proposals</a>
            <a href="#" class="sidebar-link">◆ Active Work</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Finance</span>
            <a href="#" class="sidebar-link">◆ Earnings</a>
            <a href="#" class="sidebar-link">◆ Withdrawals</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Account</span>
            <a href="#" class="sidebar-link">◆ My Profile</a>
            <a href="#" class="sidebar-link">◆ Settings</a>
        </div>
    </aside>

    <main class="main">
        <div class="page-title">My Proposals</div>
        <div class="page-sub">Track all the proposals you have submitted.</div>

        @if($proposals->count() > 0)
            @foreach($proposals as $proposal)
            <div class="proposal-card">
                <div class="proposal-header">
                    <a href="{{ route('jobs.show', $proposal->job) }}" class="proposal-job">{{ $proposal->job->title }}</a>
                    <span class="badge badge-{{ $proposal->status }}">{{ ucfirst($proposal->status) }}</span>
                </div>
                <div class="proposal-meta">
                    <span>💰 {{ $proposal->currency }} {{ number_format($proposal->bid_amount) }}</span>
                    <span>📅 {{ $proposal->delivery_days }} days delivery</span>
                    <span>🕐 Submitted {{ $proposal->created_at->diffForHumans() }}</span>
                </div>
                <div class="proposal-letter">{{ $proposal->cover_letter }}</div>
            </div>
            @endforeach
        @else
            <div class="empty-state">
                <h3>No proposals yet</h3>
                <p>You haven't submitted any proposals yet. <a href="{{ route('jobs.index') }}">Find jobs →</a></p>
            </div>
        @endif
    </main>
</div>

</body>
</html>