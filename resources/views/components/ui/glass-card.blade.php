@props([
    'hoverEffect' => true,
    'class' => '',
    'as' => 'div'
])

<{{ $as }}
  {{ $attributes->merge([
      'class' => "rounded-lg border border-border/50 bg-background/80 backdrop-blur-md backdrop-filter shadow-sm dark:bg-card/30 dark:backdrop-blur-md " .
                 ($hoverEffect ? 'hover:shadow-md transition-all duration-300 ease-in-out' : '') .
                 " " . $class
  ]) }}
  x-data
  @if($hoverEffect)
    x-on:mouseenter="animate($el, { y: -5 }, { duration: 0.2 })"
  x-on:mouseleave="animate($el, { y: 0 }, { duration: 0.2 })"
  @endif
>
  {{ $slot }}
</{{ $as }}>
