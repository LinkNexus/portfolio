@php
  $links = ['skills','experience','projects','education'];
@endphp

<header
  class="sticky z-50 w-full backdrop-blur-md backdrop-filter bg-background/70 dark:bg-background/40 border-b border-border/40 supports-[backdrop-filter]:bg-background/60"
  x-data="{ isMenuOpen: false }">

  <div class="container max-w-4xl mx-auto p-4 flex justify-between items-center">
    {{-- Logo / Name --}}
    <a
      href="/"
      class="flex items-center text-lg font-medium"
      x-data
      x-init="animate($el, { scale: [1, 1.05] }, { duration: 0.2 })"
      @mouseenter="animate($el, { scale: 1.05 }, { duration: 0.2 })"
      @mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
      @mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
      @mouseup="animate($el, { scale: 1.05 }, { duration: 0.1 })"
    >
      ✨ {{ $personalData['name'] }}
    </a>

    {{-- Desktop Navigation --}}
    <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
      @foreach($links as $index => $item)
        <a
          href="#{{ $item }}"
          class="transition-colors hover:text-foreground/80 text-foreground/60"
          x-data
          x-init="animate($el, { opacity: [0,1], y: [-10,0] }, { duration: 0.2, delay: {{ $index }}*0.1 })"
          @mouseenter="animate($el, { y: -2 }, { duration: 0.2 })"
          @mouseleave="animate($el, { y: 0 }, { duration: 0.2 })"
        >
          @if($item==='experience')
            💼
          @endif
          @if($item==='skills')
            🛠️
          @endif
          @if($item==='projects')
            🚀
          @endif
          @if($item==='awards')
            🏆
          @endif
          @if($item==='education')
            🎓
          @endif
          {{ ucfirst($item) }}
        </a>
      @endforeach
    </nav>

    {{-- Mobile Menu Button --}}
    <div class="flex items-center space-x-2">
      <x-theme-toggle/>
      <button
        class="p-2 text-foreground md:hidden"
        @click="isMenuOpen = !isMenuOpen"
        x-data
        x-init
        @mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
        @mouseup="animate($el, { scale: 1 }, { duration: 0.1 })"
        aria-label="Toggle menu"
      >
        <span x-show="!isMenuOpen">☰</span>
        <span x-show="isMenuOpen">✕</span>
      </button>
    </div>
  </div>

  {{-- Mobile Navigation --}}
  <div
    class="md:hidden py-4 px-4 border-t border-border/10 backdrop-blur-md backdrop-filter bg-background/80 dark:bg-background/40"
    x-show="isMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 max-h-0"
    x-transition:enter-end="opacity-100 max-h-screen"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 max-h-screen"
    x-transition:leave-end="opacity-0 max-h-0"
  >
    <nav class="flex flex-col space-y-4 text-sm font-medium">
      @foreach($links as $index => $item)
        <a
          href="#{{ $item }}"
          class="transition-colors hover:text-foreground/80 text-foreground/60 py-2"
          @click="isMenuOpen = false"
          x-data
          x-init="animate($el, { opacity: [0,1], x: [-20,0] }, { duration: 0.2, delay: {{ $index }}*0.1 })"
        >
          @if($item==='experience')
            💼
          @endif
          @if($item==='skills')
            🛠️
          @endif
          @if($item==='projects')
            🚀
          @endif
          @if($item==='awards')
            🏆
          @endif
          @if($item==='education')
            🎓
          @endif
          {{ ucfirst($item) }}
        </a>
      @endforeach
    </nav>
  </div>

</header>
