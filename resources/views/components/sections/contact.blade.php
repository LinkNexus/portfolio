<section
  id="contact"
  class="relative overflow-hidden py-20 lg:py-28"
>
  <!-- Background Elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-indigo-50/30 via-transparent to-purple-50/30 dark:from-indigo-950/20 dark:via-transparent dark:to-purple-950/20"
  ></div>
  <div class="absolute right-1/4 top-0 h-96 w-96 -translate-y-1/2 transform rounded-full bg-indigo-500/5 blur-3xl"></div>
  <div class="absolute bottom-0 left-1/4 h-96 w-96 translate-y-1/2 transform rounded-full bg-purple-500/5 blur-3xl">
  </div>

  <div class="container relative mx-auto max-w-7xl px-6 md:px-8">
    <!-- Premium Section Header -->
    <div class="mb-16 text-center lg:mb-20">
      <!-- Badge -->
      <div
        class="mb-6 inline-flex items-center rounded-full border border-indigo-500/20 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 px-4 py-2 text-sm font-medium text-indigo-700 dark:text-indigo-300"
      >
        <span class="relative mr-2 flex h-2 w-2">
          <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-indigo-400 opacity-75"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-indigo-500"></span>
        </span>
        Let's Connect
      </div>

      <!-- Main Title -->
      <h2
        class="mb-6 bg-gradient-to-r from-gray-900 via-indigo-800 to-purple-800 bg-clip-text text-4xl font-bold leading-tight text-transparent md:text-5xl lg:text-6xl dark:from-white dark:via-indigo-200 dark:to-purple-200"
      >
        Get In Touch
        <span class="mt-2 block text-2xl md:text-3xl lg:text-4xl">Ready to Collaborate? 🚀</span>
      </h2>

      <!-- Subtitle -->
      <p class="text-muted-foreground mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        I'm always excited to discuss new opportunities, innovative projects, and creative collaborations. Let's build
        something amazing together!
      </p>
    </div>

    <!-- Contact Grid -->
    <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-16">

      <!-- Contact Information -->
      <div class="space-y-8">
        <div>
          <h3 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">
            Let's Start a Conversation
          </h3>
          <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
            Whether you have a project in mind, want to discuss opportunities, or just want to say hello, I'd love to
            hear from you.
          </p>
        </div>

        <!-- Contact Methods -->
        <div class="space-y-6">
          <!-- Email -->
          <a
            href="mailto:{{ $personalData['email'] ?? 'hello@example.com' }}"
            class="group flex items-center rounded-2xl border border-white/20 bg-white/80 p-6 shadow-lg backdrop-blur-xl transition-all duration-500 hover:scale-[1.02] hover:border-indigo-500/30 hover:shadow-2xl dark:border-gray-800/50 dark:bg-gray-900/80"
          >
            <div
              class="mr-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white shadow-lg transition-transform duration-300 group-hover:scale-110"
            >
              <x-lucide-mail class="h-7 w-7" />
            </div>
            <div class="flex-1">
              <h4
                class="text-lg font-semibold text-gray-900 transition-colors group-hover:text-indigo-600 dark:text-white dark:group-hover:text-indigo-400"
              >
                Email Me
              </h4>
              <p class="text-gray-600 dark:text-gray-400">
                {{ $personalData['email'] ?? 'hello@example.com' }}
              </p>
            </div>
            <x-lucide-external-link
              class="h-5 w-5 text-gray-400 transition-all duration-300 group-hover:translate-x-1 group-hover:text-indigo-500"
            />
          </a>

          <!-- LinkedIn -->
          <a
            href="https://linkedin.com/in/{{ $personalData['linkedin'] ?? '#' }}"
            target="_blank"
            class="group flex items-center rounded-2xl border border-white/20 bg-white/80 p-6 shadow-lg backdrop-blur-xl transition-all duration-500 hover:scale-[1.02] hover:border-blue-500/30 hover:shadow-2xl dark:border-gray-800/50 dark:bg-gray-900/80"
          >
            <div
              class="mr-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg transition-transform duration-300 group-hover:scale-110"
            >
              <x-lucide-linkedin class="h-7 w-7" />
            </div>
            <div class="flex-1">
              <h4
                class="text-lg font-semibold text-gray-900 transition-colors group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400"
              >
                Connect on LinkedIn
              </h4>
              <p class="text-gray-600 dark:text-gray-400">
                Professional networking
              </p>
            </div>
            <x-lucide-external-link
              class="h-5 w-5 text-gray-400 transition-all duration-300 group-hover:translate-x-1 group-hover:text-blue-500"
            />
          </a>

          <!-- GitHub -->
          <a
            href="https://github.com/{{ $personalData['github'] ?? '#' }}"
            target="_blank"
            class="group flex items-center rounded-2xl border border-white/20 bg-white/80 p-6 shadow-lg backdrop-blur-xl transition-all duration-500 hover:scale-[1.02] hover:border-gray-500/30 hover:shadow-2xl dark:border-gray-800/50 dark:bg-gray-900/80"
          >
            <div
              class="mr-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 text-white shadow-lg transition-transform duration-300 group-hover:scale-110"
            >
              <x-lucide-github class="h-7 w-7" />
            </div>
            <div class="flex-1">
              <h4
                class="text-lg font-semibold text-gray-900 transition-colors group-hover:text-gray-600 dark:text-white dark:group-hover:text-gray-400"
              >
                View My Code
              </h4>
              <p class="text-gray-600 dark:text-gray-400">
                Open source projects
              </p>
            </div>
            <x-lucide-external-link
              class="h-5 w-5 text-gray-400 transition-all duration-300 group-hover:translate-x-1 group-hover:text-gray-500"
            />
          </a>
        </div>

        <!-- Availability Status -->
        <div
          class="rounded-2xl border border-emerald-200 bg-gradient-to-br from-emerald-50 to-green-50 p-6 dark:border-emerald-800 dark:from-emerald-950/30 dark:to-green-950/30"
        >
          <div class="flex items-center space-x-4">
            <div class="relative flex h-3 w-3">
              <span
                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex h-3 w-3 rounded-full bg-emerald-500"></span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-emerald-800 dark:text-emerald-200">
                Currently Available
              </h4>
              <p class="text-emerald-700 dark:text-emerald-300">
                Open to new opportunities and collaborations
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="relative">
        <div class="sticky top-8">
          <div
            class="relative overflow-hidden rounded-2xl border border-white/20 bg-white/80 p-8 shadow-lg backdrop-blur-xl dark:border-gray-800/50 dark:bg-gray-900/80"
          >

            <!-- Gradient Overlay -->
            <div
              class="absolute inset-0 bg-gradient-to-br from-indigo-500/[0.02] via-transparent to-purple-500/[0.02] dark:from-indigo-400/[0.05] dark:to-purple-400/[0.05]"
            ></div>

            <!-- Form Content -->
            <div class="relative z-10">
              <h3 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">
                Send Me a Message
              </h3>

              <form
                class="space-y-6"
                action="{{ route('contact') }}"
                method="POST"
              >
                @csrf

                @session('success')
                  <div
                    class="mb-5 rounded-lg border border-emerald-50 bg-emerald-50 p-4"
                    x-data
                    x-init="$el.style.opacity = '0';
                    setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.3 }), 200);"
                  >
                    <div class="flex items-center">
                      <x-lucide-check-circle class="mr-2 h-5 w-5 text-emerald-400" />
                      <span class="text-sm font-medium text-emerald-400">
                        {{ $value }}
                      </span>
                    </div>
                  </div>
                @endsession

                @if ($errors->any())
                  <div
                    class="bg-destructive/10 border-destructive/20 mb-5 rounded-lg border p-4"
                    x-data
                    x-init="$el.style.opacity = '0';
                    setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.3 }), 200);"
                  >
                    <div class="flex items-center">
                      <svg
                        class="text-destructive mr-2 h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"
                        ></path>
                      </svg>
                      <span class="text-destructive text-sm font-medium">
                        {{ $errors->first() }}
                      </span>
                    </div>
                  </div>
                @endif

                <!-- Name -->
                <div>
                  <label
                    for="name"
                    class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300"
                  >
                    Your Name
                  </label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white/80 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800/80 dark:text-white dark:placeholder-gray-400"
                    placeholder="Enter your full name"
                  />
                </div>

                <!-- Email -->
                <div>
                  <label
                    for="email"
                    class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300"
                  >
                    Email Address
                  </label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white/80 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800/80 dark:text-white dark:placeholder-gray-400"
                    placeholder="your.email@example.com"
                  />
                </div>

                <!-- Subject -->
                <div>
                  <label
                    for="subject"
                    class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300"
                  >
                    Subject
                  </label>
                  <input
                    type="text"
                    id="subject"
                    name="subject"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white/80 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800/80 dark:text-white dark:placeholder-gray-400"
                    placeholder="What would you like to discuss?"
                  />
                </div>

                <!-- Message -->
                <div>
                  <label
                    for="message"
                    class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300"
                  >
                    Message
                  </label>
                  <textarea
                    id="message"
                    name="message"
                    rows="5"
                    required
                    class="w-full resize-none rounded-xl border border-gray-200 bg-white/80 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800/80 dark:text-white dark:placeholder-gray-400"
                    placeholder="Tell me about your project or what you'd like to discuss..."
                  ></textarea>
                </div>

                <!-- Submit Button -->
                <button
                  type="submit"
                  class="inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all duration-300 hover:scale-[1.02] hover:from-indigo-700 hover:to-purple-700 hover:shadow-xl"
                >
                  <x-lucide-send class="mr-2 h-5 w-5" />
                  Send Message
                </button>
              </form>

              <!-- Alternative Contact Note -->
              <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  Prefer email? Reach me directly at
                  <a
                    href="mailto:{{ $personalData['email'] ?? 'hello@example.com' }}"
                    class="font-semibold text-indigo-600 transition-colors hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300"
                  >
                    {{ $personalData['email'] ?? 'hello@example.com' }}
                  </a>
                </p>
              </div>
            </div>

            <!-- Hover Glow Effect -->
            <div
              class="absolute -inset-0.5 rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 opacity-0 blur transition-opacity duration-500 hover:opacity-10"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
