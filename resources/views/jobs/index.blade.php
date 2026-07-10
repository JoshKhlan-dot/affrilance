<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Find Jobs</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--teal-bg:#eaf5f0;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8}
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
.page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2rem}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3)}
.search-bar{display:flex;gap:10px;margin-bottom:1.5rem}
.search-bar input{flex:1;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none}
.search-bar input:focus{border-color:var(--gold)}
.search-bar select{padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none;background:#fff}
.btn-search{background:var(--ink);color:#fff;padding:0.75rem 1.5rem;border-radius:6px;border:none;font-size:0.88rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif}
.btn-search:hover{background:var(--gold)}
.jobs-grid{display:grid;gap:1rem}
.job-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.5rem;transition:border-color 0.2s,box-shadow 0.2s;text-decoration:none;display:block;color:inherit}
.job-card:hover{border-color:rgba(181,128,14,0.3);box-shadow:0 3px 16px rgba(17,18,16,0.06)}
.job-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.75rem}
.job-title{font-size:1rem;font-weight:600;color:var(--ink);margin-bottom:4px}
.job-client{font-size:0.78rem;color:var(--ink3)}
.job-budget{font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--gold);font-weight:700}
.job-desc{font-size:0.85rem;color:var(--ink2);line-height:1.65;margin-bottom:1rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.job-footer{display:flex;align-items:center;gap:1rem;flex-wrap:wrap}
.job-tag{background:var(--bg2);border:1px solid var(--border);border-radius:100px;padding:3px 10px;font-size:0.72rem;color:var(--ink2)}
.job-meta{font-size:0.75rem;color:var(--ink3);margin-left:auto}
.empty-state{text-align:center;padding:4rem;color:var(--ink3)}
.empty-state h3{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--ink);margin-bottom:0.5rem}
.pagination{display:flex;justify-content:center;gap:8px;margin-top:2rem}
.pagination a,.pagination span{padding:6px 12px;border:1px solid var(--border);border-radius:5px;font-size:0.82rem;color:var(--ink2);text-decoration:none}
.pagination .active{background:var(--gold);color:#fff;border-color:var(--gold)}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <a href="{{ route('freelancer.dashboard') }}" class="btn-sm btn-outline">Dashboard</a>
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
            <a href="{{ route('jobs.index') }}" class="sidebar-link active">◆ Find Jobs</a>
            <a href="#" class="sidebar-link">◆ My Proposals</a>
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
        <div class="page-header">
            <div>
                <div class="page-title">Find Jobs</div>
                <div class="page-sub">{{ $jobs->total() }} jobs available right now</div>
            </div>
        </div>

        <form method="GET" action="{{ route('jobs.index') }}" class="search-bar">
            <input type="text" name="search" placeholder="Search jobs by title or skill..." value="{{ request('search') }}">
            <select name="category">
                <option value="">All categories</option>
                <option value="Web Development">Web Development</option>
                <option value="Design">Design</option>
                <option value="Mobile Development">Mobile Development</option>
                <option value="Writing">Writing</option>
                <option value="Marketing">Marketing</option>
                <option value="Data Science">Data Science</option>
            </select>
            <button type="submit" class="btn-search">Search</button>
        </form>

        @if($jobs->count() > 0)
            <div class="jobs-grid">
                @foreach($jobs as $job)
                <a href="{{ route('jobs.show', $job) }}" class="job-card">
                    <div class="job-header">
                        <div>
                            <div class="job-title">{{ $job->title }}</div>
                            <div class="job-client">Posted by {{ $job->client->name }}</div>
                        </div>
                        <div class="job-budget">KSh {{ number_format($job->budget_min) }} — {{ number_format($job->budget_max) }}</div>
                    </div>
                    <div class="job-desc">{{ $job->description }}</div>
                    <div class="job-footer">
                        <span class="job-tag">{{ $job->category }}</span>
                        <span class="job-tag">{{ $job->location }}</span>
                        @foreach(explode(',', $job->skills_required) as $skill)
                            <span class="job-tag">{{ trim($skill) }}</span>
                        @endforeach
                        <span class="job-meta">Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="pagination">{{ $jobs->links() }}</div>
        @else
            <div class="empty-state">
                <h3>No jobs found yet</h3>
                <p>Check back soon — clients are posting jobs every day.</p>
            </div>
        @endif
    </main>
</div>

</body>
</html>