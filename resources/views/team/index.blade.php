@extends('layouts.app')
@section('content')
<section class="hero wrap">
    <div class="hero-copy"><p class="eyebrow"><span></span> {{ $team['label'] }} / {{ $team['course'] }}</p><h1>Berbeda cerita.<br>Satu <em>tujuan.</em></h1><p class="lead">{{ $team['intro'] }}</p><a class="button" href="#anggota">Kenali anggota kami <span aria-hidden="true">↗</span></a><div class="hero-note"><span class="mini-avatars" aria-hidden="true">@foreach(array_slice($team['members'], 0, 3) as $person)<i>{{ $person['initials'] }}</i>@endforeach</span><span>{{ count($team['members']) }} anggota. Saling melengkapi.</span></div></div>
    <div class="hero-art" aria-hidden="true"><div class="art-grid"></div><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><span class="art-top">IDE · KOLABORASI · KARYA</span><span class="art-star">✦</span><span class="art-word">berkarya<br>dan tumbuh<br><i>bersama.</i></span><div class="art-bottom"><span>BERAGAM PERSPEKTIF<br>SATU ARAH YANG SAMA</span><span>↗</span></div></div>
</section>
<section id="tentang" class="about wrap"><div><p class="eyebrow">01 / TENTANG KAMI</p><h2>Kenal lebih dekat,<br>berkarya lebih <em>hebat.</em></h2></div><div><p>{{ $team['about'] }}</p><div class="about-meta"><span>{{ $team['class'] }}</span><span>{{ $team['course'] }}</span></div></div></section>
<section id="anggota" class="members wrap"><div class="section-head"><div><p class="eyebrow">02 / ORANG DI BALIK IDE</p><h2>Ini <em>tim kami.</em></h2></div><p>Peran berbeda. Komitmen yang sama.</p></div><div class="member-grid">
@foreach($team['members'] as $person)
<article class="member-card"><a class="portrait portrait-{{ $loop->index % 3 }}" href="{{ route('members.show', $person['slug']) }}" aria-label="Lihat profil {{ $person['name'] }}">@if($person['photo'])<img src="{{ asset($person['photo']) }}" alt="Foto {{ $person['name'] }}" loading="lazy">@else<span class="portrait-lines" aria-hidden="true"></span><span class="initials" aria-hidden="true">{{ $person['initials'] }}</span>@endif<span class="member-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><span class="role">{{ $person['role'] }}</span></a><div class="card-body"><span class="nim">NIM {{ $person['nim'] }}</span><h3>{{ $person['name'] }}</h3><p>{{ $person['bio'] }}</p><a class="profile-link" href="{{ route('members.show', $person['slug']) }}">Kenali lebih dekat <span aria-hidden="true">↗</span></a></div></article>
@endforeach
</div></section>
<section class="closing wrap"><span class="closing-star" aria-hidden="true">✦</span><p>Ide yang baik menjadi lebih berarti<br>ketika dikerjakan <em>bersama.</em></p><span class="eyebrow">BELAJAR. BERPROSES. BERTUMBUH.</span></section>
@endsection
