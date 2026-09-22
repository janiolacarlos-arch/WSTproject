<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0A0A0F;
            --glow: rgba(255,59,59,0.18);
            --glass: rgba(255,255,255,0.045);
            --glass-border: rgba(255,255,255,0.08);
            --red: #FF3B3B;
            --red-soft: rgba(255,59,59,0.35);
            --text: #E8E8ED;
            --muted: #9A9AA5;
            --green: #4ADE80;
            --amber: #FBBF24;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            /* Radial glow behind everything, dark base */
            background:
                radial-gradient(circle at 20% 0%, var(--glow), transparent 40%),
                radial-gradient(circle at 90% 30%, rgba(255,59,59,0.1), transparent 35%),
                var(--bg);
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: var(--text);
            min-height: 100vh;
        }

        nav {
            padding: 22px 36px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: -0.01em;
            border-bottom: 1px solid var(--glass-border);
            background: rgba(255,255,255,0.02);
            backdrop-filter: blur(12px);
        }
        nav span { color: var(--red); }

        .container {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 20px 40px;
        }

        /* Glass card: translucent panel with blur and a thin red border */
        .card {
            background: var(--glass);
            border: 1px solid var(--red-soft);
            border-radius: 16px;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow: 0 0 0 1px rgba(255,59,59,0.05), 0 8px 30px rgba(0,0,0,0.4);
            padding: 24px 26px;
            margin-bottom: 22px;
        }

        .card h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 18px;
            margin: 0 0 4px;
            color: var(--text);
        }

        table { width: 100%; border-collapse: collapse; }
        th, td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid var(--glass-border);
            font-size: 14px;
        }
        th {
            color: var(--muted);
            font-weight: 500;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        tr:hover td { background: rgba(255,59,59,0.04); }

        .btn {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            border: 1px solid var(--glass-border);
            cursor: pointer;
            background: rgba(255,255,255,0.03);
            color: var(--text);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        .btn:hover { border-color: var(--red-soft); box-shadow: 0 0 0 3px rgba(255,59,59,0.08); }

        .btn-primary { background: var(--red); color: #fff; border-color: var(--red); }
        .btn-primary:hover { box-shadow: 0 0 0 3px rgba(255,59,59,0.25); }
        .btn-delete { color: var(--red); border-color: var(--red-soft); }
        .btn-status { color: var(--green); border-color: rgba(74,222,128,0.3); }
        .btn-edit { color: var(--amber); border-color: rgba(251,191,36,0.3); }

        .status-pending { color: var(--amber); font-weight: 600; }
        .status-completed { color: var(--green); font-weight: 600; }

        form.inline { display: inline; }

        input[type=text], textarea, input[type=date], select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 4px;
            margin-bottom: 16px;
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            background: rgba(255,255,255,0.03);
            color: var(--text);
        }
        input::placeholder, textarea::placeholder { color: var(--muted); }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(255,59,59,0.15);
        }
        select option { background: #16161C; color: var(--text); }

        label { font-weight: 600; font-size: 13px; color: var(--muted); }

        .alert-success {
            background: rgba(74,222,128,0.08);
            border: 1px solid rgba(74,222,128,0.3);
            color: var(--green);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-weight: 500;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav>Task<span>Manager</span></nav>
    <div class="container">
        {{-- Flash message shown after add/edit/delete/status actions --}}
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        {{-- Page-specific content goes here --}}
        @yield('content')
    </div>
</body>
</html>