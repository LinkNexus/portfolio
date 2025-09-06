@props([
    'variant' => 'default',
    'size' => 'default',
    'as' => 'button',
])

@php
  $baseClasses = "inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors
      focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring cursor-pointer
      disabled:pointer-events-none disabled:opacity-50 disabled:cursor-normal";

  $variants = [
      'default' => "bg-primary text-primary-foreground shadow hover:bg-primary/90",
      'destructive' => "bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90",
      'outline' => "border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground",
      'secondary' => "bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80",
      'ghost' => "hover:bg-accent hover:text-accent-foreground",
      'link' => "text-primary underline-offset-4 hover:underline",
  ];

  $sizes = [
      'default' => "h-9 px-4 py-2",
      'sm' => "h-8 rounded-md px-3 text-xs",
      'lg' => "h-10 rounded-md px-8",
      'icon' => "h-9 w-9",
  ];

  $classes = trim($baseClasses . ' ' . ($variants[$variant] ?? $variants['default']) . ' ' . ($sizes[$size] ?? $sizes['default']) . ' ' . ($attributes['class'] ?? ''));
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</{{ $as }}>
