<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — {{ $job->title }}</title>
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
.main{margin-top:85px;padding:2.5rem;max-width:900px;margin-left:auto;margin-right:auto}
.back-link{font-size:0.85rem;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:5px;margin-bottom:1.5rem}
.back-link:hover{text-decoration:underline}
.layout{display:grid;grid-template-columns:1fr 320px;gap:1.5rem;align-items:start}
.card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:2rem;margin-bottom:1.2rem}
.job-title{font-family:'Playfair Display',serif;font-size:1.6rem;font-weight:700;color:var(--ink);margin-bottom:0.5rem}
.job-meta-row{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:1.5rem}
.job-tag{background:var(--bg2);border:1px solid var(--border);border-radius:100px;padding:4px 12px;font-size:0.75rem;color:var(--ink2)}
.job-tag.gold{background:var(--gold-bg);color:var(--gold);border-color:rgba(181,128,14,0.2)}
.section-title{font-size:0.85rem;font-weight:600;color:var(--ink);margin-bottom:0.75rem;margin-top:1.5rem}
.section-title:first-child{margin-top:0}
.job-desc{font-size:0.9rem;color:var(--ink2);line-height:1.8}
.skills-wrap{display:flex;flex-wrap:wrap;gap:8px;margin-top:0.5rem}
.skill-pill{background:var(--teal-bg);color:var(--teal);border-radius:100px;padding:4px 12px;font-size:0.78rem;font-weight:500}
.budget-box{background:var(--gold-bg);border:1px solid rgba(181,128,14,0.2);border-radius:10px;padding:1.2rem;margin-bottom:1.2rem}
.budget-label{font-size:0.72rem;color:var(--gold);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:4px;font-weight:600}
.budget-val{font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--gold);font-weight:700}
.info-row{display:flex;justify-content:space-between;align-items:center;padding:0.65rem 0;border-bottom:1px solid var(--border);font-size:0.83rem}
.info-row:last-child{border-bottom:none}
.info-label{color:var(--ink3)}
.info-val{color:var(--ink);font-weight:500}
.btn-apply{width:100%;padding:0.9rem;background:var(--ink);color:#fff;border:none;border-radius:6px;font-size:0.9rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s;text-align:center;display:block;text-decoration:none;margin-top:1rem}
.btn-apply:hover{background:var(--gold)}
.client-box{display:flex;align-items:center;gap:10px;margin-bottom:1rem}
.client-avatar{width:40px;height:40px;border-radius:50%;background:var(--teal);display:flex;align-items:center;justify-content:center;font-size:0.85rem;font-weight:600;color:#fff}
.client-name{font-size:0.88rem;font-weight:500;color:var(--ink)}
.client-label{font-size:0.72rem;color:var(--ink3)}
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
    <a href="{{ route('jobs.index') }}" class="back-link">← Back to jobs</a>

    <div class="layout">
        <div>
            <div class="card">
                <div class="job-title">{{ $job->title }}</div>
                <div class="job-meta-row">
                    <span class="job-tag gold">{{ $job->category }}</span>
                    <span class="job-tag">{{ $job->location }}</span>
                    <span class="job-tag">Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</span>
                </div>

                <div class="section-title">About this job</div>
                <div class="job-desc">{{ $job->description }}</div>

                <div class="section-title">Skills required</div>
                <div class="skills-wrap">
                    @foreach(explode(',', $job->skills_required) as $skill)
                        <span class="skill-pill">{{ trim($skill) }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div>
            <div class="budget-box">
                <div class="budget-label">Budget</div>
                <div class="budget-val">KSh {{ number_format($job->budget_min) }} — {{ number_format($job->budget_max) }}</div>
            </div>

            <div class="card">
                <div class="client-box">
                    <div class="client-avatar">{{ strtoupper(substr($job->client->name, 0, 2)) }}</div>
                    <div>
                        <div class="client-name">{{ $job->client->name }}</div>
                        <div class="client-label">Client</div>
                    </div>
                </div>

                <div class="info-row">
                    <span class="info-label">Category</span>
                    <span class="info-val">{{ $job->category }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Location</span>
                    <span class="info-val">{{ $job->location }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Deadline</span>
                    <span class="info-val">{{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status</span>
                    <span class="info-val">{{ ucfirst($job->status) }}</span>
                </div>

                <
            </div>a href="{{ route('proposals.create', $job) }}" class="btn-apply">Submit a Proposal →</a>
        </div>
    </div>
</div>

</body>
</html>