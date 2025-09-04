<x-button
  variant="ghost"
  x-data="{ theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' }"
  @click="
        document.documentElement.classList.toggle('dark');
        theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    "
  class="rounded-full cursor-pointer"
  aria-label="Toggle theme"
>
  {{-- Icon --}}
  <template x-if="theme === 'light'">
    <x-lucide-moon class="size-5"/>
  </template>

  <template x-if="theme === 'dark'">
    <x-lucide-sun class="size-5"/>
  </template>

  <span class="sr-only">Toggle theme</span>
</x-button>
