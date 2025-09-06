<x-layout>
  <div class="min-h-screen bg-background font-sans antialiased selection:bg-purple-500/20 selection:text-purple-500">
    <!-- Enhanced background with multiple light effects -->
    <div
      class="fixed inset-0 -z-10 h-full w-full bg-background bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.4),rgba(255,255,255,0))]"
    >
    </div>
    <!-- Main top light glow effect -->
    <div
      class="fixed top-0 left-0 right-0 -z-10 h-[500px] light-glow"
    >
    </div>
    <!-- Centered light beam -->
    <div
      class="fixed top-0 left-1/2 -translate-x-1/2 -z-10 w-[600px] h-[400px] light-beam blur-2xl opacity-80"
    >
    </div>
    <!-- Additional subtle glow for more depth -->
    <div
      class="fixed top-0 left-0 right-0 -z-10 h-72 bg-gradient-to-b from-purple-500/10 via-pink-500/5 to-transparent dark:from-purple-500/8 dark:via-pink-500/3 dark:to-transparent"
    >
    </div>

    <!-- Login Container -->
    <div class="min-h-screen flex items-center justify-center p-4">
      <div class="w-full max-w-md">

        <!-- Back to Portfolio Link -->
        <div class="mb-8 text-center">
          <a
            href="/"
            class="inline-flex items-center text-sm text-muted-foreground hover:text-foreground transition-colors group"
            x-data
            @mouseenter="animate($el, { x: -5 }, { duration: 0.2 })"
            @mouseleave="animate($el, { x: 0 }, { duration: 0.2 })"
          >
            <x-lucide-arrow-left class="size-4 mr-2 group-hover:-translate-x-1 transition-transform"/>
            Back to Portfolio
          </a>
        </div>

        <!-- Login Card -->
        <x-ui.glass-card
          class="p-8 hover:shadow-2xl transition-all duration-500"
          x-data
          x-init="
            $el.style.opacity = '0';
            $el.style.transform = 'translateY(20px)';
            setTimeout(() => animate($el, { opacity: 1, y: [20,0] }, { duration: 0.6 }), 100);
          "
        >
          <!-- Header -->
          <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
              <div
                class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-lg"
                x-data
                x-init="setTimeout(() => animate($el, { scale: [0.8, 1], rotate: [0, 360] }, { duration: 0.8 }), 200)"
              >
                <x-lucide-lock-keyhole class="size-6 text-white"/>
              </div>
            </div>
            <h1
              class="text-2xl font-bold mb-2"
              x-data
              x-init="
                $el.style.opacity = '0';
                setTimeout(() => animate($el, { opacity: 1, y: [-10,0] }, { duration: 0.5 }), 300);
              "
            >
              Dashboard Access
            </h1>
          </div>
          <!-- Error Messages -->
          @if ($errors->any())
            <div
              class="mb-5 p-4 bg-destructive/10 border border-destructive/20 rounded-lg"
              x-data
              x-init="
                  $el.style.opacity = '0';
                  setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.3 }), 200);
                "
            >
              <div class="flex items-center">
                <svg class="w-5 h-5 text-destructive mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <span class="text-sm font-medium text-destructive">
                    {{ $errors->first() }}
                  </span>
              </div>
            </div>
          @endif

          <!-- Login Form -->
          <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Password Field -->
            <div
              class="space-y-2"
              x-data
              x-init="
                $el.style.opacity = '0';
                setTimeout(() => animate($el, { opacity: 1, x: [-20,0] }, { duration: 0.5 }), 500);
              "
            >
              <label for="password" class="block text-sm font-medium text-foreground">
                Password
                <span class="text-destructive ml-1">*</span>
              </label>

              <!-- Input Container -->
              <div class="relative group">
                <!-- Lock Icon -->
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-muted-foreground group-focus-within:text-purple-500 transition-colors"
                       fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                </div>

                <!-- Password Input -->
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Enter your dashboard password"
                  required
                  class="w-full rounded-lg border border-border/50 bg-background/80 backdrop-blur-sm pl-10 pr-4 py-3 text-sm transition-all duration-200 placeholder:text-muted-foreground/70 focus:border-purple-500 focus:bg-background focus:outline-none focus:ring-2 focus:ring-purple-500/20 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-card/30"
                  x-data="{ focused: false }"
                  @focus="focused = true; animate($el.parentElement, { scale: 1.02 }, { duration: 0.2 })"
                  @blur="focused = false; animate($el.parentElement, { scale: 1 }, { duration: 0.2 })"
                >

                <!-- Focus Ring Effect -->
                <div
                  class="absolute inset-0 rounded-lg bg-gradient-to-r from-purple-500/20 to-pink-500/20 opacity-0 transition-opacity duration-200 pointer-events-none"
                  x-show="focused"
                  x-transition:enter="transition ease-out duration-200"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition ease-in duration-200"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                ></div>
              </div>
            </div>


            <!-- Submit Button -->
            <div
              x-data
              x-init="
                $el.style.opacity = '0';
                setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.5 }), 700);
              "
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
