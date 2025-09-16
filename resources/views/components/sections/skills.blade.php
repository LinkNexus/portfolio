<section
  id="skills"
  class="relative overflow-hidden py-20 lg:py-28"
>
  <!-- Background Elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-blue-50/30 via-transparent to-purple-50/30 dark:from-blue-950/20 dark:via-transparent dark:to-purple-950/20"
  ></div>
  <div class="absolute right-1/4 top-0 h-96 w-96 -translate-y-1/2 transform rounded-full bg-blue-500/5 blur-3xl"></div>
  <div class="absolute bottom-0 left-1/4 h-96 w-96 translate-y-1/2 transform rounded-full bg-purple-500/5 blur-3xl">
  </div>

  <div class="container relative mx-auto max-w-7xl px-6 md:px-8">
    <!-- Premium Section Header -->
    <div class="mb-16 text-center lg:mb-20">
      <!-- Badge -->
      <div
        class="mb-6 inline-flex items-center rounded-full border border-blue-500/20 bg-gradient-to-r from-blue-500/10 to-purple-500/10 px-4 py-2 text-sm font-medium text-blue-700 dark:text-blue-300"
      >
        <span class="relative mr-2 flex h-2 w-2">
          <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-blue-500"></span>
        </span>
        Technical Expertise
      </div>

      <!-- Main Title -->
      <h2
        class="mb-6 bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-4xl font-bold leading-tight text-transparent md:text-5xl lg:text-6xl dark:from-white dark:via-blue-200 dark:to-purple-200"
        x-data
        x-intersect="$el.animate([{opacity:0, y:20}, {opacity:1, y:0}], {duration:500})"
      >
        Skills & Technologies
        <span class="mt-2 block text-2xl md:text-3xl lg:text-4xl">I Work With 🛠️</span>
      </h2>

      <!-- Subtitle -->
      <p class="text-muted-foreground mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        From frontend frameworks to backend architectures, here's my technical toolkit for building modern applications.
      </p>
    </div>

    <!-- Premium Skills Grid -->
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 xl:gap-10">
      @foreach ($personalData['skills'] as $key => $skill)
        <article
          class="group relative"
          x-data="{ isHovered: false }"
          @mouseenter="isHovered = true"
          @mouseleave="isHovered = false"
        >
          <!-- Premium Glass Card -->
          <div
            class="relative h-full overflow-hidden rounded-2xl border border-white/20 bg-white/80 shadow-lg backdrop-blur-xl transition-all duration-500 hover:shadow-2xl group-hover:scale-[1.02] group-hover:border-blue-500/30 dark:border-gray-800/50 dark:bg-gray-900/80"
            x-data
            x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})"
          >

            <!-- Gradient Overlay -->
            <div
              class="absolute inset-0 bg-gradient-to-br from-blue-500/[0.02] via-transparent to-purple-500/[0.02] opacity-0 transition-opacity duration-500 group-hover:opacity-100 dark:from-blue-400/[0.05] dark:to-purple-400/[0.05]"
            ></div>

            <!-- Content Container -->
            <div class="relative z-10 p-8">

              <!-- Enhanced Category Header -->
              <div class="mb-8 flex items-center">
                <!-- Category Icon -->
                <div
                  class="mr-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-purple-500 text-white shadow-lg"
                >
                  <span class="text-2xl">{{ $skill['emoji'] }}</span>
                </div>

                <!-- Category Info -->
                <div class="flex-1">
                  <h3
                    class="text-2xl font-bold text-gray-900 transition-colors duration-300 group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400"
                  >
                    {{ $key }}
                  </h3>
                  <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ count($skill['list']) }} technologies
                  </p>
                </div>
              </div>

              <!-- Premium Skills Grid -->
              <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                @foreach ($skill['list'] as $i => $skillItem)
                  @php
                    $colorClasses = [
                        'bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/30 dark:to-blue-800/30 text-blue-700 dark:text-blue-300 border-blue-300 dark:border-blue-700',
                        'bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 text-purple-700 dark:text-purple-300 border-purple-300 dark:border-purple-700',
                        'bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/30 dark:to-emerald-800/30 text-emerald-700 dark:text-emerald-300 border-emerald-300 dark:border-emerald-700',
                        'bg-gradient-to-br from-orange-100 to-orange-200 dark:from-orange-900/30 dark:to-orange-800/30 text-orange-700 dark:text-orange-300 border-orange-300 dark:border-orange-700',
                        'bg-gradient-to-br from-pink-100 to-pink-200 dark:from-pink-900/30 dark:to-pink-800/30 text-pink-700 dark:text-pink-300 border-pink-300 dark:border-pink-700',
                    ];
                    $colorClass = $colorClasses[$i % 5];
                  @endphp

                  <div
                    class="group/skill {{ $colorClass }} relative overflow-hidden rounded-xl border p-4 transition-all duration-300 hover:scale-105 hover:shadow-lg"
                    x-data="{ skillHovered: false }"
                    @mouseenter="skillHovered = true"
                    @mouseleave="skillHovered = false"
                  >
                    <!-- Skill Content -->
                    <div class="relative z-10 text-center">
                      <div class="text-sm font-semibold leading-tight">
                        {{ $skillItem }}
                      </div>

                      <!-- Skill Level Indicator -->
                      <div
                        class="mx-auto mt-2 h-1 w-8 rounded-full bg-current opacity-30 transition-opacity group-hover/skill:opacity-60"
                      ></div>
                    </div>

                    <!-- Hover Glow Effect -->
                    <div
                      class="absolute -inset-0.5 rounded-xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 opacity-0 blur transition-opacity duration-300 group-hover/skill:opacity-20"
                    ></div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Hover Glow Effect -->
            <div
              class="absolute -inset-0.5 rounded-2xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 opacity-0 blur transition-opacity duration-500 group-hover:opacity-20"
            ></div>
          </div>
        </article>
      @endforeach
    </div>

    <!-- Premium Call to Action -->
    <div class="mt-20 text-center">
      <div
        class="mx-auto max-w-4xl rounded-3xl border border-white/10 bg-gradient-to-br from-blue-900/20 via-purple-900/20 to-pink-900/20 p-8 backdrop-blur-sm md:p-12 dark:from-blue-500/10 dark:via-purple-500/10 dark:to-pink-500/10"
      >
        <h3 class="mb-4 text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
          Ready to Build Something Amazing?
        </h3>
        <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
          Let's leverage these technologies to create innovative solutions for your next project.
        </p>

        <div class="flex flex-col justify-center gap-4 sm:flex-row">
          <a
            href="#contact"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-blue-700 hover:to-purple-700 hover:shadow-xl"
          >
            <x-lucide-rocket class="mr-2 h-5 w-5" />
            Start a Project
          </a>

          <a
            href="#projects"
            class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-8 py-4 text-base font-semibold text-gray-700 shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
          >
            <x-lucide-eye class="mr-2 h-5 w-5" />
            See My Work
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
