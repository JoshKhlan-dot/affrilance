<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Job Proposals</title>
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
.main{margin-top:85px;padding:2.5rem;max-width:900px;margin-left:auto;margin-right:auto}
.back-link{font-size:0.85rem;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:5px;margin-bottom:1.5rem}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3);margin-bottom:2rem}
.proposals-list{display:grid;gap:1rem}
.pcard{background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.5rem}
.pcard-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1rem}
.freelancer-info{display:flex;align-items:center;gap:10px}
.avatar{width:40px;height:40px;border-radius:50%;background:var(--teal);display:flex;align-items:center;justify-content:center;font-size:0.85rem;font-weight:600;color:#fff}
.freelancer-name{font-size:0.95rem;font-weight:600;color:var(--ink)}
.freelancer-email{font-size:0.75rem;color:var(--ink3)}
.badge{font-size:0.68rem;font-weight:500;padding:3px 10px;border-radius:100px}
.badge-pending{background:var(--gold-bg);color:var(--gold)}
.badge-accepted{background:var(--teal-bg);color:var(--teal)}
.badge-rejected{background:var(--red-bg);color:var(--red)}
.pcard-bid{font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--gold);margin-bottom:0.75rem}
.pcard-letter{font-size:0.88rem;color:var(--ink2);line-height:1.75;margin-bottom:1rem}
.pcard-meta{font-size:0.75rem;color:var(--ink3);margin-bottom:1rem}
.action-row{display:flex;gap:8px}
.btn-accept{background:var(--teal);color:#fff;padding:0.5rem 1.2rem;border-radius:5px;border:none;font-size:0.8rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif}
.btn-accept:hover{background:var(--teal2)}
.btn-reject{background:transparent;border:1px solid var(--red);color:var(--red);padding:0.5rem 1.2rem;border-radius:5px;font-size:0.8rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif}
.btn-reject:hover{background:var(--red-bg)}
.empty-state{text-align:center;padding:4rem;color:var(--ink3)}
.empty-state h3{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--ink);margin-bottom:0.5rem}
.success{background:var(--teal-bg);border:1px solid rgba(23,107,85,0.2);color:var(--teal);padding:0.75rem 1rem;border-radius:6px;font-size:0.85rem;margin-bottom:1.5rem}
</style>
</head>
<body>

<div class="topbar">
    <a href="/" class="logo">Afri<span>Lance</span></a>
    <div class="topbar-right">
        <a href="{{ route('client.dashboard') }}" class="btn-sm btn-outline">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-sm btn-outline">Logout</button>
        </form>
    </div>
</div>

<div class="main">
    <a href="{{ route('client.dashboard') }}" class="back-link">← Back to dashboard</a>

    <div class="page-title">Proposals for: {{ $job->title }}</div>
    <div class="page-sub">{{ $proposals->count() }} proposal(s) received</div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($proposals->count() > 0)
        <div class="proposals-list">
            @foreach($proposals as $proposal)
            <div class="pcard">
                <div class="pcard-header">
                    <div class="freelancer-info">
                        <div class="avatar">{{ strtoupper(substr($proposal->freelancer->name, 0, 2)) }}</div>
                        <div>
                            <div class="freelancer-name">{{ $proposal->freelancer->name }}</div>
                            <div class="freelancer-email">{{ $proposal->freelancer->email }}</div>
                        </div>
                    </div>
                    <span class="badge badge-{{ $proposal->status }}">{{ ucfirst($proposal->status) }}</span>
                </div>

                <div class="pcard-bid">{{ $proposal->currency }} {{ number_format($proposal->bid_amount) }}</div>
                <div class="pcard-letter">{{ $proposal->cover_letter }}</div>
                <div class="pcard-meta">
                    Delivery: {{ $proposal->delivery_days }} days ·
                    Submitted: {{ $proposal->created_at->format('M d, Y') }}
                </div>

                @if($proposal->status === 'pending')
                <div class="action-row">
                    <form method="POST" action="{{ route('proposals.status', $proposal) }}">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="btn-accept">✓ Accept Proposal</button>
                    </form>
                    <form method="POST" action="{{ route('proposals.status', $proposal) }}">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn-reject">✕ Reject</button>
                    </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <h3>No proposals yet</h3>
            <p>Freelancers haven't submitted proposals for this job yet. Check back soon.</p>
        </div>
    @endif
</div>

</body>
</html>