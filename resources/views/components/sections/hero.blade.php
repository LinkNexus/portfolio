<section
  id="hero"
  class="relative overflow-hidden py-16 md:py-24"
>
  <!-- Background Elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-purple-50/30 via-transparent to-pink-50/30 dark:from-purple-950/20 dark:via-transparent dark:to-pink-950/20"
  ></div>
  <div class="absolute left-1/4 top-0 h-96 w-96 -translate-y-1/2 transform rounded-full bg-purple-500/5 blur-3xl"></div>
  <div class="absolute bottom-0 right-1/4 h-96 w-96 translate-y-1/2 transform rounded-full bg-pink-500/5 blur-3xl"></div>

  <div class="container relative z-10 mx-auto max-w-6xl px-6 md:px-8">

    {{-- Header area --}}
    <div
      class="mb-12 flex flex-col justify-between md:flex-row md:items-center lg:mb-16"
      x-data
      x-init="$nextTick(() => {
          animate($el.querySelectorAll('[data-animate]'), { opacity: [0, 1], y: [20, 0] }, { duration: 0.5, delay: (i) => 0.3 + i * 0.2 })
      })"
    >
      <div class="flex-1 text-center md:text-left">
        <!-- Premium Badge -->
        <div
          class="mb-6 inline-flex items-center rounded-full border border-purple-500/20 bg-gradient-to-r from-purple-500/10 to-pink-500/10 px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300"
          data-animate
        >
          <span class="relative mr-2 flex h-2 w-2">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-purple-400 opacity-75"></span>
            <span class="relative inline-flex h-2 w-2 rounded-full bg-purple-500"></span>
          </span>
          Available for Opportunities
        </div>

        <h1
          class="mb-6 bg-gradient-to-r from-gray-900 via-purple-800 to-pink-800 bg-clip-text text-5xl font-bold leading-tight text-transparent md:text-6xl lg:text-7xl dark:from-white dark:via-purple-200 dark:to-pink-200"
          data-animate
        >
          {{ $personalData['name'] }}
          <span
            class="mt-2 block bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-2xl text-transparent md:text-3xl lg:text-4xl"
          >
            Software Engineer ✨
          </span>
        </h1>

        <p
          class="mb-8 max-w-2xl text-xl leading-relaxed text-gray-600 md:text-2xl dark:text-gray-300"
          data-animate
        >
          Crafting digital experiences with modern technologies and innovative solutions
        </p>

        <!-- Premium Contact Links -->
        <div class="mb-8 flex flex-col items-center gap-4 md:items-start">
          <div
            class="flex items-center rounded-xl border border-white/20 bg-white/80 px-4 py-3 text-base text-gray-600 shadow-lg backdrop-blur-xl transition-all duration-300 hover:shadow-xl dark:border-gray-800/50 dark:bg-gray-900/80 dark:text-gray-300"
            data-animate
          >
            <x-lucide-map-pin class="mr-3 h-5 w-5 text-purple-600" />
            <span class="font-medium">{{ $personalData['location'] }}</span>
          </div>

          <a
            href="mailto:{{ $personalData['email'] }}"
            class="group flex items-center rounded-xl border border-white/20 bg-white/80 px-4 py-3 text-base text-gray-600 shadow-lg backdrop-blur-xl transition-all duration-300 hover:border-purple-500/30 hover:text-purple-600 hover:shadow-xl dark:border-gray-800/50 dark:bg-gray-900/80 dark:text-gray-300 dark:hover:text-purple-400"
            data-animate
          >
            <x-lucide-mail class="mr-3 h-5 w-5 text-purple-600 transition-transform group-hover:scale-110" />
            <span class="font-medium">{{ $personalData['email'] }}</span>
          </a>

          <div class="flex gap-4">
            <a
              href="https://github.com/{{ $personalData['github'] }}"
              target="_blank"
              rel="noopener noreferrer"
              class="group flex items-center rounded-xl border border-white/20 bg-white/80 px-4 py-3 text-base text-gray-600 shadow-lg backdrop-blur-xl transition-all duration-300 hover:border-purple-500/30 hover:text-purple-600 hover:shadow-xl dark:border-gray-800/50 dark:bg-gray-900/80 dark:text-gray-300 dark:hover:text-purple-400"
              data-animate
            >
              <x-lucide-github class="mr-3 h-5 w-5 text-purple-600 transition-transform group-hover:scale-110" />
              <span class="font-medium">GitHub</span>
            </a>

            <a
              href="{{ $personalData['linkedin'] }}"
              target="_blank"
              rel="noopener noreferrer"
              class="group flex items-center rounded-xl border border-white/20 bg-white/80 px-4 py-3 text-base text-gray-600 shadow-lg backdrop-blur-xl transition-all duration-300 hover:border-purple-500/30 hover:text-purple-600 hover:shadow-xl dark:border-gray-800/50 dark:bg-gray-900/80 dark:text-gray-300 dark:hover:text-purple-400"
              data-animate
            >
              <x-lucide-linkedin class="mr-3 h-5 w-5 text-purple-600 transition-transform group-hover:scale-110" />
              <span class="font-medium">LinkedIn</span>
            </a>
          </div>
        </div>

        <!-- Premium CTA Buttons -->
        <div
          class="flex flex-col gap-4 sm:flex-row"
          data-animate
        >
          <a
            href="#projects"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-purple-700 hover:to-pink-700 hover:shadow-xl"
          >
            <x-lucide-rocket class="mr-2 h-5 w-5" />
            View My Work
          </a>
          <a
            href="#contact"
            class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-8 py-4 text-base font-semibold text-gray-700 shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
          >
            <x-lucide-message-circle class="mr-2 h-5 w-5" />
            Let's Connect
          </a>
        </div>
      </div>

      {{-- Premium Profile picture --}}
      <div
        class="mt-12 flex justify-center md:mt-0 md:justify-end"
        data-animate
      >
        <div class="group relative">
          <!-- Glow Effect -->
          <div
            class="absolute -inset-4 rounded-full bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 opacity-20 blur-2xl transition-opacity duration-500 group-hover:opacity-40"
          ></div>

          <!-- Image Container -->
          <div class="relative">
            <!-- Border Gradient -->
            <div
              class="absolute -inset-2 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 opacity-75 transition-opacity duration-300 group-hover:opacity-100"
            ></div>

            <!-- Image -->
            <img
              src="/profile.png"
              alt="Profile"
              class="relative h-64 w-64 rounded-full bg-white object-cover p-2 shadow-2xl transition-transform duration-300 group-hover:scale-105 md:h-72 md:w-72 lg:h-80 lg:w-80 dark:bg-gray-900"
            />

            <!-- Floating Elements -->
            <div
              class="absolute -right-4 -top-4 flex h-8 w-8 animate-bounce items-center justify-center rounded-full bg-gradient-to-r from-purple-500 to-pink-500 text-sm font-bold text-white shadow-lg"
            >
              ✨
            </div>
            <div
              class="absolute -bottom-4 -left-4 flex h-10 w-10 animate-pulse items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-white shadow-lg"
            >
              🚀
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Premium Bio Section --}}
    <div
      class="relative overflow-hidden rounded-3xl border border-white/20 bg-white/80 p-8 shadow-lg backdrop-blur-xl md:p-12 dark:border-gray-800/50 dark:bg-gray-900/80"
      x-data
      x-init="animate($el, { opacity: [0, 1], y: [10, 0] }, { duration: 0.5, delay: 0.8 })"
    >
      <!-- Background Gradient -->
      <div
        class="absolute inset-0 bg-gradient-to-br from-purple-500/[0.02] via-transparent to-pink-500/[0.02] dark:from-purple-400/[0.05] dark:to-pink-400/[0.05]"
      ></div>

      <!-- Content -->
      <div class="relative z-10">
        <!-- Quote Icon -->
        <div class="mb-6 flex items-center">
          <div
            class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-lg"
          >
            <x-lucide-quote class="h-6 w-6" />
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">About Me</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">My journey & philosophy</p>
          </div>
        </div>

        <!-- Bio Text -->
        <blockquote class="relative text-lg leading-relaxed text-gray-700 md:text-xl dark:text-gray-300">
          <span
            class="absolute left-0 top-0 h-full w-1 rounded-full bg-gradient-to-b from-purple-500 to-pink-500"></span>
          <p class="pl-6 italic">
            "{{ $personalData['speech'] }}"
          </p>
        </blockquote>

        <!-- Decorative Elements -->
        <div class="mt-8 flex items-center justify-between">
          <div class="flex space-x-2">
            <div class="h-2 w-2 animate-pulse rounded-full bg-purple-500"></div>
            <div
              class="h-2 w-2 animate-pulse rounded-full bg-pink-500"
              style="animation-delay: 0.2s"
            ></div>
            <div
              class="h-2 w-2 animate-pulse rounded-full bg-blue-500"
              style="animation-delay: 0.4s"
            ></div>
          </div>

          <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-1">
              <x-lucide-code class="h-4 w-4" />
              <span>Passionate Developer</span>
            </div>
            <div class="flex items-center space-x-1">
              <x-lucide-heart class="h-4 w-4 text-red-500" />
              <span>Problem Solver</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Hover Glow Effect -->
      <div
        class="absolute -inset-0.5 rounded-3xl bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 opacity-0 blur transition-opacity duration-500 hover:opacity-10"
      ></div>
    </div>
  </div>
</section>

<script type="module">
  import {
    animate
  } from "motion";

  window.animate = animate; // expose Motion for Alpine
</script>
