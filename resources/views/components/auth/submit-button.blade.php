@props([
    'class' => '',
])

<div 
  x-data
  x-init="
    $el.style.opacity = '0';
    setTimeout(() => animate($el, { opacity: 1, scale: [0.95, 1] }, { duration: 0.5 }), 800);
  "
>
  <button
    type="submit"
    {{ $attributes->merge([
        'class' => 'w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed group relative overflow-hidden ' . $class
    ]) }}
    x-data
    @mouseenter="animate($el, { scale: 1.02, y: -2 }, { duration: 0.2 })"
    @mouseleave="animate($el, { scale: 1, y: 0 }, { duration: 0.2 })"
    @mousedown="animate($el, { scale: 0.98 }, { duration: 0.1 })"
    @mouseup="animate($el, { scale: 1.02 }, { duration: 0.1 })"
  >
    <!-- Background shimmer effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
    
    <!-- Button content -->
    <span class="relative flex items-center justify-center">
      <!-- Loading spinner -->
      <svg 
        x-show="isLoading" 
        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" 
        xmlns="http://www.w3.org/2000/svg" 
        fill="none" 
        viewBox="0 0 24 24"
        x-transition
      >
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      
      <!-- Lock icon when not loading -->
      <svg 
        x-show="!isLoading" 
        class="w-5 h-5 mr-2" 
        fill="none" 
        stroke="currentColor" 
        viewBox="0 0 24 24"
        x-transition
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
      </svg>
      
      {{ $slot }}
    </span>
  </button>
</div>
