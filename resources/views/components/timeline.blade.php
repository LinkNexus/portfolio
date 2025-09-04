@props([
    'title',
    'subtitle' => '',
    'date' => '',
    'isLast' => false,
    'index' => 0,
])

<div
  class="relative flex gap-6"
  x-data
  x-intersect.once="
        animate($el, { opacity: [0,1], y: [20,0] }, { duration: 0.5, delay: {{ $index }} * 0.2 })
    "
>
  {{-- Timeline dot + line --}}
  <div class="flex flex-col items-center">
    <div
      class="flex h-[18px] w-[18px] rounded-full border border-purple-500/50 bg-background dark:bg-muted z-10"
      x-data
      x-intersect.once="
                animate($el, { scale: [0,1] }, { type: 'spring', stiffness: 300, damping: 15, delay: {{ $index }} * 0.2 + 0.2 })
            "
    ></div>

    @unless($isLast)
      <div
        class="w-px grow bg-gradient-to-b from-purple-500/50 to-pink-500/30 dark:from-purple-500/30 dark:to-pink-500/10"
        x-data
        x-intersect.once="
                    animate($el, { height: ['0px','100%'] }, { duration: 0.8, delay: {{ $index }} * 0.2 + 0.3 })
                "
      ></div>
    @endunless
  </div>

  {{-- Content --}}
  <div class="{{ $isLast ? '' : 'pb-8' }}">
    <div
      class="flex flex-col gap-0.5"
      x-data
      x-intersect.once="
                animate($el, { opacity: [0,1], x: [-20,0] }, { duration: 0.5, delay: {{ $index }} * 0.2 + 0.1 })
            "
    >
      <h3 class="font-medium">{{ $title }}</h3>
      <p class="text-sm text-muted-foreground">{{ $subtitle }}</p>
      <p class="text-xs text-muted-foreground/70 mb-2">{{ $date }}</p>
    </div>

    <div
      x-data
      x-intersect.once="
                animate($el, { opacity: [0,1] }, { duration: 0.5, delay: {{ $index }} * 0.2 + 0.4 })
            "
    >
      {{ $slot }}
    </div>
  </div>
</div>
