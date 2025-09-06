<x-dashboard.collapsible-section
  title="Work Experience"
  subtitle="Manage your professional work history and achievements"
>
  <!-- Work Experience Entries -->
  <div class="space-y-4" x-data="{ experiences: {{ json_encode($personalData['workExperience'] ?? []) }} }">

    <!-- Existing Experience Entries -->
    <template x-for="(experience, index) in experiences" :key="index">
      <div class="bg-muted/30 border border-border rounded-lg p-4 space-y-4">
        <div class="flex items-center justify-between">
          <h5 class="font-medium text-foreground" x-text="`Experience ${index + 1}`"></h5>
          <x-ui.button
            variant="ghost"
            class="text-destructive hover:text-destructive/80"
            type="button"
            @click="experiences.splice(index, 1)"
          >
            <x-lucide-trash-2 class="size-4"/>
          </x-ui.button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Company -->
          <x-dashboard.form.field
            label="Company"
            x-model="experience.company"
            placeholder="Company name"
          />

          <!-- Position -->
          <x-dashboard.form.field
            label="Position"
            x-model="experience.position"
            placeholder="Job title"
          />

          <!-- Location -->
          <x-dashboard.form.field
            label="Location"
            x-model="experience.location"
            placeholder="City, Country"
          />

          <!-- Period -->
          <x-dashboard.form.field
            label="Period"
            x-model="experience.period"
            placeholder="e.g., January 2024 - Present"
          />
        </div>

        <!-- Achievements -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-foreground">Achievements & Responsibilities</label>
          <div class="space-y-2" x-data="{ achievements: experience.achievements || [] }">
            <template x-for="(achievement, achIndex) in achievements" :key="achIndex">
              <div class="flex gap-2">
                <x-dashboard.form.input
                  type="text"
                  x-model="achievements[achIndex]"
                  @input="experience.achievements = achievements"
                  class="flex-1"
                  placeholder="Describe an achievement or responsibility"
                />
                <x-ui.button
                  variant="ghost"
                  type="button"
                  @click="achievements.splice(achIndex, 1); experience.achievements = achievements"
                  class="text-destructive hover:text-destructive/80 px-2 py-1 rounded transition-colors"
                >
                  <x-lucide-x class="size-4"/>
                </x-ui.button>
              </div>
            </template>

            <button
              type="button"
              @click="achievements.push(''); experience.achievements = achievements"
              class="text-sm text-purple-500 hover:text-purple-600 px-2 py-1 rounded transition-colors"
            >
              + Add Achievement
            </button>
          </div>
        </div>
      </div>
    </template>

    <!-- Add New Experience Button -->
    <button
      type="button"
      @click="experiences.push({ company: '', position: '', location: '', period: '', achievements: [] })"
      class="w-full border-2 border-dashed border-border hover:border-purple-500 rounded-lg p-6 text-center text-muted-foreground hover:text-purple-500 transition-colors group"
    >
      <div class="space-y-2">
        <div
          class="mx-auto w-8 h-8 rounded-full bg-muted group-hover:bg-purple-500/10 flex items-center justify-center transition-colors">
          <span class="text-lg group-hover:text-purple-500">
            <x-lucide-plus class="size-4"/>
          </span>
        </div>
        <p class="text-sm font-medium">Add Work Experience</p>
        <p class="text-xs">Click to add a new position to your work history</p>
      </div>
    </button>

    <!-- Hidden input to submit data -->
    <input type="hidden" name="workExperience" ::value="JSON.stringify(experiences)">
  </div>
</x-dashboard.collapsible-section>
