<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Client Dashboard</title>
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
.btn-gold{background:var(--gold);color:#fff;cursor:pointer}
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
.card{background:#fff;border:1px solid var(--border);border-radius:10px;padding:1.5rem;margin-bottom:1rem}
.card-title{font-size:0.9rem;font-weight:600;color:var(--ink);margin-bottom:1.2rem;display:flex;justify-content:space-between;align-items:center}
.card-title a{font-size:0.75rem;color:var(--gold);text-decoration:none;font-weight:400}
.empty-state{text-align:center;padding:2rem;color:var(--ink3);font-size:0.85rem}
.post-job-btn{background:var(--gold);color:#fff;padding:0.7rem 1.5rem;border-radius:5px;border:none;font-size:0.87rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;text-decoration:none;display:inline-block;margin-top:1rem}
.post-job-btn:hover{background:#d4980f}
.talent-item{padding:0.9rem 0;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center}
.talent-item:last-child{border-bottom:none;padding-bottom:0}
.talent-name{font-size:0.87rem;font-weight:500;color:var(--ink);margin-bottom:3px}
.talent-role{font-size:0.75rem;color:var(--ink3)}
.talent-match{font-size:0.75rem;color:var(--teal);font-weight:500}
.tip-list{list-style:none}
.tip-item{display:flex;align-items:flex-start;gap:10px;padding:0.65rem 0;border-bottom:1px solid var(--border);font-size:0.83rem;color:var(--ink2);line-height:1.5}
.tip-item:last-child{border-bottom:none}
.tip-num{width:20px;height:20px;border-radius:50%;background:var(--gold-bg);color:var(--gold);display:flex;align-items:center;justify-content:center;font-size:0.7rem;font-weight:600;flex-shrink:0;margin-top:1px}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <span class="topbar-name">Welcome, <strong>{{ $user->name }}</strong></span>
        <a href="#" class="btn-sm btn-gold">Post a Job</a>
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
            <a href="{{ route('jobs.create') }}" class="sidebar-link"><span class="sidebar-icon">◆</span> Post a Job</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> My Jobs</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Proposals</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Find Talent</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Finance</span>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Payments</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Invoices</a>
        </div>
        <div class="sidebar-section">
            <span class="sidebar-label">Account</span>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Company Profile</a>
            <a href="#" class="sidebar-link"><span class="sidebar-icon">◆</span> Settings</a>
        </div>
    </aside>

    <main class="main">
        <div class="page-title">Welcome to AfriLance, {{ explode(' ', $user->name)[0] }} 👋</div>
        <div class="page-sub">Find Africa's best talent for your next project.</div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Active Jobs</div>
                <div class="stat-value teal">0</div>
                <div class="stat-change">Post your first job</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Proposals</div>
                <div class="stat-value">0</div>
                <div class="stat-change">Proposals received</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Hired Freelancers</div>
                <div class="stat-value gold">0</div>
                <div class="stat-change">Start hiring today</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Spent</div>
                <div class="stat-value">KSh 0</div>
                <div class="stat-change">No payments yet</div>
            </div>
        </div>

        <div class="grid-2">
            <div class="card">
                <div class="card-title">My Posted Jobs <a href="#">View all</a></div>
                <div class="empty-state">
                    You haven't posted any jobs yet.<br>
                    <a href="#" class="post-job-btn">Post your first job</a>
                </div>
            </div>

            <div class="card">
                <div class="card-title">AI Matched Talent <a href="#">View all</a></div>
                <div class="talent-item">
                    <div>
                        <div class="talent-name">Amara Osei</div>
                        <div class="talent-role">Full-stack Developer · Ghana</div>
                    </div>
                    <div class="talent-match">94% match</div>
                </div>
                <div class="talent-item">
                    <div>
                        <div class="talent-name">Fatima Al-Rashid</div>
                        <div class="talent-role">UI/UX Designer · Morocco</div>
                    </div>
                    <div class="talent-match">91% match</div>
                </div>
                <div class="talent-item">
                    <div>
                        <div class="talent-name">Kwame Mensah</div>
                        <div class="talent-role">Mobile Developer · Nigeria</div>
                    </div>
                    <div class="talent-match">88% match</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-title">How to get started</div>
            <ul class="tip-list">
                <li class="tip-item"><div class="tip-num">1</div> Post a job with your requirements, budget, and deadline.</li>
                <li class="tip-item"><div class="tip-num">2</div> Our AI matches you with the best African freelancers for your project.</li>
                <li class="tip-item"><div class="tip-num">3</div> Review proposals and hire the right person in minutes.</li>
                <li class="tip-item"><div class="tip-num">4</div> Pay securely through escrow — funds release when you approve the work.</li>
            </ul>
        </div>
    </main>
</div>

</body>
</html>