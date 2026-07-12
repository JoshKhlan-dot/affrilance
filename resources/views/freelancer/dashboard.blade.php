<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Freelancer Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--teal-bg:#eaf5f0;--red:#c94a2a;--red-bg:#fdf0ec;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8}
body{font-family:'Inter',sans-serif;background:var(--bg2);color:var(--ink)}
.topbar{background:#fff;border-bottom:1px solid var(--border);padding:1rem 2.5rem;display:flex;align-items:center;justify-content:space-between;position:fixed;top:0;left:0;right:0;z-index:100}
.logo{font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:900;color:var(--ink);text-decoration:none}
.logo span{color:var(--gold)}
.topbar-right{display:flex;align-items:center;gap:1.5rem}
.topbar-name{font-size:0.85rem;color:var(--ink2)}
.topbar-name strong{color:var(--ink)}
.btn-sm{padding:0.5rem 1.1rem;border-radius:5px;font-size:0.8rem;font-weight:500;text-decoration:none;border:none;cursor:pointer;font-family:'Inter',sans-serif}
.btn-gold{background:var(--gold);color:#fff}
.btn-outline{background:transparent;border:1px solid var(--border);color:var(--ink2)}
.layout{display:flex;margin-top:61px;min-height:calc(100vh - 61px)}
.sidebar{width:240px;background:#fff;border-right:1px solid var(--border);padding:1.5rem 0;position:fixed;top:61px;bottom:0;overflow-y:auto}
.sidebar-section{padding:0 1rem;margin-bottom:1.5rem}
.sidebar-label{font-size:0.65rem;font-weight:600;color:var(--ink3);text-transform:uppercase;letter-spacing:0.08em;padding:0 0.75rem;margin-bottom:0.5rem;display:block}
.sidebar-link{display:flex;align-items:center;gap:10px;padding:0.6rem 0.75rem;border-radius:7px;text-decoration:none;color:var(--ink2);font-size:0.85rem;transition:all 0.15s;margin-bottom:2px}
.sidebar-link:hover{background:var(--bg2);color:var(--ink)}
.sidebar-link.active{background:var(--gold-bg);color:var(--gold);font-weight:500}
.sidebar-icon{width:18px;text-align:center;font-size:0.9rem}
.main{margin-left:240px;padding:2rem 2.5rem;flex:1}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3);margin-bottom:2rem}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:2rem}
.stat-card{background:#fff;border:1px solid var(--border);border-radius:10px;padding:1.3rem 1.5rem}
.stat-label{font-size:0.72rem;color:var(--ink3);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.5rem}
.stat-value{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;color:var(--ink)}
.stat-value.gold{color:var(--gold)}
.stat-value.teal{color:var(--teal)}
.stat-change{font-size:0.72rem;color:var(--teal2);margin-top:4px}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
.card{background:#fff;border:1px solid var(--border);border-radius:10px;padding:1.5rem}
.card-title{font-size:0.9rem;font-weight:600;color:var(--ink);margin-bottom:1.2rem;display:flex;justify-content:space-between;align-items:center}
.card-title a{font-size:0.75rem;color:var(--gold);text-decoration:none;font-weight:400}
.job-item{padding:0.9rem 0;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:flex-start}
.job-item:last-child{border-bottom:none;padding-bottom:0}
.job-name{font-size:0.87rem;font-weight:500;color:var(--ink);margin-bottom:3px}
.job-meta{font-size:0.75rem;color:var(--ink3)}
.job-badge{font-size:0.68rem;font-weight:500;padding:3px 9px;border-radius:100px}
.badge-green{background:var(--teal-bg);color:var(--teal)}
.badge-gold{background:var(--gold-bg);color:var(--gold)}
.badge-red{background:var(--red-bg);color:var(--red)}
.empty-state{text-align:center;padding:2rem;color:var(--ink3);font-size:0.85rem}
.profile-completion{margin-bottom:1rem}
.progress-bar{height:6px;background:var(--bg2);border-radius:3px;overflow:hidden;margin:8px 0}
.progress-fill{height:100%;background:var(--gold);border-radius:3px}
.progress-label{display:flex;justify-content:space-between;font-size:0.75rem;color:var(--ink3)}
.action-list{list-style:none}
.action-item{display:flex;align-items:center;gap:10px;padding:0.65rem 0;border-bottom:1px solid var(--border);font-size:0.83rem;color:var(--ink2)}
.action-item:last-child{border-bottom:none}
.action-dot{width:7px;height:7px;border-radius:50%;background:var(--border);flex-shrink:0}
.action-dot.done{background:var(--teal2)}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <span class="topbar-name">Welcome back, <strong>{{ $user->name }}</strong></span>
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
            <a href="#" class="sidebar-link active"><span class="sidebar-icon">◆</span> Dashboard</a>
            <a href="{{ route('jobs.index') }}" class="sidebar-link"><span class="sidebar-icon">◆</span> Find Jobs</a>
            <a href="{{ route('proposals.my') }}" class="sidebar-link"><span class="sidebar-icon">◆</span> My Proposals</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Active Work</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Finance</span>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Earnings</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Withdrawals</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Account</span>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> My Profile</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Settings</a>
        </div>
    </aside>

    <main class="main">
        <div class="page-title">Good morning, {{ explode(' ', $user->name)[0] }} 👋</div>
        <div class="page-sub">Here's what's happening with your AfriLance account today.</div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Earnings</div>
                <div class="stat-value gold">KSh 0</div>
                <div class="stat-change">Start bidding to earn</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Active Jobs</div>
                <div class="stat-value teal">0</div>
                <div class="stat-change">No active jobs yet</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Proposals Sent</div>
                <div class="stat-value">0</div>
                <div class="stat-change">Send your first proposal</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Profile Views</div>
                <div class="stat-value">0</div>
                <div class="stat-change">Complete your profile</div>
            </div>
        </div>

        <div class="grid-2">
            <div class="card">
                <div class="card-title">Recent Jobs For You <a href="#">View all</a></div>
                <div class="empty-state">
                    No job matches yet.<br>Complete your profile to get matched.
                </div>
            </div>

            <div class="card">
                <div class="card-title">Profile Completion</div>
                <div class="profile-completion">
                    <div class="progress-label">
                        <span>Profile strength</span>
                        <span>20%</span>
                    </div>
                    <div class="progress-bar"><div class="progress-fill" style="width:20%"></div></div>
                </div>
                <ul class="action-list">
                    <li class="action-item"><span class="action-dot done"></span> Create account</li>
                    <li class="action-item"><span class="action-dot"></span> Add profile photo</li>
                    <li class="action-item"><span class="action-dot"></span> Add your skills</li>
                    <li class="action-item"><span class="action-dot"></span> Write a bio</li>
                    <li class="action-item"><span class="action-dot"></span> Add portfolio work</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-title">My Proposals <a href="#">View all</a></div>
            <div class="empty-state">
                You haven't sent any proposals yet.<br>Browse jobs and send your first proposal today.
            </div>
        </div>
    </main>
</div>

</body>
</html>