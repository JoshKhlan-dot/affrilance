<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Post a Job</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ink:#111210;--ink2:#3d3d3a;--ink3:#888882;--gold:#b5800e;--gold-bg:#fdf6e7;--teal:#176b55;--teal2:#1d9e75;--bg:#ffffff;--bg2:#f8f6f2;--border:#e5e0d8}
body{font-family:'Inter',sans-serif;background:var(--bg2);color:var(--ink)}
.topbar{background:#fff;border-bottom:1px solid var(--border);padding:1rem 2.5rem;display:flex;align-items:center;justify-content:space-between;position:fixed;top:0;left:0;right:0;z-index:100}
.logo{font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:900;color:var(--ink);text-decoration:none}
.logo span{color:var(--gold)}
.topbar-right{display:flex;align-items:center;gap:1.5rem}
.btn-sm{padding:0.5rem 1.1rem;border-radius:5px;font-size:0.8rem;font-weight:500;text-decoration:none;border:none;cursor:pointer;font-family:'Inter',sans-serif}
.btn-outline{background:transparent;border:1px solid var(--border);color:var(--ink2)}
.main{margin-top:61px;padding:2.5rem;max-width:750px;margin-left:auto;margin-right:auto}
.page-title{font-family:'Playfair Display',serif;font-size:1.7rem;font-weight:700;color:var(--ink);margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--ink3);margin-bottom:2rem}
.card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:2rem;margin-bottom:1.2rem}
.card-title{font-size:0.9rem;font-weight:600;color:var(--ink);margin-bottom:1.2rem;padding-bottom:0.8rem;border-bottom:1px solid var(--border)}
.form-group{margin-bottom:1.2rem}
label{display:block;font-size:0.8rem;font-weight:500;color:var(--ink2);margin-bottom:0.4rem}
input[type=text],input[type=number],input[type=date],select,textarea{width:100%;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:6px;font-size:0.88rem;font-family:'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color 0.2s;background:#fff}
input:focus,select:focus,textarea:focus{border-color:var(--gold)}
textarea{resize:vertical;min-height:120px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.error{font-size:0.75rem;color:#c94a2a;margin-top:4px}
.hint{font-size:0.75rem;color:var(--ink3);margin-top:4px}
.btn-submit{background:var(--ink);color:#fff;padding:0.9rem 2rem;border-radius:6px;border:none;font-size:0.9rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s}
.btn-submit:hover{background:var(--gold)}
.success{background:#eaf5f0;border:1px solid rgba(23,107,85,0.2);color:#176b55;padding:0.75rem 1rem;border-radius:6px;font-size:0.85rem;margin-bottom:1.5rem}
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

<div class="main" style="margin-top:85px">
    <div class="page-title">Post a Job</div>
    <div class="page-sub">Find the perfect African talent for your project.</div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <div class="card">
            <div class="card-title">Job Details</div>

            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Build a Laravel e-commerce website" required>
                @error('title')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Design">Design & Creative</option>
                    <option value="Writing">Writing & Content</option>
                    <option value="Marketing">Digital Marketing</option>
                    <option value="Data Science">Data Science & AI</option>
                    <option value="Finance">Finance & Accounting</option>
                    <option value="Other">Other</option>
                </select>
                @error('category')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea id="description" name="description" placeholder="Describe the job in detail — what needs to be done, what the deliverables are, and any specific requirements..." required>{{ old('description') }}</textarea>
                @error('description')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="skills_required">Skills Required</label>
                <input type="text" id="skills_required" name="skills_required" value="{{ old('skills_required') }}" placeholder="e.g. Laravel, PHP, MySQL, Vue.js">
                <div class="hint">Separate skills with commas</div>
                @error('skills_required')<div class="error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="card">
            <div class="card-title">Budget & Timeline</div>

            <div class="form-row">
                <div class="form-group">
                    <label for="budget_min">Minimum Budget (KSh)</label>
                    <input type="number" id="budget_min" name="budget_min" value="{{ old('budget_min') }}" placeholder="5000" required>
                    @error('budget_min')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="budget_max">Maximum Budget (KSh)</label>
                    <input type="number" id="budget_max" name="budget_max" value="{{ old('budget_max') }}" placeholder="20000" required>
                    @error('budget_max')<div class="error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="deadline">Project Deadline</label>
                    <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}" required>
                    @error('deadline')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="Remote">Remote</option>
                        <option value="Nairobi">Nairobi, Kenya</option>
                        <option value="Lagos">Lagos, Nigeria</option>
                        <option value="Accra">Accra, Ghana</option>
                        <option value="Cairo">Cairo, Egypt</option>
                        <option value="Cape Town">Cape Town, South Africa</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-submit">Post Job on AfriLance →</button>
    </form>
</div>

</body>
</html>