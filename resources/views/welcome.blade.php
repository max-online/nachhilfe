@php
    $content = $page->content;
    $colors = ['oklch(0.85 0.16 92)', 'oklch(0.5 0.17 262)', 'oklch(0.55 0.15 150)', 'oklch(0.58 0.2 25)'];
    $phoneLink = 'tel:'.\App\Models\Page::phoneLink($content['contact']['phone']);
@endphp
<x-layouts.site>
    <section id="top" style="background:oklch(0.27 0.08 262);color:#fff">
        <div class="wrap" style="padding:88px 24px 96px;display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,420px),1fr));gap:56px;align-items:center">
            <div style="display:flex;flex-direction:column;gap:28px">
                <span class="eyebrow" style="align-self:flex-start;color:oklch(0.85 0.16 92)">{{ $content['hero']['eyebrow'] }}</span>
                <h1 style="margin:0;font-weight:800;font-size:clamp(42px,5.6vw,68px);line-height:1.04;letter-spacing:-0.03em;text-wrap:balance">{{ $content['hero']['title'] }}</h1>
                <p style="margin:0;font-size:19px;line-height:1.6;max-width:520px;color:oklch(0.88 0.03 262);text-wrap:pretty">{{ $content['hero']['text'] }}</p>
                <div style="display:flex;gap:12px;flex-wrap:wrap">
                    <a href="#kontakt" class="btn-light">{{ $content['hero']['cta'] }}</a>
                    <a href="{{ $phoneLink }}" class="btn-outline">Anrufen: {{ $content['contact']['phone'] }}</a>
                </div>
            </div>
            <div style="position:relative;aspect-ratio:5/4;border-radius:18px;overflow:hidden;background:repeating-linear-gradient(135deg,oklch(0.33 0.08 262) 0 12px,oklch(0.31 0.08 262) 12px 24px);display:flex;align-items:center;justify-content:center">
                <span class="mono" style="color:oklch(0.75 0.05 262)">Foto: Unterrichtssituation</span>
                <div style="position:absolute;left:20px;bottom:20px;background:#fff;color:oklch(0.24 0.05 262);border-radius:12px;padding:16px 20px;display:flex;gap:14px;align-items:center;box-shadow:0 12px 32px rgba(0,0,0,0.18)">
                    <span style="font-weight:800;font-size:34px;letter-spacing:-0.03em">{{ $content['hero']['badge_value'] }}</span>
                    <span style="font-size:14px;line-height:1.35;color:oklch(0.45 0.03 262)">{!! nl2br(e($content['hero']['badge_text'])) !!}</span>
                </div>
            </div>
        </div>
    </section>

    <section id="angebot" class="wrap" style="padding:96px 24px">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:56px">
            <div style="display:flex;flex-direction:column;gap:18px">
                <span class="eyebrow">{{ $content['offer']['eyebrow'] }}</span>
                <h2 class="h2">{{ $content['offer']['title'] }}</h2>
                <p class="muted" style="margin:0;font-size:17px;line-height:1.65">{{ $content['offer']['text'] }}</p>
                <div style="display:flex;flex-wrap:wrap;gap:10px;margin-top:8px">
                    @foreach ($content['offer']['subjects'] as $subject)
                        <span style="padding:10px 16px;border-radius:999px;background:oklch(0.96 0.015 262);font-weight:600;font-size:15px">{{ $subject }}</span>
                    @endforeach
                    <span style="padding:10px 16px;border-radius:999px;border:1px dashed oklch(0.8 0.03 262);font-weight:500;font-size:15px;color:oklch(0.5 0.03 262)">u. a.</span>
                </div>
            </div>
            <div style="display:flex;flex-direction:column">
                <span class="eyebrow" style="color:oklch(0.5 0.03 262);padding-bottom:14px;border-bottom:1px solid oklch(0.9 0.01 262)">{{ $content['offer']['skills_title'] }}</span>
                @foreach ($content['offer']['skills'] as $skill)
                    <div style="display:grid;grid-template-columns:44px 1fr;align-items:baseline;padding:18px 0;border-bottom:1px solid oklch(0.93 0.008 262)">
                        <span class="mono" style="color:oklch(0.6 0.05 262)">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span style="font-size:18px;font-weight:600">{{ $skill }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="kurse" style="background:oklch(0.975 0.006 262)">
        <div class="wrap" style="padding:96px 24px;display:flex;flex-direction:column;gap:48px">
            <div style="display:flex;flex-direction:column;gap:14px;max-width:640px">
                <span class="eyebrow">{{ $content['courses']['eyebrow'] }}</span>
                <h2 class="h2">{{ $content['courses']['title'] }}</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:20px">
                @foreach ($content['courses']['items'] as $course)
                    <div style="background:#fff;border:1px solid oklch(0.92 0.01 262);border-radius:16px;padding:32px;display:flex;flex-direction:column;gap:16px">
                        <div style="display:flex;gap:6px">
                            @for ($i = 0; $i < $course['dots']; $i++)
                                <span style="width:14px;height:14px;border-radius:50%;background:oklch(0.27 0.08 262)"></span>
                            @endfor
                        </div>
                        <h3 style="margin:0;font-size:22px;font-weight:800;letter-spacing:-0.015em">{{ $course['title'] }}</h3>
                        <p class="muted" style="margin:0;font-size:16px;line-height:1.6">{{ $course['text'] }}</p>
                    </div>
                @endforeach
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:20px">
                @foreach ($content['courses']['specials'] as $special)
                    <div class="dark-card">
                        <h3>{{ $special['title'] }}</h3>
                        <p>{{ $special['text'] }}</p>
                    </div>
                @endforeach
            </div>
            @if (filled($content['courses']['note'] ?? null))
                <p style="margin:0;font-size:15px;line-height:1.6;color:oklch(0.5 0.03 262);max-width:720px">{{ $content['courses']['note'] }}</p>
            @endif
        </div>
    </section>

    <section id="ansatz" class="wrap" style="padding:96px 24px;display:flex;flex-direction:column;gap:48px">
        <div style="display:flex;flex-direction:column;gap:14px;max-width:680px">
            <span class="eyebrow">{{ $content['approach']['eyebrow'] }}</span>
            <h2 class="h2">{{ $content['approach']['title'] }}</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,240px),1fr));gap:40px">
            @foreach ($content['approach']['steps'] as $step)
                <div style="display:flex;flex-direction:column;gap:14px;padding-top:20px;border-top:3px solid {{ $colors[$loop->index % count($colors)] }}">
                    <span class="mono" style="color:oklch(0.55 0.03 262)">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 style="margin:0;font-size:20px;font-weight:800;letter-spacing:-0.01em">{{ $step['title'] }}</h3>
                    <p class="muted" style="margin:0;font-size:16px;line-height:1.6">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="wrap" style="padding:0 24px 96px">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr));gap:48px;align-items:center;background:oklch(0.975 0.006 262);border-radius:20px;padding:clamp(28px,5vw,56px)">
            <div style="aspect-ratio:4/3;border-radius:14px;background:repeating-linear-gradient(135deg,oklch(0.94 0.01 262) 0 12px,oklch(0.92 0.012 262) 12px 24px);display:flex;align-items:center;justify-content:center">
                <span class="mono" style="color:oklch(0.55 0.03 262)">Foto: Team / Räume Bachstraße</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:20px">
                <span style="font-weight:800;font-size:clamp(56px,7vw,88px);line-height:1;letter-spacing:-0.04em;color:oklch(0.27 0.08 262)">{{ $content['about']['highlight'] }}</span>
                <p style="margin:0;font-size:19px;line-height:1.6;text-wrap:pretty">{{ $content['about']['text'] }}</p>
                @if (filled($content['about']['owner'] ?? null))
                    <p style="margin:0;font-size:15px;color:oklch(0.5 0.03 262)">{{ $content['about']['owner'] }}</p>
                @endif
            </div>
        </div>
    </section>

    <section id="kontakt" style="background:oklch(0.27 0.08 262);color:#fff">
        <div class="wrap" style="padding:96px 24px;display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr));gap:56px">
            <div style="display:flex;flex-direction:column;gap:24px">
                <span class="eyebrow" style="color:oklch(0.85 0.16 92)">{{ $content['contact']['eyebrow'] }}</span>
                <h2 class="h2">{{ $content['contact']['title'] }}</h2>
                <div style="display:flex;flex-direction:column;gap:18px;margin-top:8px;font-size:17px">
                    <div style="display:flex;flex-direction:column;gap:4px"><span class="contact-label">Telefon</span><a href="{{ $phoneLink }}" style="color:#fff;font-weight:700;font-size:24px">{{ $content['contact']['phone'] }}</a></div>
                    <div style="display:flex;flex-direction:column;gap:4px"><span class="contact-label">E-Mail</span><a href="mailto:{{ $content['contact']['email'] }}" style="color:#fff;font-weight:600">{{ $content['contact']['email'] }}</a></div>
                    <div style="display:flex;flex-direction:column;gap:4px"><span class="contact-label">Adresse</span><span style="font-weight:600">{{ $content['contact']['address'] }}</span></div>
                </div>
            </div>
            <div style="background:#fff;color:oklch(0.24 0.05 262);border-radius:18px;padding:clamp(24px,4vw,40px)">
                @if (session('inquiry_sent'))
                    <div style="display:flex;flex-direction:column;gap:12px;padding:40px 0;text-align:center;align-items:center">
                        <span style="width:56px;height:56px;border-radius:50%;background:oklch(0.55 0.15 150);color:#fff;display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800">✓</span>
                        <h3 style="margin:0;font-size:22px;font-weight:800">Vielen Dank!</h3>
                        <p style="margin:0;color:oklch(0.45 0.03 262)">Wir melden uns zeitnah bei Ihnen.</p>
                        <a href="{{ route('home') }}#kontakt" style="margin-top:8px;font-weight:600">Neue Anfrage</a>
                    </div>
                @else
                    <form method="POST" action="{{ route('inquiries.store') }}" style="display:flex;flex-direction:column;gap:16px">
                        @csrf
                        <h3 style="margin:0 0 4px;font-size:22px;font-weight:800">Beratung anfragen</h3>
                        <div class="grid-2">
                            <label class="field">Name
                                <input name="name" value="{{ old('name') }}" required>
                                @error('name')<span class="error">{{ $message }}</span>@enderror
                            </label>
                            <label class="field">Telefon
                                <input name="phone" type="tel" value="{{ old('phone') }}">
                                @error('phone')<span class="error">{{ $message }}</span>@enderror
                            </label>
                        </div>
                        <label class="field">E-Mail
                            <input name="email" type="email" value="{{ old('email') }}" required>
                            @error('email')<span class="error">{{ $message }}</span>@enderror
                        </label>
                        <div class="grid-2">
                            <label class="field">Fach
                                <select name="subject">
                                    @foreach (\App\Models\Inquiry::SUBJECTS as $subject)
                                        <option @selected(old('subject') === $subject)>{{ $subject }}</option>
                                    @endforeach
                                </select>
                                @error('subject')<span class="error">{{ $message }}</span>@enderror
                            </label>
                            <label class="field">Klasse
                                <input name="grade" value="{{ old('grade') }}" placeholder="z. B. 8">
                                @error('grade')<span class="error">{{ $message }}</span>@enderror
                            </label>
                        </div>
                        <label class="field">Nachricht
                            <textarea name="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')<span class="error">{{ $message }}</span>@enderror
                        </label>
                        <button type="submit" class="btn-dark" style="margin-top:4px;border:none;padding:16px;font-size:16px;cursor:pointer">Anfrage senden</button>
                    </form>
                @endif
            </div>
        </div>
    </section>
</x-layouts.site>
