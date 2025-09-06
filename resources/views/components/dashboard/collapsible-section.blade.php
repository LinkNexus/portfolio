@props([
    'title',
    'subtitle' => null,
    'expanded' => false,
])

<div
  class="bg-card rounded-lg shadow-sm border border-border overflow-hidden"
  x-data="{ expanded: {{ $expanded ? 'true' : 'false' }} }"
>
  <!-- Header -->
  <button
    type="button"
    @click="expanded = !expanded"
    class="w-full flex items-center justify-between px-4 py-6 text-left hover:bg-muted/30 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:ring-inset"
  >
    <div class="flex items-center justify-center space-x-3 flex-1">
      <div>
        <h3 class="text-base font-semibold text-foreground text-center">{{ $title }}</h3>
        @if($subtitle)
          <p class="text-xs text-muted-foreground mt-0.5">{{ $subtitle }}</p>
        @endif
      </div>
    </div>

    <!-- Chevron Icon -->
    <div class="flex-shrink-0 ml-4">
      <svg
        class="w-4 h-4 text-muted-foreground transition-transform duration-200"
        :class="{ 'rotate-180': expanded }"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </div>
  </button>

  <!-- Content -->
  <div
    x-show="expanded"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 max-h-0"
    x-transition:enter-end="opacity-100 max-h-screen"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 max-h-screen"
    x-transition:leave-end="opacity-0 max-h-0"
    class="overflow-hidden"
  >
    <div class="px-4 pb-4 pt-2 space-y-6 border-t border-border">
      {{ $slot }}
    </div>
  </div>
</div>
