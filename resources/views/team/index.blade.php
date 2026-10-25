@extends('layouts.app')

@section('content')
<section class="hero wrap">
    <div class="hero-copy">
        <p class="eyebrow">
            <span></span>
            {{ $team['label'] }} / {{ $team['course'] }}
        </p>

        <h1>
            Three minds.<br>
            Dozens of <em>open tabs.</em>
        </h1>

        <p class="lead">{{ $team['intro'] }}</p>

        <a class="button" href="#anggota">
            Meet our team
            <span aria-hidden="true">↗</span>
        </a>

        <div class="hero-note">
            <span class="mini-avatars" aria-hidden="true">
                @foreach(array_slice($team['members'], 0, 3) as $person)
                    <i>{{ $person['initials'] }}</i>
                @endforeach
            </span>

            <span>
                {{ count($team['members']) }} members. Plenty of ideas. Taking turns saying, “Oh, got it.”
            </span>
        </div>
    </div>

    <div class="hero-art" aria-hidden="true">
        <div class="art-grid"></div>
        <div class="orbit orbit-one"></div>
        <div class="orbit orbit-two"></div>

        <span class="art-top">IDEAS · GIVE IT A TRY · OH, GOT IT</span>
        <span class="art-star">✦</span>

       <span class="art-word">
    <span>Sometimes focused,</span>
    <span>sometimes</span>
    <i>not so much.</i>
</span>

        <div class="art-bottom">
            <span>
                OPEN ALL THE TABS<br>
                JUST GET SOMETHING DONE
            </span>
            <span>↗</span>
        </div>
    </div>
</section>

<section id="tentang" class="about wrap">
    <div>
        <p class="eyebrow">01 / ABOUT US</p>

        <h2>
            Let’s get acquainted,<br>
            we might just <em>click.</em>
        </h2>
    </div>

    <div>
        <p>{{ $team['about'] }}</p>

        <div class="about-meta">
            <span>{{ $team['class'] }}</span>
            <span>{{ $team['course'] }}</span>
        </div>
    </div>
</section>

<section id="anggota" class="members wrap">
    <div class="section-head">
        <div>
            <p class="eyebrow">02 / THE PEOPLE BEHIND THE IDEAS</p>
            <h2>Meet <em>our team.</em></h2>
        </div>
    </div>

    <div class="member-grid">
        @foreach($team['members'] as $person)
            <article class="member-card">
                <a
                    class="portrait portrait-{{ $loop->index % 3 }}"
                    href="{{ route('members.show', $person['slug']) }}"
                    aria-label="View profile: {{ $person['name'] }}"
                >
                    @if($person['photo'])
                        <img
                            src="{{ asset($person['photo']) }}"
                            alt="Photo of {{ $person['name'] }}"
                            loading="lazy"
                        >
                    @else
                        <span
                            class="portrait-lines"
                            aria-hidden="true"
                        ></span>

                        <span class="initials" aria-hidden="true">
                            {{ $person['initials'] }}
                        </span>
                    @endif

                    <span class="member-number">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <span class="role">{{ $person['role'] }}</span>
                </a>

                <div class="card-body">
                    <span class="nim">Student ID {{ $person['nim'] }}</span>

                    <h3>{{ $person['name'] }}</h3>
                    <p>{{ $person['bio'] }}</p>

                    <a
                        class="profile-link"
                        href="{{ route('members.show', $person['slug']) }}"
                    >
                        Get to know us
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="closing wrap">
    <span class="closing-star" aria-hidden="true">✦</span>

    <p>
        Not every tab has the answer.<br>
        Luckily, <em>we have each other to figure it out.</em>
    </p>

    <span class="eyebrow">LEARN. MAKE PROGRESS. GROW.</span>
</section>
@endsection