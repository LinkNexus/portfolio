<x-layout>
  <div class="min-h-screen bg-background font-sans antialiased selection:bg-purple-500/20 selection:text-purple-500">
    <div
      class="fixed inset-0 -z-10 h-full w-full bg-background bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"
    >
    </div>
    <x-header/>

    <main class="min-h-screen">
      <x-sections.hero/>
      <x-sections.experience/>
      <x-sections.skills/>
      <x-sections.projects/>
      <x-sections.education/>
    </main>

    <x-footer/>

  </div>
</x-layout>

