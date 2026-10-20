@props(['title' => null])
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' – Lehrerkreis Wuppertal' : 'Lehrerkreis – Nachhilfe in Wuppertal' }}</title>
    <meta name="description" content="Schulbegleitende Nachhilfe in Wuppertal seit 1990 – in kleinen Gruppen oder einzeln, mit erfahrenen Lehrkräften.">
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}">
    <link rel="preload" href="{{ asset('fonts/Satoshi-Variable.woff2') }}" as="font" type="font/woff2" crossorigin>
    <style>
        @font-face{font-family:"Satoshi";src:url("{{ asset('fonts/Satoshi-Variable.woff2') }}") format("woff2");font-weight:300 900;font-style:normal;font-display:swap}
        body{margin:0;background:#fff;color:oklch(0.24 0.05 262);font-family:"Satoshi",system-ui,-apple-system,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}
        *{box-sizing:border-box}
        a{color:oklch(0.42 0.14 262);text-decoration:none}
        a:hover{color:oklch(0.32 0.14 262);text-decoration:underline}
        input,textarea,select,button{font:inherit;color:inherit}
        html{scroll-behavior:smooth}

        .wrap{max-width:1200px;margin:0 auto}
        .eyebrow{font-size:13px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:oklch(0.5 0.17 262)}
        .h2{margin:0;font-weight:800;font-size:clamp(32px,3.6vw,44px);line-height:1.1;letter-spacing:-0.025em;text-wrap:balance}
        .mono{font-family:ui-monospace,"SF Mono",Menlo,Consolas,"Liberation Mono",monospace;font-size:13px}
        .muted{color:oklch(0.45 0.03 262);text-wrap:pretty}

        .btn-dark{background:oklch(0.27 0.08 262);color:#fff;border-radius:10px;font-weight:700;text-decoration:none}
        .btn-dark:hover{background:oklch(0.35 0.12 262);text-decoration:none;color:#fff}
        .btn-light{background:#fff;color:oklch(0.27 0.08 262);padding:16px 26px;border-radius:10px;font-weight:700;font-size:16px;text-decoration:none}
        .btn-light:hover{background:oklch(0.94 0.02 262);text-decoration:none;color:oklch(0.27 0.08 262)}
        .btn-outline{border:1.5px solid oklch(0.6 0.06 262);color:#fff;padding:15px 24px;border-radius:10px;font-weight:600;font-size:16px;text-decoration:none}
        .btn-outline:hover{border-color:#fff;text-decoration:none;color:#fff}

        .field{display:flex;flex-direction:column;gap:6px;font-size:14px;font-weight:600}
        .field input,.field select,.field textarea{padding:13px 14px;border:1px solid oklch(0.88 0.01 262);border-radius:10px;font-size:16px;font-weight:400;background:#fff}
        .field textarea{resize:vertical}
        .field input:focus,.field select:focus,.field textarea:focus{outline:2px solid oklch(0.5 0.17 262);border-color:transparent}
        .field .error{font-size:13px;font-weight:500;color:oklch(0.58 0.2 25)}
        .grid-2{display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,180px),1fr));gap:16px}
        .dark-card{background:oklch(0.27 0.08 262);color:#fff;border-radius:16px;padding:32px;display:flex;flex-direction:column;gap:12px}
        .dark-card h3{margin:0;font-size:22px;font-weight:800}
        .dark-card p{margin:0;font-size:16px;line-height:1.6;color:oklch(0.88 0.03 262);text-wrap:pretty}
        .contact-label{font-size:13px;color:oklch(0.75 0.04 262)}
        .legal{max-width:760px;margin:0 auto;padding:72px 24px 96px;font-size:17px;line-height:1.65;color:oklch(0.35 0.03 262);overflow-wrap:break-word}
        .legal h1{margin:0 0 32px;font-weight:800;font-size:clamp(32px,4vw,44px);line-height:1.1;letter-spacing:-0.025em;color:oklch(0.24 0.05 262)}
        .legal h2{margin:48px 0 12px;font-size:24px;font-weight:800;letter-spacing:-0.015em;color:oklch(0.24 0.05 262)}
        .legal h3{margin:32px 0 8px;font-size:19px;font-weight:700;color:oklch(0.24 0.05 262)}
        .legal h4{margin:24px 0 6px;font-size:17px;font-weight:700;color:oklch(0.24 0.05 262)}
        .legal p,.legal ul{margin:0 0 14px}
        .legal ul{padding-left:22px}
        .legal li{margin-bottom:8px}
    </style>
</head>
<body>
<div style="min-height:100vh;background:#fff;display:flex;flex-direction:column">

    <div style="display:grid;grid-template-columns:repeat(4,1fr);height:5px">
        @foreach (['oklch(0.85 0.16 92)', 'oklch(0.5 0.17 262)', 'oklch(0.55 0.15 150)', 'oklch(0.58 0.2 25)'] as $color)
            <div style="background:{{ $color }}"></div>
        @endforeach
    </div>

    <header style="position:sticky;top:0;z-index:10;background:rgba(255,255,255,0.94);backdrop-filter:blur(10px);border-bottom:1px solid oklch(0.93 0.008 262)">
        <div class="wrap" style="padding:12px 24px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap">
            <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:12px;text-decoration:none;color:oklch(0.24 0.05 262)">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Lehrerkreis Logo" style="width:48px;height:48px;display:block">
                <span style="display:flex;flex-direction:column;line-height:1.15">
                    <span style="font-weight:800;font-size:19px;letter-spacing:-0.01em">Lehrerkreis</span>
                    <span style="font-size:13px;color:oklch(0.5 0.03 262)">Nachhilfe in Wuppertal</span>
                </span>
            </a>
            <nav style="display:flex;gap:28px;flex-wrap:wrap;font-size:15px;font-weight:600">
                <a href="{{ route('home') }}#angebot" style="color:oklch(0.3 0.05 262)">Angebot</a>
                <a href="{{ route('home') }}#kurse" style="color:oklch(0.3 0.05 262)">Kursmodelle</a>
                <a href="{{ route('home') }}#ansatz" style="color:oklch(0.3 0.05 262)">Unser Ansatz</a>
                <a href="{{ route('home') }}#kontakt" style="color:oklch(0.3 0.05 262)">Kontakt</a>
            </nav>
            <a href="tel:+49202590755" class="btn-dark" style="padding:11px 20px;font-size:15px">0202 – 59 07 55</a>
        </div>
    </header>

    <main style="flex:1">
        {{ $slot }}
    </main>

    <footer style="border-top:1px solid oklch(0.93 0.008 262)">
        <div class="wrap" style="padding:28px 24px;display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;font-size:14px;color:oklch(0.5 0.03 262)">
            <span>© Lehrerkreis Wuppertal · seit 1990</span>
            <div style="display:flex;gap:24px"><a href="{{ route('impressum') }}">Impressum</a><a href="{{ route('datenschutz') }}">Datenschutz</a></div>
        </div>
    </footer>
</div>
</body>
</html>
