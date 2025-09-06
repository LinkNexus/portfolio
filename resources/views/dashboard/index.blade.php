<x-layout>
  <!-- Dashboard Header -->
  <x-dashboard.header/>

  <!-- Main Content -->
  <main class="container max-w-6xl mx-auto p-6">
    <!-- Welcome Section -->
    <div class="mb-8">
      <h2 class="text-3xl font-bold mb-2">Welcome back! 👋</h2>
      <p class="text-muted-foreground">Manage your portfolio content and settings from here.</p>
    </div>

    <x-ui.glass-card class="p-4 md:p-6">
      <!-- Personal Data Form -->
      <form class="space-y-6" method="POST">
        @csrf
        <!-- Personal Information Section (Expanded by default) -->
        <x-dashboard.sections.personal-infos/>

        <!-- SEO & Meta Information Section -->
        <x-dashboard.sections.seo-meta/>

        <!-- Work Experience Section -->
        <x-dashboard.sections.experience/>

        <!-- Skills Section -->
        <x-dashboard.sections.skills/>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-6">
          <x-ui.button type="button" variant="secondary">
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
