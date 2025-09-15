<section
  id="experience"
  class="relative overflow-hidden py-20 lg:py-28"
>
  <!-- Background Elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-emerald-50/30 via-transparent to-blue-50/30 dark:from-emerald-950/20 dark:via-transparent dark:to-blue-950/20"
  ></div>
  <div class="absolute left-1/4 top-0 h-96 w-96 -translate-y-1/2 transform rounded-full bg-emerald-500/5 blur-3xl"></div>
  <div class="absolute bottom-0 right-1/4 h-96 w-96 translate-y-1/2 transform rounded-full bg-blue-500/5 blur-3xl"></div>

  <div class="container relative mx-auto max-w-7xl px-6 md:px-8">

    <!-- Premium Section Header -->
    <div class="mb-16 text-center lg:mb-20">
      <!-- Badge -->
      <div
        class="mb-6 inline-flex items-center rounded-full border border-emerald-500/20 bg-gradient-to-r from-emerald-500/10 to-blue-500/10 px-4 py-2 text-sm font-medium text-emerald-700 dark:text-emerald-300"
      >
        <span class="relative mr-2 flex h-2 w-2">
          <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
        </span>
        Professional Journey
      </div>

      <!-- Main Title -->
      <h2
        class="mb-6 bg-gradient-to-r from-gray-900 via-emerald-800 to-blue-800 bg-clip-text text-4xl font-bold leading-tight text-transparent md:text-5xl lg:text-6xl dark:from-white dark:via-emerald-200 dark:to-blue-200"
        x-data
        x-intersect="$el.animate([{opacity:0, y:20}, {opacity:1, y:0}], {duration:500})"
      >
        Work Experience
        <span class="mt-2 block text-2xl md:text-3xl lg:text-4xl">& Career Growth 💼</span>
      </h2>

      <!-- Subtitle -->
      <p class="text-muted-foreground mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        My professional journey through various roles, companies, and the valuable experiences that shaped my career.
      </p>
    </div>

    <!-- Premium Timeline -->
    <div class="relative">
      <!-- Timeline Line -->
      <div
        class="absolute bottom-0 left-8 top-0 w-0.5 transform bg-gradient-to-b from-emerald-500 via-blue-500 to-purple-500 md:left-1/2 md:-translate-x-0.5"
      ></div>

      <!-- Timeline Items -->
      <div class="space-y-12 lg:space-y-16">
        @foreach ($personalData['workExperience'] as $i => $job)
          <article
            class="group relative"
            x-data="{ isHovered: false }"
            @mouseenter="isHovered = true"
            @mouseleave="isHovered = false"
          >
            <!-- Timeline Node -->
            <div
              class="absolute left-6 z-10 h-4 w-4 transform rounded-full border-4 border-white bg-gradient-to-r from-emerald-500 to-blue-500 shadow-lg transition-transform duration-300 group-hover:scale-125 md:left-1/2 md:-translate-x-1/2 dark:border-gray-900"
            >
              <div
                class="absolute inset-0 animate-ping rounded-full bg-gradient-to-r from-emerald-500 to-blue-500 opacity-30"
              ></div>
            </div>

            <!-- Content Card -->
            <div class="{{ $i % 2 === 0 ? 'md:pr-1/2 md:text-right' : 'md:pl-1/2 md:ml-8' }} ml-16 md:ml-0">
              <div
                class="relative overflow-hidden rounded-2xl border border-white/20 bg-white/80 shadow-lg backdrop-blur-xl transition-all duration-500 hover:shadow-2xl group-hover:scale-[1.02] group-hover:border-emerald-500/30 dark:border-gray-800/50 dark:bg-gray-900/80"
                x-data
                x-intersect.once="animate($el, { opacity: [0,1], y: [30,0] }, { duration: 0.6, delay: 0.1 * {{ $i }} })"
              >

                <!-- Gradient Overlay -->
                <div
                  class="absolute inset-0 bg-gradient-to-br from-emerald-500/[0.02] via-transparent to-blue-500/[0.02] opacity-0 transition-opacity duration-500 group-hover:opacity-100 dark:from-emerald-400/[0.05] dark:to-blue-400/[0.05]"
                ></div>

                <!-- Content -->
                <div class="relative z-10 p-8">

                  <!-- Header -->
                  <div class="mb-6">
                    <!-- Date Badge -->
                    <div
                      class="mb-4 inline-flex items-center rounded-full border border-emerald-300 bg-gradient-to-r from-emerald-100 to-blue-100 px-4 py-2 text-sm font-medium text-emerald-700 dark:border-emerald-700 dark:from-emerald-900/30 dark:to-blue-900/30 dark:text-emerald-300"
                    >
                      <x-lucide-calendar class="mr-2 h-4 w-4" />
                      {{ $job['period'] }}
                    </div>

                    <!-- Position & Company -->
                    <h3
                      class="mb-2 text-2xl font-bold text-gray-900 transition-colors duration-300 group-hover:text-emerald-600 dark:text-white dark:group-hover:text-emerald-400"
                    >
                      {{ $job['position'] }}
                    </h3>

                    <div class="flex flex-col text-lg text-gray-600 md:space-y-2 dark:text-gray-300">
                      <div class="flex items-center space-x-1">
                        <x-lucide-building class="h-5 w-5 text-emerald-600" />
                        <span class="font-semibold">{{ $job['company'] }}</span>
                      </div>
                      <div class="flex items-center space-x-1">
                        <x-lucide-map-pin class="h-4 w-4 text-blue-600" />
                        <span>{{ $job['location'] }}</span>
                      </div>
                    </div>
                  </div>

                  <!-- Achievements Section -->
                  <div class="rounded-xl bg-gray-50 p-6 dark:bg-gray-800/50">
                    <div class="mb-4 flex w-full items-center">
                      <div
                        class="mr-3 flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-blue-500 text-white shadow-lg"
                      >
                        <x-lucide-trophy class="h-5 w-5" />
                      </div>
                      <div class="flex flex-col">
                        <h4 class="text-start text-lg font-semibold text-gray-900 dark:text-white">Key
                          Achievements</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Major accomplishments & impact</p>
                      </div>
                    </div>

                    <ul class="space-y-3">
                      @foreach ($job['achievements'] as $j => $achievement)
                        <li
                          class="flex items-start space-x-3 text-gray-700 dark:text-gray-300"
                          x-data
                          x-intersect.once="animate($el, { opacity: [0,1], x: [-20,0] }, { duration: 0.4, delay: 0.1 * {{ $j }} })"
                        >
                          <div
                            class="mt-2 h-2 w-2 flex-shrink-0 rounded-full bg-gradient-to-r from-emerald-500 to-blue-500"
                          ></div>
                          <span class="leading-relaxed">{{ $achievement }}</span>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                <!-- Hover Glow Effect -->
                <div
                  class="absolute -inset-0.5 rounded-2xl bg-gradient-to-r from-emerald-600 via-blue-600 to-purple-600 opacity-0 blur transition-opacity duration-500 group-hover:opacity-20"
                ></div>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>

    <!-- Premium Call to Action -->
    <div class="mt-20 text-center">
      <div
        class="mx-auto max-w-4xl rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-900/20 via-blue-900/20 to-purple-900/20 p-8 backdrop-blur-sm md:p-12 dark:from-emerald-500/10 dark:via-blue-500/10 dark:to-purple-500/10"
      >
        <h3 class="mb-4 text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
          Let's Work Together
        </h3>
        <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
          Ready to bring my experience and expertise to your next project? I'm always open to new opportunities and
          collaborations.
        </p>

        <div class="flex flex-col justify-center gap-4 sm:flex-row">
          <a
            href="#contact"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-emerald-600 to-blue-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-emerald-700 hover:to-blue-700 hover:shadow-xl"
          >
            <x-lucide-user-plus class="mr-2 h-5 w-5" />
            Hire Me
          </a>

          <a
            href="https://linkedin.com/in/{{ $personalData['linkedin'] ?? '#' }}"
            target="_blank"
            class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-8 py-4 text-base font-semibold text-gray-700 shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
          >
            <x-lucide-linkedin class="mr-2 h-5 w-5" />
            Connect on LinkedIn
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
