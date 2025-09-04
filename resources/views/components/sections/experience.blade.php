<section
  id="experience"
  class="py-12 bg-gradient-to-b from-muted/20 to-background"
>
  <div class="container max-w-4xl mx-auto px-6 md:px-4">

    {{-- Section Heading --}}
    <h2
      class="text-2xl font-bold mb-8 text-center md:text-left flex items-center md:inline-block"
      x-data
    >
            <span
              class="inline-block mr-2"
              x-intersect.once="
                    animate($el, { rotate: [0,-10,10,-5,5,0] }, { duration: 0.5, delay: 0.2 })
                "
            >
                💼
            </span>
      Work Experience
    </h2>

    {{-- Timeline Items --}}
    <div class="mb-8">
      @foreach ($personalData["workExperience"] as $i => $job)
        <x-timeline
          :title="'👨‍💻 ' . $job['position'] . ' | ' . $job['company']"
          :subtitle="'🌍 ' . $job['location']"
          :date="'📅 ' . $job['period']"
          :is-last="$loop->last"
          :index="$i"
        >
          <div
            class="mt-3 p-4 bg-background/80 backdrop-blur-sm backdrop-filter rounded-lg border border-purple-500/20 dark:bg-card/10 dark:border-purple-500/10 shadow-sm"
            x-data
            x-intersect.once="
                            animate($el, { opacity: [0,1], y: [20,0] }, { duration: 0.5, delay: 0.2 })
                        "
          >
            <div class="flex items-center mb-3">
              <div class="h-6 w-6 flex items-center justify-center rounded-full bg-purple-500/10 mr-2">
                {{-- You can replace with a Blade icon --}}
                <x-lucide-briefcase class="h-4 w-4 text-purple-500"/>
              </div>
              <h4 class="text-sm font-medium">Key Achievements</h4>
            </div>

            <ul class="list-none ml-4 space-y-2 text-sm">
              @foreach ($job['achievements'] as $j => $achievement)
                <li
                  class="text-muted-foreground relative pl-6"
                  x-data
                  x-intersect.once="animate($el, { opacity: [0,1], x: [-10,0] }, { duration: 0.3, delay: 0.1 * {{ $j }} })"
                >
                  {{ $achievement }}
                </li>
              @endforeach
            </ul>
          </div>
        </x-timeline>
      @endforeach
    </div>
  </div>
</section>
