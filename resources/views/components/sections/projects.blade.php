<section
  id="projects"
  class="relative overflow-hidden py-20 lg:py-28"
>
  <!-- Background Elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-purple-50/30 via-transparent to-pink-50/30 dark:from-purple-950/20 dark:via-transparent dark:to-pink-950/20"
  ></div>
  <div class="absolute left-1/4 top-0 h-96 w-96 -translate-y-1/2 transform rounded-full bg-purple-500/5 blur-3xl"></div>
  <div class="absolute bottom-0 right-1/4 h-96 w-96 translate-y-1/2 transform rounded-full bg-pink-500/5 blur-3xl"></div>

  <div class="container relative mx-auto max-w-7xl px-6 md:px-8">
    <!-- Enhanced Section Header -->
    <div class="mb-16 text-center lg:mb-20">
      <!-- Badge -->
      <div
        class="mb-6 inline-flex items-center rounded-full border border-purple-500/20 bg-gradient-to-r from-purple-500/10 to-pink-500/10 px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300"
      >
        <span class="relative mr-2 flex h-2 w-2">
          <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-purple-400 opacity-75"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-purple-500"></span>
        </span>
        Portfolio Showcase
      </div>

      <!-- Main Title -->
      <h2
        class="mb-6 bg-gradient-to-r from-gray-900 via-purple-800 to-pink-800 bg-clip-text text-4xl font-bold leading-tight text-transparent md:text-5xl lg:text-6xl dark:from-white dark:via-purple-200 dark:to-pink-200"
      >
        Featured Projects
        <span class="mt-2 block text-2xl md:text-3xl lg:text-4xl">& Creative Solutions 🚀</span>
      </h2>

      <!-- Subtitle -->
      <p class="text-muted-foreground mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Discover my journey through code, creativity, and innovation. Each project represents a unique challenge solved
        with modern technologies and thoughtful design.
      </p>
    </div>

    <!-- Premium Projects Grid -->
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:gap-10">
      @foreach ($personalData['projects'] as $index => $project)
        <article
          class="group relative"
          x-data="{ showDetails: false }"
        >
          <!-- Premium Glass Card -->
          <div
            class="relative h-full overflow-hidden rounded-2xl border border-white/20 bg-white/80 shadow-lg backdrop-blur-xl transition-all duration-500 hover:shadow-2xl group-hover:scale-[1.02] group-hover:border-purple-500/30 dark:border-gray-800/50 dark:bg-gray-900/80"
          >

            <!-- Gradient Overlay -->
            <div
              class="absolute inset-0 bg-gradient-to-br from-purple-500/[0.02] via-transparent to-pink-500/[0.02] opacity-0 transition-opacity duration-500 group-hover:opacity-100 dark:from-purple-400/[0.05] dark:to-pink-400/[0.05]"
            ></div>

            <!-- Content Container -->
            <div class="relative z-10 flex h-full flex-col">

              <!-- Enhanced Project Header -->
              <div class="relative p-6 pb-4">
                <!-- Project Name -->
                <div class="mb-4 flex items-start justify-between">
                  <div class="flex-1">
                    <div class="mb-2 flex items-center space-x-2">
                      <!-- Project Icon -->
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-lg"
                      >
                        <x-lucide-code class="h-5 w-5" />
                      </div>
                      <h3
                        class="text-xl font-bold leading-tight text-gray-900 transition-colors duration-300 group-hover:text-purple-600 dark:text-white dark:group-hover:text-purple-400"
                      >
                        {{ $project['name'] ?? 'Untitled Project' }}
                      </h3>
                    </div>

                  </div>
                </div>

                <!-- Enhanced Description -->
                <p class="mb-5 line-clamp-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                  {{ $project['description'] ?? 'A showcase project demonstrating modern development practices and innovative solutions.' }}
                </p>
              </div>

              <!-- Premium Technology Stack -->
              @if (!empty($project['languages']) && count($project['languages']) > 0)
                <div class="px-6 pb-4">
                  <div class="mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Tech
                      Stack</span>
                  </div>

                  <div class="flex flex-wrap gap-2">
                    @foreach (array_slice($project['languages'], 0, 4) as $techIndex => $tech)
                      @php
                        $colorClasses = [
                            'bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 text-purple-700 dark:text-purple-300 border-purple-300 dark:border-purple-700',
                            'bg-gradient-to-br from-pink-100 to-pink-200 dark:from-pink-900/30 dark:to-pink-800/30 text-pink-700 dark:text-pink-300 border-pink-300 dark:border-pink-700',
                            'bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/30 dark:to-blue-800/30 text-blue-700 dark:text-blue-300 border-blue-300 dark:border-blue-700',
                            'bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/30 dark:to-emerald-800/30 text-emerald-700 dark:text-emerald-300 border-emerald-300 dark:border-emerald-700',
                        ];
                        $colorClass = $colorClasses[$techIndex % 4];
                      @endphp
                      <span
                        class="{{ $colorClass }} inline-flex items-center rounded-lg border px-3 py-1.5 text-xs font-medium transition-all duration-200 hover:scale-105"
                      >
                        {{ $tech }}
                      </span>
                    @endforeach

                    @if (count($project['languages']) > 4)
                      <button
                        @click="showDetails = !showDetails"
                        class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-600 transition-all duration-200 hover:scale-105 hover:bg-purple-100 hover:text-purple-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-purple-900/30 dark:hover:text-purple-400"
                      >
                        <span x-show="!showDetails">+{{ count($project['languages']) - 4 }} more</span>
                        <span x-show="showDetails">Show less</span>
                      </button>
                    @endif
                  </div>

                  <!-- Expanded Technologies -->
                  <div
                    x-show="showDetails"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 max-h-0"
                    x-transition:enter-end="opacity-100 max-h-32"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 max-h-32"
                    x-transition:leave-end="opacity-0 max-h-0"
                    class="mt-3 overflow-hidden"
                  >
                    <div class="flex flex-wrap gap-2">
                      @if (!empty($project['languages']))
                        @foreach (array_slice($project['languages'], 4) as $tech)
                          <span
                            class="inline-flex items-center rounded-lg border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-700 dark:border-blue-800 dark:bg-blue-900/30 dark:text-blue-300"
                          >
                            {{ $tech }}
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              @endif

              <!-- Premium Action Buttons -->
              <div class="mt-auto p-6 pt-4">
                <div class="flex items-center space-x-3">

                  <!-- GitHub Link -->
                  @if (!empty($project['url']))
                    <a
                      href="{{ $project['url'] }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="group/btn flex flex-1 items-center justify-center space-x-2 rounded-xl bg-gray-100 px-4 py-3 text-sm font-semibold text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-gray-200 hover:shadow-lg dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
                    >
                      <x-lucide-github class="h-4 w-4 transition-transform duration-300 group-hover/btn:scale-110" />
                      <span>Source</span>
                      <x-lucide-external-link
                        class="h-3 w-3 opacity-60 transition-opacity group-hover/btn:opacity-100" />
                    </a>
                  @endif

                  <!-- Live Demo Link -->
                  @if (!empty($project['liveUrl']))
                    <a
                      href="{{ $project['liveUrl'] }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="group/btn flex flex-1 items-center justify-center space-x-2 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-4 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-purple-700 hover:to-pink-700 hover:shadow-xl"
                    >
                      <x-lucide-play class="h-4 w-4 transition-transform duration-300 group-hover/btn:scale-110" />
                      <span>Live Demo</span>
                      <x-lucide-external-link
                        class="h-3 w-3 opacity-80 transition-opacity group-hover/btn:opacity-100" />
                    </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    <!-- Premium Empty State -->
    @if (empty($personalData['projects']) || count($personalData['projects']) === 0)
      <div class="py-20 text-center">
        <div class="mx-auto max-w-lg">
          <!-- Animated Icon -->
          <div
            class="mx-auto mb-8 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-purple-500 to-pink-500 shadow-2xl"
          >
            <x-lucide-rocket class="h-12 w-12 animate-pulse text-white" />
          </div>

          <!-- Content -->
          <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Amazing Projects Coming Soon</h3>
          <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
            I'm currently crafting some incredible projects that will showcase cutting-edge technologies and innovative
            solutions. Stay tuned for updates!
          </p>

          <!-- Action Buttons -->
          <div class="flex flex-col justify-center gap-4 sm:flex-row">
            <a
              href="https://github.com/{{ $personalData['github'] ?? 'LinkNexus' }}"
              target="_blank"
              class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-purple-700 hover:to-pink-700 hover:shadow-xl"
            >
              <x-lucide-github class="mr-2 h-4 w-4" />
              View GitHub Profile
            </a>
            <a
              href="#contact"
              class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-6 py-3 text-sm font-semibold text-gray-700 shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
            >
              <x-lucide-mail class="mr-2 h-4 w-4" />
              Get In Touch
            </a>
          </div>
        </div>
      </div>
    @endif

    <!-- Call to Action Section -->
    <div class="mt-20 text-center">
      <div
        class="mx-auto max-w-4xl rounded-3xl border border-white/10 bg-gradient-to-br from-purple-900/20 via-pink-900/20 to-blue-900/20 p-8 backdrop-blur-sm md:p-12 dark:from-purple-500/10 dark:via-pink-500/10 dark:to-blue-500/10"
      >
        <h3 class="mb-4 text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
          Interested in Collaboration?
        </h3>
        <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
          I'm always excited to work on innovative projects and collaborate with fellow developers, designers, and
          entrepreneurs.
        </p>

        <div class="flex flex-col justify-center gap-4 sm:flex-row">
          <a
            href="#contact"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-purple-700 hover:to-pink-700 hover:shadow-xl"
          >
            <x-lucide-message-circle class="mr-2 h-5 w-5" />
            Let's Talk
          </a>

          <a
            href="https://github.com/{{ $personalData['github'] ?? 'LinkNexus' }}"
            target="_blank"
            class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-8 py-4 text-base font-semibold text-gray-700 shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
          >
            <x-lucide-github class="mr-2 h-5 w-5" />
            Follow My Work
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
