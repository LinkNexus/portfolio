<section class="py-16 md:py-24 relative overflow-hidden">
  <div class="container max-w-4xl mx-auto px-6 md:px-4 relative z-10">

    {{-- Header area --}}
    <div
      class="flex flex-col md:flex-row md:items-center justify-between mb-8"
      x-data
      x-init="
        $nextTick(() => {
          animate($el.querySelectorAll('[data-animate]'),
            { opacity: [0,1], y: [20,0] },
            { duration: 0.5, delay: (i) => 0.3 + i*0.2 }
          )
        })
      "
    >
      <div class="text-center md:text-left">
        <h1 class="text-4xl font-bold mb-2" data-animate>
          {{ $personalData['name'] }}
          <span class="inline-block animate-pulse">✨</span>
        </h1>

        <p class="text-xl text-muted-foreground mb-6" data-animate>
          Software Engineer 👨‍💻
        </p>

        <div class="flex flex-col gap-2 items-center md:items-start">
          <div
            class="flex items-center text-sm text-muted-foreground"
            data-animate
            @mouseenter="animate($el, { scale: 1.05, color: '#4b5563' }, { duration: 0.2 })"
            @mouseleave="animate($el, { scale: 1, color: '#6b7280' }, { duration: 0.2 })"
          >
            📍 {{ $personalData['location'] }}
          </div>

          <a
            href="mailto:{{ $personalData['email'] }}"
            class="flex items-center text-sm text-muted-foreground hover:text-foreground transition-colors"
            data-animate
            @mouseenter="animate($el, { scale: 1.05, color: '#4b5563' }, { duration: 0.2 })"
            @mouseleave="animate($el, { scale: 1, color: '#6b7280' }, { duration: 0.2 })"
          >
            ✉️ {{ $personalData['email'] }}
          </a>

          <a
            href="{{ $personalData['github'] }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center text-sm text-muted-foreground hover:text-foreground transition-colors"
            data-animate
            @mouseenter="animate($el, { scale: 1.05, color: '#4b5563' }, { duration: 0.2 })"
            @mouseleave="animate($el, { scale: 1, color: '#6b7280' }, { duration: 0.2 })"
          >
            🌟 GitHub
          </a>

          <a
            href="{{ $personalData['linkedin'] }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center text-sm text-muted-foreground hover:text-foreground transition-colors"
            data-animate
            @mouseenter="animate($el, { scale: 1.05, color: '#4b5563' }, { duration: 0.2 })"
            @mouseleave="animate($el, { scale: 1, color: '#6b7280' }, { duration: 0.2 })"
          >
            🔗 LinkedIn
          </a>
        </div>
      </div>

      {{-- Profile picture --}}
      <div
        class="mt-6 md:mt-0 flex justify-center"
        data-animate
        @mouseenter="animate($el, { scale: 1.05 }, { duration: 0.2 })"
        @mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
        @mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
        @mouseup="animate($el, { scale: 1.05 }, { duration: 0.1 })"
      >
        <div class="relative group">
          <div
            class="absolute -inset-1 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full blur opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
          <img
            src="/profile.png"
            alt="Profile"
            class="w-48 md:w-60 rounded-full relative ring-2 ring-purple-500/50 object-cover"
          />
        </div>
      </div>
    </div>

    {{-- Bio box --}}
    <div
      class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 backdrop-blur-sm backdrop-filter p-4 rounded-lg border border-purple-500/20 dark:border-purple-500/10 shadow-sm"
      x-data
      x-init="animate($el, { opacity: [0,1], y: [10,0] }, { duration: 0.5, delay: 0.8 })"
    >
      <p class="text-muted-foreground pl-4 py-2 mb-4 relative">
        <span class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
        {{ $personalData["speech"] }}
      </p>
    </div>
  </div>
</section>

<script type="module">
  import {animate} from "motion";

  window.animate = animate; // expose Motion for Alpine
</script>
