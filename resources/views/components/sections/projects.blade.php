<section id="projects" class="py-12 relative">
  <div class="container max-w-4xl mx-auto px-6 md:px-4">
    <h2 class="text-2xl font-bold mb-8 text-center md:text-left"
        x-data
        x-init="$el.classList.add('opacity-0'); $nextTick(() => animate($el, { opacity: 1 }, { duration: 0.5 }));">
      🚀 Projects
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($personalData["projects"] as $index => $project)
        <x-ui.glass-card class="group overflow-hidden dark:border-purple-500/10 h-full flex flex-col"
                         x-data
                         x-init="
                        $el.style.opacity = 0;
                        setTimeout(() => animate($el, { opacity: 1, y: [-10,0] }, { duration: 0.5 }), {{ $index * 200 }});
                    "
        >
          {{-- Card Header --}}
          <div class="flex flex-col space-y-1.5 p-6 bg-gradient-to-r from-purple-500/5 to-pink-500/5">
            <h3
              class="text-lg font-medium leading-none tracking-tight text-center md:text-left group-hover:text-purple-500 transition-colors duration-300">
              {{ $project['title'] }}
            </h3>
          </div>

          {{-- Card Content --}}
          <div class="p-6 pt-0 flex-grow">
            <ul class="list-disc ml-4 space-y-1 text-sm group-hover:space-y-2 transition-all duration-300">
              @foreach($project['description'] as $i => $desc)
                <li class="text-muted-foreground opacity-0"
                    x-data
                    x-init="
                                        setTimeout(() => animate($el, { opacity: 1, x: [-10,0] }, { duration: 0.5 }), {{ $i * 100 }});
                                    "
                >
                  {{ $desc }}
                </li>
              @endforeach
            </ul>
          </div>

          {{-- Card Footer --}}
          <div
            class="flex items-center p-6 pt-0 justify-between border-t border-border/30 bg-gradient-to-r from-purple-500/5 to-pink-500/5">
            <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer"
               class="flex items-center text-sm text-muted-foreground hover:text-purple-500 transition-colors group/link pt-8"
               x-data
               x-on:mouseenter="animate($el, { scale: 1.05 }, { duration: 0.2 })"
               x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
               x-on:mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
               x-on:mouseup="animate($el, { scale: 1 }, { duration: 0.1 })"
            >
              <svg class="h-4 w-4 mr-2 group-hover/link:rotate-12 transition-transform duration-300" ...>...</svg>
              View on GitHub 🔗
            </a>

            @if(!empty($project['demo']))
              <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer"
                 class="flex items-center text-sm text-muted-foreground hover:text-purple-500 transition-colors group/link pt-8"
                 x-data
                 x-on:mouseenter="animate($el, { scale: 1.05 }, { duration: 0.2 })"
                 x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
                 x-on:mousedown="animate($el, { scale: 0.95 }, { duration: 0.1 })"
                 x-on:mouseup="animate($el, { scale: 1 }, { duration: 0.1 })"
              >
                <svg class="h-4 w-4 mr-2 group-hover/link:rotate-12 transition-transform duration-300" ...>...</svg>
                View Live Demo 🔗
              </a>
            @endif
          </div>
        </x-ui.glass-card>
      @endforeach
    </div>
  </div>
</section>
