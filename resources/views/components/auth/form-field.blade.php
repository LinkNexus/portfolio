@props([
    'label',
    'type' => 'text',
    'name',
    'placeholder' => '',
    'required' => false,
    'icon' => null,
    'class' => '',
])

<div 
  class="space-y-2"
  x-data
  x-init="
    $el.style.opacity = '0';
    setTimeout(() => animate($el, { opacity: 1, x: [-20,0] }, { duration: 0.5 }), {{ (isset($index) ? $index : 0) * 100 + 500 }});
  "
>
  <!-- Label -->
  <label for="{{ $name }}" class="block text-sm font-medium text-foreground">
    {{ $label }}
    @if($required)
      <span class="text-destructive ml-1">*</span>
    @endif
  </label>
  
  <!-- Input Container -->
  <div class="relative group">
    <!-- Icon -->
    @if($icon)
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        @if($icon === 'email')
          <svg class="h-5 w-5 text-muted-foreground group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
          </svg>
        @elseif($icon === 'lock')
          <svg class="h-5 w-5 text-muted-foreground group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
          </svg>
        @endif
      </div>
    @endif
    
    <!-- Input Field -->
    <input
      type="{{ $type }}"
      id="{{ $name }}"
      name="{{ $name }}"
      placeholder="{{ $placeholder }}"
      @if($required) required @endif
      {{ $attributes->merge([
          'class' => 'w-full rounded-lg border border-border/50 bg-background/80 backdrop-blur-sm px-4 py-3 text-sm transition-all duration-200 placeholder:text-muted-foreground/70 focus:border-purple-500 focus:bg-background focus:outline-none focus:ring-2 focus:ring-purple-500/20 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-card/30 ' . 
                     ($icon ? 'pl-10' : '') . 
                     ' ' . $class
      ]) }}
      x-data="{ focused: false }"
      @focus="focused = true; animate($el.parentElement, { scale: 1.02 }, { duration: 0.2 })"
      @blur="focused = false; animate($el.parentElement, { scale: 1 }, { duration: 0.2 })"
    >
    
    <!-- Focus Ring Effect -->
    <div 
      class="absolute inset-0 rounded-lg bg-gradient-to-r from-purple-500/20 to-pink-500/20 opacity-0 transition-opacity duration-200 pointer-events-none"
      x-data
      x-show="focused"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    ></div>
  </div>
  
  <!-- Helper Text or Validation -->
  @if($type === 'password')
    <p class="text-xs text-muted-foreground mt-1">
      Use a strong password with at least 8 characters
    </p>
  @endif
</div>
