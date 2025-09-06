<section id="skills" class="py-12 bg-gradient-to-b from-background to-muted/20">
  <div class="container max-w-4xl mx-auto px-6 md:px-4">
    <h2
      class="text-2xl font-bold mb-8 text-center md:text-left"
      x-data
      x-intersect="$el.animate([{opacity:0, y:20}, {opacity:1, y:0}], {duration:500})"
    >
      🛠️ Skills
    </h2>

    {{-- Programming Languages --}}
    <div class="space-y-6">
      @foreach($personalData["skills"] as $key => $skill)
        <x-ui.glass-card class="p-4" x-data
                         x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
          <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
            <span class="mr-2 text-xl">{{ $skill["emoji"] }}</span> {{ $key }}
          </h3>
          <div class="flex flex-wrap gap-2 justify-center md:justify-start">
            @foreach($skill["list"] as $i => $s)
              <x-ui.skill-tag :skill="$s" :index="$i"/>
            @endforeach
          </div>
        </x-ui.glass-card>
      @endforeach

      {{-- Frontend Development --}}


      {{-- Backend Development --}}


      {{-- Database & Storage --}}


      {{-- Cloud & DevOps --}}

      {{-- Tools & Services --}}
    </div>
  </div>
</section>
