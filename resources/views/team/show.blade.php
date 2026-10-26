@extends('layouts.app')

@section('title', $member['name'].' — '.$team['name'])

@section('content')
<section class="wrap profile-page">
    <a class="back" href="{{ route('home') }}#anggota">
        ← Back to the team
    </a>

    <div class="profile-layout">
        <div class="portrait profile-portrait">
            @if($member['photo'])
                <img
                    src="{{ asset($member['photo']) }}"
                    alt="Photo of {{ $member['name'] }}"
                >
            @else
                <span class="portrait-lines" aria-hidden="true"></span>
                <span class="initials" aria-hidden="true">
                    {{ $member['initials'] }}
                </span>
            @endif

            <span class="role">{{ $member['role'] }}</span>
        </div>

        <div class="profile-copy">
            <p class="eyebrow">GET TO KNOW ME</p>

            <h1>{{ $member['name'] }}</h1>

            <p class="profile-nim">
                Student ID {{ $member['nim'] }} · {{ $team['class'] }}
            </p>

            <p class="lead">{{ $member['bio'] }}</p>

            <h2>About me</h2>
            <p>{{ $member['story'] }}</p>

            <h2>Hobbies & skills</h2>
            <div class="skills">
                @foreach($member['skills'] as $skill)
                    <span>{{ $skill }}</span>
                @endforeach
            </div>

            <blockquote>
                “{{ $member['motto'] }}”
            </blockquote>
        </div>
    </div>
</section>
@endsection