<section id="skills" class="py-12 bg-gradient-to-b from-background to-muted/20">
  <div class="container max-w-4xl mx-auto px-6 md:px-4">
    <h2
      class="text-2xl font-bold mb-8 text-center md:text-left"
      x-data
      x-intersect="$el.animate([{opacity:0, y:20}, {opacity:1, y:0}], {duration:500})"
    >
      🛠️ Skills
    </h2>

    <div class="space-y-6">
      {{-- Programming Languages --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">💻</span> Programming Languages
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['programmingLanguages'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>

      {{-- Frontend Development --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">🎨</span> Frontend Development
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['frontendDevelopment'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>

      {{-- Backend Development --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">⚙️</span> Backend Development
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['backendDevelopment'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>

      {{-- Database & Storage --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">🗄️</span> Database & Storage
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['databaseAndStorage'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>

      {{-- Cloud & DevOps --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">☁️</span> Cloud & DevOps
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['devOps'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>

      {{-- Tools & Services --}}
      <x-ui.glass-card class="p-4" x-data x-intersect="$el.animate([{opacity:0,y:20},{opacity:1,y:0}],{duration:500})">
        <h3 class="text-lg font-medium mb-3 text-center md:text-left flex items-center">
          <span class="mr-2 text-xl">🧰</span> Tools & Services
        </h3>
        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
          @foreach($personalData["skills"]['toolsAndServices'] as $i => $skill)
            <x-ui.skill-tag :skill="$skill" :index="$i"/>
          @endforeach
        </div>
      </x-ui.glass-card>
    </div>
  </div>
</section>
