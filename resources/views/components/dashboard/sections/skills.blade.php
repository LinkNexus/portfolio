<x-dashboard.collapsible-section
  title="Skills & Technologies"
  subtitle="Organize your technical skills into categories"
>
  <div class="space-y-6" x-data="{ skills: {{ json_encode($personalData['skills'] ?? []) }} }">

    <!-- Existing Skill Categories -->
    <template x-for="(skill, categoryKey) in skills" :key="categoryKey">
      <div class="bg-muted/30 border border-border rounded-lg p-4 space-y-4">
        <div class="flex items-center justify-between">
          <div class="space-y-1">
            <h5 class="font-medium text-foreground capitalize"
                x-text="categoryKey"></h5>
            <p class="text-xs text-muted-foreground" x-text="`${skill.list.length} skills`"></p>
          </div>
          <x-ui.button
            variant="ghost"
            type="button"
            @click="delete skills[categoryKey]"
            class="text-destructive hover:text-destructive/80 px-2 py-1 rounded transition-colors"
          >
            <x-lucide-trash-2 class="size-4"/>
          </x-ui.button>
        </div>

        <!-- Category Name Editor -->
        <div class="grid grid-cols-2 md:grid-cols-8 gap-6">
          <div class="md:col-span-2">
            <x-dashboard.form.field
              label="Emoji"
              ::value="skill.emoji"
            />
          </div>
          <div class="md:col-span-6">
            <x-dashboard.form.field
              label="Name"
              ::value="categoryKey"
              @input="
                  let newKey = $event.target.value;
                  if (newKey !== categoryKey && newKey) {
                    skills[newKey] = skills[categoryKey];
                    delete skills[categoryKey];
                    categoryKey = newKey;
                  }
              "
              placeholder="e.g., Programming Languages"
            />
          </div>
        </div>

        <!-- Skills in Category -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-foreground">Skills</label>
          <div class="space-y-2">
            <template x-for="(s, skillIndex) in skill.list" :key="skillIndex">
              <div class="flex gap-2 items-center justify-center">
                <x-dashboard.form.input
                  type="text"
                  x-model="skill.list[skillIndex]"
                  class="flex-1"
                  placeholder="Enter skill name"
                />
                <x-ui.button
                  variant="ghost"
                  type="button"
                  @click="skill.list.splice(skillIndex, 1)"
                  class="text-destructive hover:text-destructive/80 px-2 py-1 rounded transition-colors"
                >
                  <x-lucide-x class="size-4"/>
                </x-ui.button>
              </div>
            </template>

            <button
              type="button"
              @click="skill.list.push('')"
              class="text-sm text-purple-500 hover:text-purple-600 px-2 py-1 rounded transition-colors"
            >
              + Add Skill
            </button>
          </div>
        </div>

        <!-- Skill Tags Preview -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-foreground">Preview</label>
          <div class="flex flex-wrap gap-2">
            <template x-for="s in skill.list.filter(s => s.trim())" :key="s">
                      <span
                        class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300"
                        x-text="s"></span>
            </template>
          </div>
        </div>
      </div>
    </template>

    <!-- Add New Category Section -->
    <div class="space-y-4" x-data="{ showNewCategory: false, newCategoryName: '', newCategorySkills: [''] }">

      <!-- Add New Category Button -->
      <button
        type="button"
        @click="showNewCategory = !showNewCategory"
        x-show="!showNewCategory"
        class="w-full border-2 border-dashed border-border hover:border-purple-500 rounded-lg p-6 text-center text-muted-foreground hover:text-purple-500 transition-colors group"
      >
        <div class="space-y-2">
          <div
            class="mx-auto w-8 h-8 rounded-full bg-muted group-hover:bg-purple-500/10 flex items-center justify-center transition-colors">
            <span class="text-lg group-hover:text-purple-500">+</span>
          </div>
          <p class="text-sm font-medium">Add Skill Category</p>
          <p class="text-xs">Create a new category to organize your skills</p>
        </div>
      </button>

      <!-- New Category Form -->
      <div x-show="showNewCategory" class="bg-muted/30 border border-border rounded-lg p-4 space-y-4">
        <div class="flex items-center justify-between">
          <h5 class="font-medium text-foreground">New Skill Category</h5>
          <button
            type="button"
            @click="showNewCategory = false; newCategoryName = ''; newCategorySkills = ['']"
            class="text-muted-foreground hover:text-foreground text-sm px-2 py-1 rounded transition-colors"
          >
            Cancel
          </button>
        </div>

        <!-- Category Name -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-foreground">Category Name</label>
          <input
            type="text"
            x-model="newCategoryName"
            class="w-full rounded-lg border border-border/50 bg-background/80 backdrop-blur-sm px-4 py-3 text-sm transition-all duration-200 placeholder:text-muted-foreground/70 focus:border-purple-500 focus:bg-background focus:outline-none focus:ring-2 focus:ring-purple-500/20"
            placeholder="e.g., Design Tools, Mobile Development"
          >
        </div>

        <!-- Skills -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-foreground">Skills</label>
          <div class="space-y-2">
            <template x-for="(skill, index) in newCategorySkills" :key="index">
              <div class="flex gap-2">
                <input
                  type="text"
                  x-model="newCategorySkills[index]"
                  class="flex-1 rounded-lg border border-border/50 bg-background/80 backdrop-blur-sm px-4 py-2 text-sm transition-all duration-200 placeholder:text-muted-foreground/70 focus:border-purple-500 focus:bg-background focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                  placeholder="Enter skill name"
                >
                <button
                  type="button"
                  @click="newCategorySkills.splice(index, 1)"
                  x-show="newCategorySkills.length > 1"
                  class="text-destructive hover:text-destructive/80 px-2 py-1 rounded transition-colors"
                >
                  ×
                </button>
              </div>
            </template>

            <button
              type="button"
              @click="newCategorySkills.push('')"
              class="text-sm text-purple-500 hover:text-purple-600 px-2 py-1 rounded transition-colors"
            >
              + Add Skill
            </button>
          </div>
        </div>

        <!-- Save Category Button -->
        <button
          type="button"
          @click="
                    if (newCategoryName.trim()) {
                      let categoryKey = newCategoryName.replace(/\s+/g, '').replace(/^./, str => str.toLowerCase());
                      skills[categoryKey] = newCategorySkills.filter(skill => skill.trim());
                      showNewCategory = false;
                      newCategoryName = '';
                      newCategorySkills = [''];
                    }
                  "
          :disabled="!newCategoryName.trim()"
          class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 disabled:opacity-50 disabled:cursor-not-allowed text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
        >
          Save Category
        </button>
      </div>
    </div>

    <!-- Hidden input to submit data -->
    <input type="hidden" name="skills" ::value="JSON.stringify(skills)">
  </div>
</x-dashboard.collapsible-section>
