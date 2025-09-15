<x-layout>
  <div class="bg-background min-h-screen font-sans antialiased selection:bg-purple-500/20 selection:text-purple-500">
    <!-- Enhanced background with multiple light effects -->
    <div
      class="bg-background fixed inset-0 -z-10 h-full w-full bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.4),rgba(255,255,255,0))]"
    >
    </div>
    <!-- Main top light glow effect -->
    <div class="light-glow fixed left-0 right-0 top-0 -z-10 h-[500px]">
    </div>
    <!-- Centered light beam -->
    <div class="light-beam fixed left-1/2 top-0 -z-10 h-[400px] w-[600px] -translate-x-1/2 opacity-80 blur-2xl">
    </div>
    <!-- Additional subtle glow for more depth -->
    <div
      class="dark:from-purple-500/8 dark:via-pink-500/3 fixed left-0 right-0 top-0 -z-10 h-72 bg-gradient-to-b from-purple-500/10 via-pink-500/5 to-transparent dark:to-transparent"
    >
    </div>

    <!-- Login Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="w-full max-w-md">

        <!-- Back to Portfolio Link -->
        <div class="mb-8 text-center">
          <a
            href="/"
            class="text-muted-foreground hover:text-foreground group inline-flex items-center text-sm transition-colors"
            x-data
            @mouseenter="animate($el, { x: -5 }, { duration: 0.2 })"
            @mouseleave="animate($el, { x: 0 }, { duration: 0.2 })"
          >
            <x-lucide-arrow-left class="mr-2 size-4 transition-transform group-hover:-translate-x-1" />
            Back to Portfolio
          </a>
        </div>

        <!-- Login Card -->
        <x-ui.glass-card
          class="p-8 transition-all duration-500 hover:shadow-2xl"
          x-data
          x-init="$el.style.opacity = '0';
          $el.style.transform = 'translateY(20px)';
          setTimeout(() => animate($el, { opacity: 1, y: [20, 0] }, { duration: 0.6 }), 100);"
        >
          <!-- Header -->
          <div class="mb-8 text-center">
            <div class="mb-4 flex justify-center">
              <div
                class="flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg"
                x-data
                x-init="setTimeout(() => animate($el, { scale: [0.8, 1], rotate: [0, 360] }, { duration: 0.8 }), 200)"
              >
                <x-lucide-lock-keyhole class="size-6 text-white" />
              </div>
            </div>
            <h1
              class="mb-2 text-2xl font-bold"
              x-data
              x-init="$el.style.opacity = '0';
              setTimeout(() => animate($el, { opacity: 1, y: [-10, 0] }, { duration: 0.5 }), 300);"
            >
              Dashboard Access
            </h1>
          </div>
          <!-- Error Messages -->
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

          <!-- Login Form -->
          <form
            method="POST"
            action="{{ route('login') }}"
            class="space-y-6"
          >
            @csrf

            <!-- Password Field -->
            <div
              class="space-y-2"
              x-data
              x-init="$el.style.opacity = '0';
              setTimeout(() => animate($el, { opacity: 1, x: [-20, 0] }, { duration: 0.5 }), 500);"
            >
              <label
                for="password"
                class="text-foreground block text-sm font-medium"
              >
                Password
                <span class="text-destructive ml-1">*</span>
              </label>

              <!-- Input Container -->
              <div class="group relative">
                <!-- Lock Icon -->
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <x-lucide-lock-keyhole
                    class="text-muted-foreground size-5 transition-colors group-focus-within:text-purple-500"
                  />
                </div>

                <x-dashboard.form.input
                  type="password"
                  name="password"
                  placeholder="Enter your dashboard password"
                  class="py-3 pl-10 pr-4"
                  required
                />
              </div>
            </div>


            <!-- Submit Button -->
            <div
              x-data
              x-init="$el.style.opacity = '0';
              setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.5 }), 700);"
            >
              <x-ui.button
                type="submit"
                class="w-full"
                x-data
                @mouseenter="animate($el, { scale: 1.02, y: -2 }, { duration: 0.2 })"
                @mouseleave="animate($el, { scale: 1, y: 0 }, { duration: 0.2 })"
                @mousedown="animate($el, { scale: 0.98 }, { duration: 0.1 })"
                @mouseup="animate($el, { scale: 1.02 }, { duration: 0.1 })"
              >
                <!-- Button content -->
                <span class="relative flex items-center justify-center">
                  Login
                </span>
              </x-ui.button>
            </div>
          </form>
        </x-ui.glass-card>
      </div>
    </div>
  </div>
</x-layout>
