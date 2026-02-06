<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'php-project')</title>

    <style>
        :root{
            /* Background + surfaces */
            --bg0: #07050b;
            --bg1: #0c0714;
            --surface: rgba(18, 12, 28, 0.72);
            --surface-2: rgba(24, 16, 36, 0.70);

            /* Text */
            --text: #f2f2f2;
            --muted: rgba(242, 242, 242, 0.72);
            --muted-2: rgba(242, 242, 242, 0.55);

            /* Borders + shadows */
            --border: rgba(255, 255, 255, 0.10);
            --border-2: rgba(255, 255, 255, 0.14);
            --shadow: 0 18px 50px rgba(0, 0, 0, 0.55);

            /* Accents (RED THEME) */
            --r1: #ef4444;   /* red */
            --r2: #dc2626;   /* darker red */
            --r3: #fb7185;   /* soft pink-red highlight */
            --danger: #ef4444;

            --radius: 18px;
        }

        *{ box-sizing: border-box; }
        html, body { height: 100%; }

        body{
            margin:0;
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Liberation Sans", sans-serif;
            color: var(--text);
            background:
                radial-gradient(900px 520px at 18% 10%, rgba(239,68,68,0.22), transparent 60%),
                radial-gradient(980px 560px at 85% 18%, rgba(220,38,38,0.18), transparent 60%),
                radial-gradient(900px 520px at 50% 95%, rgba(251,113,133,0.10), transparent 62%),
                linear-gradient(180deg, var(--bg0), var(--bg1));
        }

        /* Help browsers use dark UI for native controls */
        :root { color-scheme: dark; }

        a{ color: inherit; text-decoration: none; }
        a:hover{ text-decoration: underline; }

        .container{
            max-width: 1050px;
            margin: 0 auto;
            padding: 0 18px;
        }

        /* Top bar */
        header{
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            background: rgba(8, 6, 14, 0.58);
            border-bottom: 1px solid var(--border);
        }

        .nav{
            height: 68px;
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap: 12px;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .logo{
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background:
                radial-gradient(16px 16px at 30% 30%, rgba(255,255,255,0.22), transparent 60%),
                linear-gradient(135deg, rgba(239,68,68,0.95), rgba(220,38,38,0.95));
            box-shadow: 0 14px 34px rgba(239,68,68,0.18), 0 10px 20px rgba(220,38,38,0.14);
            border: 1px solid rgba(255,255,255,0.18);
        }

        .navlinks{
            display:flex;
            align-items:center;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.04);
            color: var(--text);
            box-shadow: 0 10px 24px rgba(0,0,0,0.35);
            transition: transform .08s ease, border-color .08s ease, background .08s ease;
            font-size: 14px;
            cursor: pointer;
        }
        .btn:hover{
            transform: translateY(-1px);
            border-color: rgba(255,255,255,0.18);
            background: rgba(255,255,255,0.06);
            text-decoration:none;
        }

        .btn-primary{
            border-color: rgba(239,68,68,0.38);
            background: linear-gradient(135deg, rgba(239,68,68,0.92), rgba(220,38,38,0.92));
        }
        .btn-primary:hover{
            border-color: rgba(239,68,68,0.55);
            background: linear-gradient(135deg, rgba(239,68,68,0.98), rgba(220,38,38,0.98));
        }

        .btn-danger{
            border-color: rgba(239,68,68,0.35);
            background: rgba(239,68,68,0.12);
            color: rgba(255, 220, 220, 0.95);
        }

        /* Main */
        main{ padding: 22px 0 44px; }

        /* Cards */
        .card{
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header{
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 12px;
            background: linear-gradient(180deg, rgba(255,255,255,0.04), transparent);
        }

        .card-body{ padding: 18px; }

        h1{ margin: 0 0 10px; letter-spacing: -0.02em; }
        p{ margin: 0 0 12px; color: var(--muted); }

        /* Flash / errors */
        .flash{
            padding: 12px 14px;
            border-radius: 14px;
            background: rgba(34,197,94,0.10);
            border: 1px solid rgba(34,197,94,0.28);
            margin-bottom: 16px;
        }

        .error{
            padding: 12px 14px;
            border-radius: 14px;
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.30);
            margin-bottom: 16px;
        }
        .error ul{ margin: 8px 0 0; color: rgba(255,255,255,0.90); }

        /* Table */
        table{
            width:100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.02);
        }

        thead th{
            text-align:left;
            font-size: 12px;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--muted-2);
            padding: 12px 14px;
            border-bottom: 1px solid var(--border);
            background: rgba(255,255,255,0.03);
        }

        tbody td{
            padding: 12px 14px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            vertical-align: middle;
            color: rgba(242,242,242,0.92);
        }

        tbody tr:hover{
            background: rgba(239,68,68,0.06);
        }

        /* Forms */
        .form-grid{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }
        .field{ display:flex; flex-direction: column; gap: 6px; }
        label{ font-size: 13px; color: var(--muted); }

        input, select, textarea{
            width: 100%;
            padding: 10px 12px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.04);
            color: var(--text);
            outline: none;
        }

        input::placeholder, textarea::placeholder{
            color: rgba(242,242,242,0.45);
        }

        input:focus, select:focus, textarea:focus{
            border-color: rgba(239,68,68,0.55);
            box-shadow: 0 0 0 4px rgba(239,68,68,0.14);
        }

        /* IMPORTANT: fix select dropdown options (Windows/Chrome can be weird) */
        select{
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, rgba(242,242,242,0.75) 50%),
                linear-gradient(135deg, rgba(242,242,242,0.75) 50%, transparent 50%);
            background-position:
                calc(100% - 18px) 55%,
                calc(100% - 12px) 55%;
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
            padding-right: 34px;
        }

        /* Some browsers ignore option styles, but this helps a lot */
        option{
            background-color: #0b0812;
            color: var(--text);
        }

        .actions{
            display:flex;
            gap: 10px;
            align-items:center;
            justify-content:flex-end;
            margin-top: 14px;
        }

        .hint{
            color: var(--muted-2);
            font-size: 13px;
        }

        @media (max-width: 780px){
            .form-grid{ grid-template-columns: 1fr; }
            .nav{ height:auto; padding: 12px 0; flex-direction: column; align-items:flex-start; }
            .navlinks{ width:100%; justify-content:flex-start; }
        }
    </style>
</head>

<body>
<header>
    <div class="container">
        <div class="nav">
            <div class="brand">
                <div class="logo"></div>
                <a href="{{ url('/') }}">php-project</a>
            </div>

            <div class="navlinks">
                <a class="btn" href="{{ url('/') }}">Home</a>
                <a class="btn" href="{{ route('books.index') }}">Books</a>
                <a class="btn btn-primary" href="{{ route('books.create') }}">Add book</a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</main>
</body>
</html>
