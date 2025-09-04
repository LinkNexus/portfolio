<section id="education" class="py-12 bg-gradient-to-b from-muted/10 to-background">
  <div class="container max-w-4xl mx-auto px-6 md:px-4">
    {{-- Section Heading --}}
    <h2 class="text-2xl font-bold mb-8 text-center md:text-left" x-data
        x-init="$el.style.opacity = '0'; animate($el, { opacity: 1 }, { duration: 0.5 })">
      🎓 Education
    </h2>

    <div class="mb-8">
      @foreach($personalData["education"] as $index => $edu)
        <x-timeline
          title="🎓 {!! $edu['degree'] !!}"
          subtitle="🏛️ {!! $edu['institution'] !!}"
          date="📅 {!! $edu['period'] !!}"
          :is-last="$loop->last"
          :index="$index"
          x-data
          x-init="
                        $el.style.opacity = 0;
                        setTimeout(() => animate($el, { opacity: 1, y: [-10,0] }, { duration: 0.6 }), {{ $index * 200 }});
                    "
        >
          {{-- Location --}}
          <p class="text-sm text-muted-foreground mb-3">📍 {{ $edu['location'] }}</p>

          {{-- Achievements --}}
          @if(!empty($edu['achievements']))
            <div
              class="mt-3 p-4 bg-background/80 backdrop-blur-sm backdrop-filter rounded-lg border border-purple-500/20 dark:bg-card/10 dark:border-purple-500/10 shadow-sm"
              x-data
              x-init="
                                $el.style.opacity = '0';
                                animate($el, { opacity: 1, y: [20,0] }, { duration: 0.5, delay: 0.2 });
                             ">
              <div class="flex items-center mb-3">
                <div class="h-6 w-6 flex items-center justify-center rounded-full bg-purple-500/10 mr-2">
                  {{-- Award Icon (inline Lucide SVG) --}}
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none"
                       viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 15l-3.5 2.1 1-4.2-3.2-2.6 4.3-.3L12 6l1.4 4.1 4.3.3-3.2 2.6 1 4.2L12 15z"/>
                  </svg>
                </div>
                <h4 class="text-sm font-medium">✨ Achievements & Activities</h4>
              </div>
              <ul class="list-none ml-4 space-y-2 text-sm">
                @foreach($edu['achievements'] as $i => $achievement)
                  <li class="text-muted-foreground relative pl-6 opacity-0"
                      x-data
                      x-init="
                                            setTimeout(() => animate($el, { opacity: 1, x: [-10,0] }, { duration: 0.3 }), {{ $i * 100 }});
                                        ">
                    {{ $achievement }}
                  </li>
                @endforeach
              </ul>
            </div>
          @endif
        </x-timeline>
      @endforeach
    </div>
  </div>
</section>
