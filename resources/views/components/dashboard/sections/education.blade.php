<x-dashboard.collapsible-section
  title="Education"
  subtitle="Manage your educational background information"
  :expanded="true"
>
  <!-- Education Entries -->
  <div
    class="space-y-4"
    x-data="{ education: {{ json_encode($personalData['education'] ?? []) }} }"
  >

    <!-- Existing Education Entries -->
    <template
      x-for="(edu, index) in education"
      :key="index"
    >
      <div class="bg-muted/30 border-border space-y-4 rounded-lg border p-4">
        <div class="flex items-center justify-between">
          <h5
            class="text-foreground font-medium"
            x-text="`Education ${index + 1}`"
          ></h5>
          <x-ui.button
            variant="ghost"
            class="text-destructive hover:text-destructive/80"
            type="button"
            @click="education.splice(index, 1)"
          >
            <x-lucide-trash-2 class="size-4" />
          </x-ui.button>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
          <!-- Institution -->
          <x-dashboard.form.field
            label="Institution"
            x-model="edu.institution"
            placeholder="University or School name"
          />

          <!-- Degree -->
          <x-dashboard.form.field
            label="Degree"
            x-model="edu.degree"
            placeholder="e.g., Bachelor's in Computer Science"
          />

          <!-- Location -->
          <x-dashboard.form.field
            label="Location"
            x-model="edu.location"
            placeholder="City, Country"
          />

          <!-- Period -->
          <x-dashboard.form.field
            label="Period"
            x-model="edu.period"
            placeholder="e.g., September 2020 - June 2024"
          />
        </div>

        <!-- Achievements -->
        <div class="space-y-2">
          <label class="text-foreground block text-sm font-medium">Achievements & Notable Accomplishments</label>
          <div
            class="space-y-2"
            x-data="{ achievements: edu.achievements || [] }"
          >
            <template
              x-for="(achievement, achIndex) in achievements"
              :key="achIndex"
            >
              <div class="flex gap-2">
                <x-dashboard.form.input
                  type="text"
                  x-model="achievements[achIndex]"
                  @input="edu.achievements = achievements"
                  class="flex-1"
                  placeholder="Describe an achievement, project, or honor"
                />
                <x-ui.button
                  variant="ghost"
                  type="button"
                  @click="achievements.splice(achIndex, 1); edu.achievements = achievements"
                  class="text-destructive hover:text-destructive/80 rounded px-2 py-1 transition-colors"
                >
                  <x-lucide-x class="size-4" />
                </x-ui.button>
              </div>
            </template>

            <button
              type="button"
              @click="achievements.push(''); edu.achievements = achievements"
              class="rounded px-2 py-1 text-sm text-purple-500 transition-colors hover:text-purple-600"
            >
              + Add Achievement
            </button>
          </div>
        </div>
      </div>
    </template>

    <!-- Add New Education Button -->
    <button
      type="button"
      @click="education.push({ institution: '', degree: '', location: '', period: '', achievements: [] })"
      class="border-border text-muted-foreground group w-full rounded-lg border-2 border-dashed p-6 text-center transition-colors hover:border-purple-500 hover:text-purple-500"
    >
      <div class="space-y-2">
        <div
          class="bg-muted mx-auto flex h-8 w-8 items-center justify-center rounded-full transition-colors group-hover:bg-purple-500/10"
        >
          <span class="text-lg group-hover:text-purple-500">
            <x-lucide-plus class="size-4" />
          </span>
        </div>
        <p class="text-sm font-medium">Add Education</p>
        <p class="text-xs">Click to add a new educational entry to your background</p>
      </div>
    </button>

    <!-- Hidden input to submit data -->
    <input
      type="hidden"
      name="education"
      :value="JSON.stringify(education)"
    >
  </div>
</x-dashboard.collapsible-section>
