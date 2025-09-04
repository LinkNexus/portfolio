<footer class="border-t border-purple-500/10 py-6 bg-gradient-to-b from-background to-muted/20 backdrop-blur-sm">
  <div class="container max-w-4xl mx-auto px-6 md:px-4">
    <div class="flex flex-col md:flex-row justify-between items-center"
         x-data
         x-init="$el.style.opacity = '0'; animate($el, { opacity: 1, y: [20,0] }, { duration: 0.5 })">

      {{-- Left side --}}
      <p class="text-sm text-muted-foreground text-center md:text-left"
         x-data
         x-on:mouseenter="animate($el, { scale: 1.01 }, { duration: 0.2 })"
         x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })">
        &copy; {{ now()->year }} {{ $personalData['name'] }}. All rights reserved. ✨
      </p>

      {{-- Right side --}}
      <p class="text-sm text-muted-foreground mt-2 md:mt-0 text-center md:text-left"
         x-data
         x-init="
                   $el.style.opacity = '0';
                   setTimeout(() => animate($el, { opacity: 1 }, { duration: 0.5 }), 200);
               "
         x-on:mouseenter="animate($el, { scale: 1.01 }, { duration: 0.2 })"
         x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })">
        Built with
        <span class="inline-block"
              x-data
              x-on:mouseenter="animate($el, { rotate: 360 }, { duration: 0.5 })"
              x-on:mouseleave="animate($el, { rotate: 0 }, { duration: 0.5 })">
                    💻
                </span>
        and
        <span class="inline-block"
              x-data
              x-init="animate($el, { scale: [1, 1.2, 1] }, { duration: 1.5, repeat: Infinity, direction: 'alternate' })">
                    ❤️
                </span>
      </p>
    </div>
  </div>
</footer>

