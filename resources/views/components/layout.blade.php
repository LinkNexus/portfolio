<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
  ["title" => $title, "description" => $description] = $personalData["layout"];
@endphp

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/svg+xml" href="/favicon.svg"/>
  <meta name="description"
        content="{{ $description }}"/>
  <meta
    name="keywords"
    content="Levy Nkeneng, Portfolio, Web Developer, Software Engineer, Frontend, Backend, Fullstack, JavaScript, TypeScript, Astro, React"
  />
  <meta name="author" content="Levy Nkeneng"/>
  <meta property="og:title" content="{{ $title }}"/>
  <meta property="og:description" content="{{ $description }}"/>
  <meta property="og:type" content="website"/>
  <meta property="og:image" content="/og-image.png"/>
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{ $title }}"/>
  <meta name="twitter:description" content="{{ $description }}"/>
  <meta name="twitter:image" content="/og-image.png"/>
  <title>Levy Nkeneng's Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <!-- Styles / Scripts -->
  <script type="module">
    import {animate} from "https://cdn.jsdelivr.net/npm/motion@latest/+esm"

    window.animate = animate
  </script>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @viteReactRefresh
    @vite(['resources/js/app.ts', 'resources/css/app.css'])
  @endif

</head>
<body
  class="min-h-screen bg-background font-sans antialiased selection:bg-purple-500/20 selection:text-purple-500"
>

<div
  class="fixed inset-0 -z-10 h-full w-full bg-background bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"
>
</div>

{{ $slot }}

<style>
  html,
  body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    scroll-behavior: smooth;
  }

  :root {
    --transition-standard: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  body {
    transition: background-color var(--transition-standard),
    color var(--transition-standard);
  }
</style>

<script>
  const getThemePreference = () => {
    if (typeof localStorage !== "undefined" && localStorage.getItem("theme")) {
      return localStorage.getItem("theme");
    }
    return window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";
  };
  const isDark = getThemePreference() === "dark";
  document.documentElement.classList[isDark ? "add" : "remove"]("dark");

  if (typeof localStorage !== "undefined") {
    const observer = new MutationObserver(() => {
      const isDark = document.documentElement.classList.contains("dark");
      localStorage.setItem("theme", isDark ? "dark" : "light");
    });
    observer.observe(document.documentElement, {
      attributes: true,
      attributeFilter: ["class"],
    });
  }
</script>
</body>
</html>
