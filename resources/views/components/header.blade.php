@php
  $links = ['skills','experience','projects','education'];
@endphp

<header
  class="sticky top-0 z-50 w-full backdrop-blur-xl backdrop-filter bg-white/80 dark:bg-gray-900/80 border-b border-white/20 dark:border-gray-800/50 shadow-lg supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-gray-900/60"
  x-data="{ isMenuOpen: false, scrolled: false }"
  x-init="
    window.addEventListener('scroll', () => {
      scrolled = window.scrollY > 20;
    });
  "
  :class="{ 'shadow-2xl border-purple-500/20': scrolled }"
>

  <div class="container max-w-7xl mx-auto px-6 md:px-8 py-4 flex justify-between items-center">
    {{-- Premium Logo / Name --}}
    <a
      href="/"
      class="flex items-center text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent hover:from-purple-700 hover:to-pink-700 transition-all duration-300"
      x-data
      x-init="animate($el, { scale: [1, 1.05] }, { duration: 0.2 })"
      @mouseenter="animate($el, { scale: 1.05 }, { duration: 0.2 })"
      @mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
      @mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
      @mouseup="animate($el, { scale: 1.05 }, { duration: 0.1 })"
    >
      <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-lg mr-3">
        <span class="text-lg">✨</span>
      </div>
      {{ $personalData['name'] }}
    </a>

    {{-- Premium Desktop Navigation --}}
    <nav class="hidden lg:flex items-center space-x-8">
      @foreach($links as $index => $item)
        <a
          href="#{{ $item }}"
          class="group relative px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-all duration-300"
          x-data
          x-init="animate($el, { opacity: [0,1], y: [-10,0] }, { duration: 0.3, delay: {{ $index }}*0.1 })"
        >
          <div class="flex items-center space-x-2">
            @if($item==='experience')
              <span class="text-base">💼</span>
            @endif
            @if($item==='skills')
              <span class="text-base">🛠️</span>
            @endif
            @if($item==='projects')
              <span class="text-base">🚀</span>
            @endif
            @if($item==='awards')
              <span class="text-base">🏆</span>
            @endif
            @if($item==='education')
              <span class="text-base">🎓</span>
            @endif
            <span>{{ ucfirst($item) }}</span>
          </div>
          
          <!-- Hover Effect -->
          <div class="absolute inset-0 rounded-lg bg-gradient-to-r from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
          <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 group-hover:w-full group-hover:left-0 transition-all duration-300"></div>
        </a>
      @endforeach
      
      <!-- Premium CTA Button -->
      <a
        href="#contact"
        class="ml-4 inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:from-purple-700 hover:to-pink-700 hover:scale-105 hover:shadow-xl"
      >
        <x-lucide-message-circle class="mr-2 h-4 w-4" />
        Let's Talk
      </a>
    </nav>

    {{-- Mobile Menu Controls --}}
    <div class="flex items-center space-x-3 lg:hidden">
      <x-theme-toggle/>
      
      <!-- Premium Mobile Menu Button -->
      <button
        class="relative p-3 rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 shadow-lg text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-all duration-300"
        @click="isMenuOpen = !isMenuOpen"
        x-data
        @mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
        @mouseup="animate($el, { scale: 1 }, { duration: 0.1 })"
        aria-label="Toggle menu"
      >
        <div class="relative w-5 h-5 flex items-center justify-center">
          <span 
            x-show="!isMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 rotate-90"
            x-transition:enter-end="opacity-100 rotate-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 rotate-0"
            x-transition:leave-end="opacity-0 rotate-90"
            class="absolute text-lg"
          >
            ☰
          </span>
          <span 
            x-show="isMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 rotate-90"
            x-transition:enter-end="opacity-100 rotate-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 rotate-0"
            x-transition:leave-end="opacity-0 rotate-90"
            class="absolute text-lg"
          >
            ✕
          </span>
        </div>
      </button>
    </div>

    <!-- Desktop Theme Toggle -->
    <div class="hidden lg:block">
      <x-theme-toggle/>
    </div>
  </div>

  {{-- Premium Mobile Navigation --}}
  <div
    class="lg:hidden absolute top-full left-0 w-full backdrop-blur-xl backdrop-filter bg-white/95 dark:bg-gray-900/95 border-b border-white/20 dark:border-gray-800/50 shadow-2xl"
    x-show="isMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-4"
    @click.outside="isMenuOpen = false"
  >
    <div class="container max-w-7xl mx-auto px-6 py-6">
      <nav class="flex flex-col space-y-4">
        @foreach($links as $index => $item)
          <a
            href="#{{ $item }}"
            class="group flex items-center space-x-3 p-4 rounded-xl bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm border border-white/30 dark:border-gray-700/30 shadow-lg hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:border-purple-500/30 transition-all duration-300"
            @click="isMenuOpen = false"
            x-data
            x-init="animate($el, { opacity: [0,1], x: [-30,0] }, { duration: 0.3, delay: {{ $index }}*0.1 })"
          >
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-md group-hover:scale-110 transition-transform duration-300">
              @if($item==='experience')
                <span class="text-lg">💼</span>
              @endif
              @if($item==='skills')
                <span class="text-lg">🛠️</span>
              @endif
              @if($item==='projects')
                <span class="text-lg">🚀</span>
              @endif
              @if($item==='awards')
                <span class="text-lg">🏆</span>
              @endif
              @if($item==='education')
                <span class="text-lg">🎓</span>
              @endif
            </div>
            
            <div class="flex-1">
              <div class="font-semibold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                {{ ucfirst($item) }}
              </div>
              <div class="text-sm text-gray-600 dark:text-gray-400">
                @if($item==='experience')
                  Professional journey
                @endif
                @if($item==='skills')
                  Technical expertise
                @endif
                @if($item==='projects')
                  Portfolio showcase
                @endif
                @if($item==='education')
                  Academic background
                @endif
              </div>
            </div>
            
            <x-lucide-chevron-right class="h-5 w-5 text-gray-400 group-hover:text-purple-500 group-hover:translate-x-1 transition-all duration-300" />
          </a>
        @endforeach
        
        <!-- Mobile CTA -->
        <a
          href="#contact"
          class="flex items-center justify-center space-x-3 p-4 mt-4 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg hover:from-purple-700 hover:to-pink-700 hover:scale-105 transition-all duration-300"
          @click="isMenuOpen = false"
        >
          <x-lucide-message-circle class="h-5 w-5" />
          <span class="font-semibold">Get In Touch</span>
        </a>
      </nav>
    </div>
  </div>

</header>
