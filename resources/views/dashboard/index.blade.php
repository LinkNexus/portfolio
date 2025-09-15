<x-layout>
  <!-- Dashboard Header -->
  <x-dashboard.header />

  <!-- Main Content -->
  <main class="container mx-auto max-w-6xl p-6">
    <!-- Welcome Section -->
    <div class="mb-8">
      <h2 class="mb-2 text-3xl font-bold">Welcome back! 👋</h2>
      <p class="text-muted-foreground">Manage your portfolio content and settings from here.</p>
    </div>

    <x-ui.glass-card class="p-4 md:p-6">
      <!-- Personal Data Form -->
      <form
        class="space-y-6"
        method="POST"
        action="{{ route('dashboard') }}"
      >
        @csrf

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
              <div>
                @foreach ($errors->all() as $error)
                  <div class="text-destructive text-sm font-medium">
                    {{ $error }}
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif

        <!-- Personal Information Section (Expanded by default) -->
        <x-dashboard.sections.personal-infos />

        <!-- SEO & Meta Information Section -->
        <x-dashboard.sections.seo-meta />

        <!-- Work Experience Section -->
        <x-dashboard.sections.experience />

        <!-- Skills Section -->
        <x-dashboard.sections.skills />
        <!-- Education Section -->
        <x-dashboard.sections.education />

        <!-- Projects Section -->
        <div>
          <x-dashboard.sections.projects />
        </div>
        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-3 p-4">
          <x-ui.button
            type="button"
            variant="secondary"
          >
            Reset
          </x-ui.button>

          <x-ui.button variant="primary">
            Save Changes
          </x-ui.button>
        </div>
      </form>
    </x-ui.glass-card>
  </main>
</x-layout>
