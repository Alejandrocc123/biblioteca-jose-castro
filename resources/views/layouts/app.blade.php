<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de José Alejandro</title>
    <style>
        :root {
            --bg: #0b0f19;
            --card: #131b2e;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --accent: #01fcfc;
            --danger: #ef4444;
            --success: #10b981;
            --border: #1e293b;
        }
        * { box-sizing: border-box; font-family: system-ui, -apple-system, sans-serif; }
        body { background-color: var(--bg); color: var(--text); margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
        header { background: var(--card); border-bottom: 1px solid var(--border); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        header h1 { margin: 0; font-size: 1.4rem; color: var(--accent); }
        nav a { color: var(--text); text-decoration: none; margin-left: 1.5rem; font-weight: 500; }
        nav a:hover { color: var(--accent); }
        main { flex: 1; max-width: 1000px; width: 100%; margin: 2rem auto; padding: 0 1rem; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; }
        .btn { background: var(--accent); color: #0b0f19; border: none; padding: 0.55rem 1rem; border-radius: 6px; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-block; font-size: 0.9rem; }
        .btn-outline { background: transparent; border: 1px solid var(--accent); color: var(--accent); }
        .btn-danger { background: var(--danger); color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 0.75rem; text-align: left; border-bottom: 1px solid var(--border); }
        th { color: var(--accent); }
        input, select { background: var(--bg); border: 1px solid var(--border); color: var(--text); padding: 0.55rem; border-radius: 6px; width: 100%; margin-top: 0.3rem; }
        .form-group { margin-bottom: 1rem; }
        .alert-ok { background: rgba(16, 185, 129, 0.15); border: 1px solid var(--success); color: var(--success); padding: 0.8rem; border-radius: 6px; margin-bottom: 1rem; }
        .alert-error { background: rgba(239, 68, 68, 0.15); border: 1px solid var(--danger); color: var(--danger); padding: 0.8rem; border-radius: 6px; margin-bottom: 1rem; }
        .error-text { color: var(--danger); font-size: 0.85rem; margin-top: 0.25rem; display: block; }
        .badge { padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem; font-weight: 600; }
        .badge-yes { background: rgba(16, 185, 129, 0.2); color: var(--success); }
        .badge-no { background: rgba(239, 68, 68, 0.2); color: var(--danger); }
        footer { background: var(--card); border-top: 1px solid var(--border); text-align: center; padding: 1rem; color: var(--muted); font-size: 0.9rem; }
        .filters { display: grid; grid-template-columns: 2fr 1fr auto auto; gap: 0.75rem; align-items: end; }
        .pagination { margin-top: 1rem; }
    </style>
</head>
<body>
    <header>
        <h1>Biblioteca de José Alejandro</h1>
        <nav>
            <a href="{{ route('libros.index') }}">Libros</a>
            <a href="{{ route('categorias.index') }}">Categorías</a>
        </nav>
    </header>

    <main>
        @if(session('ok'))
            <div class="alert-ok">{{ session('ok') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @yield('contenido')
    </main>

    <footer>
        José Alejandro Castro Correa · Ficha 3478025 · 2026
    </footer>
</body>
</html>