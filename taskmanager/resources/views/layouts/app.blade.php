<style>
    :root {
        --paper: #FAF7F0;
        --ink: #232323;
        --ink-soft: #6B6558;
        --line: #DDD6C7;
        --amber: #D98E2B;
        --sage: #5C7A5C;
        --sage-bg: #E8EFE6;
        --clay: #B5533C;
        --clay-bg: #F5E6E1;
        --navy: #232B3A;
    }
    * { box-sizing: border-box; }
    body {
        font-family: 'Inter', sans-serif;
        background: var(--paper);
        color: var(--ink);
        margin: 0;
        line-height: 1.5;
    }
    .hero {
        background: var(--navy);
        padding: 48px 24px 40px;
        margin-bottom: 40px;
    }
    .hero-inner { max-width: 680px; margin: 0 auto; }
    .hero h1 {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 36px;
        color: var(--paper);
        margin: 0 0 6px;
        letter-spacing: -0.01em;
    }
    .hero .tagline {
        color: #A9AEBD;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 500;
    }
    .page { max-width: 680px; margin: 0 auto; padding: 0 24px 80px; }

    .btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        font-family: inherit;
    }
    .btn-add { background: var(--amber); color: #fff; }
    .btn-add:hover { background: #C27F22; }
    .btn-ghost { background: transparent; color: var(--ink); border: 1px solid var(--line); }
    .btn-ghost:hover { border-color: var(--ink-soft); }
    .btn-delete { background: transparent; color: var(--clay); border: 1px solid var(--clay-bg); padding: 6px 12px; font-size: 13px; }
    .btn-delete:hover { background: var(--clay-bg); }

    .alert {
        padding: 12px 16px;
        background: var(--sage-bg);
        color: var(--sage);
        border-radius: 6px;
        font-size: 14px;
        margin-bottom: 24px;
    }

    form.inline { display: inline; }

    input, textarea, select {
        width: 100%;
        padding: 10px 12px;
        margin: 6px 0 18px;
        border: 1px solid var(--line);
        border-radius: 6px;
        font-family: inherit;
        font-size: 15px;
        background: #fff;
        color: var(--ink);
    }
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: var(--amber);
    }
    label { font-size: 13px; font-weight: 600; color: var(--ink-soft); text-transform: uppercase; letter-spacing: 0.03em; }
</style>
</head>
<body>
    <div class="hero">
        <div class="hero-inner">
            <h1>Task Manager</h1>
            <div class="tagline">Your personal list, kept in order</div>
        </div>
    </div>

    <div class="page">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>