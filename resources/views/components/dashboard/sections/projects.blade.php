<x-dashboard.collapsible-section
  title="Projects & Repositories"
  subtitle="Manage your Github Repositories and Projects"
>
  <div
    class="space-y-6"
    x-data="{
        loading: false,
        selectedProjects: {{ json_encode($personalData['projects'] ?? []) }},
        showReposList: false,
        repositories: [],
        emptyProject: {
            id: 0,
            name: '',
            description: '',
            languages: [],
            url: '',
            liveUrl: ''
        },
        editingProject: {
            id: 0,
            name: '',
            description: '',
            languages: [],
            url: '',
            liveUrl: ''
        },
        showEditForm: false,
        notification: {
            show: false,
            message: '',
            type: 'success'
        },
        showNotification(message, type = 'success') {
            this.notification = { show: true, message, type };
            setTimeout(() => this.notification.show = false, 3000);
        },
        async fetchRepos() {
            this.loading = true;
            try {
                const response = await fetch(`https://api.github.com/users/{{ $personalData['github'] }}/repos?per_page=20&sort=updated&direction=desc`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();
                this.repositories = data;
            } catch (error) {
                console.error('Error fetching repositories:', error);
                this.showNotification('Failed to fetch repositories. Please try again.', 'error');
            } finally {
                this.loading = false;
            }
        },
        editProject(project) {
            this.editingProject = { ...project };
            this.showEditForm = true;
        },
        cancelEdit() {
            this.editingProject = { ...this.emptyProject };
            this.showEditForm = false;
        },
        removeProject(projectId) {
            if (confirm('Are you sure you want to remove this project?')) {
                this.selectedProjects = this.selectedProjects.filter(p => p.id !== projectId);
            }
        },
        saveProject() {
            if (this.editingProject && this.editingProject.name.trim()) {
                const projectIndex = this.selectedProjects.findIndex(p => p.id === this.editingProject.id);
                if (projectIndex !== -1) {
                    this.selectedProjects[projectIndex] = { ...this.editingProject };
                }
                this.cancelEdit();
                this.showNotification('Project updated successfully!', 'success');
            } else {
                this.showNotification('Please enter a project name.', 'error');
            }
        }
    }"
  >
    <!-- Notification -->
    <div
      x-show="notification.show"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-2"
      class="fixed right-4 top-4 z-50 max-w-sm"
    >
      <div
        class="rounded-lg p-4 shadow-lg"
        :class="{
            'bg-green-50 border border-green-200 text-green-800': notification.type === 'success',
            'bg-red-50 border border-red-200 text-red-800': notification.type === 'error'
        }"
      >
        <div class="flex items-center">
          <svg
            x-show="notification.type === 'success'"
            class="mr-2 h-5 w-5"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <svg
            x-show="notification.type === 'error'"
            class="mr-2 h-5 w-5"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
              clip-rule="evenodd"
            />
          </svg>
          <span
            x-text="notification.message"
            class="text-sm font-medium"
          ></span>
        </div>
      </div>
    </div>

    <div class="space-y-4">
      <div class="flex items-center justify-between">
        <h4 class="text-foreground font-medium">Selected Projects</h4>
        <div class="flex items-center space-x-2">
          <span
            class="text-muted-foreground text-sm"
            x-text="`${selectedProjects.length} projects selected`"
          ></span>
          <x-ui.button
            variant="ghost"
            type="button"
            @click="
              showReposList = !showReposList;
              if (showReposList && repositories.length === 0) {
                await fetchRepos();
              }
            "
            size="icon"
            class="!rounded-full"
          >
            <x-lucide-plus
              x-show="!showReposList"
              class="size-5"
            />
            <x-lucide-x
              x-show="showReposList"
              class="size-5"
            />
          </x-ui.button>
        </div>
      </div>

      <div class="flex w-full items-center justify-center">
        <x-lucide-loader-2
          class="text-muted-foreground size-6 animate-spin"
          x-show="loading"
        />
      </div>

      <div
        x-show="showReposList"
        class="max-h-60 space-y-2 overflow-y-auto"
      >
        <template
          x-for="(repo, index) in repositories"
          :key="repo.id"
        >
          <div>
            <input
              :checked="selectedProjects.some(p => p.id === repo.id)"
              @change="
                const isChecked = $event.target.checked;
                if (isChecked) {
                  (async () => {
                    let languages = [];
                    if (repo.languages_url && !repo.languages) {
                      try {
                        const response = await fetch(repo.languages_url);
                        if (response.ok) {
                          const langData = await response.json();
                          languages = Object.keys(langData || {});
                        }
                      } catch (error) {
                        console.warn('Failed to fetch languages for', repo.name, error);
                      }
                    } else {
                      languages = Array.isArray(repo.languages) ? repo.languages : Object.keys(repo.languages || {});
                    }

                    selectedProjects.push({
                      id: repo.id,
                      name: repo.name,
                      description: repo.description || '',
                      url: repo.html_url,
                      languages: languages,
                      stars: repo.stargazers_count || 0,
                      liveUrl: repo.homepage || ''
                    });
                  })();
                } else {
                  removeProject(repo.id);
                }
              "
              type="checkbox"
              :id="`repo-${repo.id}`"
              class="peer hidden"
            />
            <x-ui.glass-card
              as="label"
              ::for="`repo-${repo.id}`"
              class="flex h-full w-full items-center space-x-3 p-3 peer-checked:border-purple-500/20 peer-checked:bg-gradient-to-r peer-checked:from-purple-500/10 peer-checked:to-pink-500/10"
            >
              <div
                class="text-foreground flex-1 cursor-pointer text-sm font-medium"
                x-text="repo.name"
              >
              </div>
              <span
                x-show="repo.language"
                x-text="repo.language"
                class="text-muted-foreground bg-muted rounded px-2 py-1 text-xs"
              ></span>
            </x-ui.glass-card>
          </div>
        </template>
      </div>

      <div
        x-show="selectedProjects.length > 0"
        class="space-y-3"
      >
        <template
          x-for="(project, index) in selectedProjects"
          :key="index"
        >
          <x-ui.glass-card
            :hoverEffect="false"
            class="p-4"
          >
            <div class="flex items-center space-x-3">
              <div class="min-w-0 flex-1">
                <h5
                  class="text-foreground truncate font-medium"
                  x-text="project.name"
                ></h5>
                <p
                  class="text-muted-foreground truncate text-sm"
                  x-text="project.description ? project.description : 'No description provided.'"
                ></p>
              </div>
              <div class="flex items-center space-x-2">
                <button
                  type="button"
                  @click="editProject(project)"
                  class="hover:bg-accent/50 cursor-pointer rounded-full p-3 transition-colors"
                >
                  <x-lucide-edit class="size-5" />
                </button>
                <button
                  type="button"
                  @click="removeProject(project.id)"
                  class="text-destructive hover:text-destructive/80 hover:bg-accent cursor-pointer rounded-full p-3 transition-colors"
                >
                  <x-lucide-trash-2 class="size-5" />
                </button>
              </div>
            </div>
          </x-ui.glass-card>
        </template>
      </div>

      <!-- Edit Project Form -->
      <div
        x-show="showEditForm"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="mt-6"
      >
        <x-ui.glass-card class="p-6">
          <div class="mb-4 flex items-center justify-between">
            <h4 class="text-foreground text-lg font-semibold">Edit Project</h4>
            <button
              type="button"
              @click="cancelEdit()"
              class="hover:bg-accent/50 rounded-full p-2 transition-colors"
            >
              <x-lucide-x class="size-5" />
            </button>
          </div>

          <div class="space-y-4">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
              <x-dashboard.form.field
                label="Project Name *"
                x-model="editingProject.name"
                placeholder="My Awesome Project"
              />

              <x-dashboard.form.field
                label="Live URL"
                x-model="editingProject.liveUrl"
                placeholder="https://your-project.com"
                type="url"
              />
            </div>

            <!-- Description -->
            <x-dashboard.form.field
              label="Description"
              x-model="editingProject.description"
              type="textarea"
              placeholder="Describe your project"
              rows="3"
            />

            <div class="space-y-2">
              <label class="text-foreground block text-sm font-medium">Technologies Used</label>
              <div class="space-y-2">
                <template
                  x-for="(lang, idx) in editingProject.languages"
                  :key="idx"
                >
                  <div class="flex gap-2">
                    <x-dashboard.form.input
                      type="text"
                      x-model="editingProject.languages[idx]"
                      class="flex-1"
                      placeholder="Enter technology or language"
                    />
                    <x-ui.button
                      variant="ghost"
                      type="button"
                      @click="editingProject.languages.splice(idx, 1)"
                      class="text-destructive hover:text-destructive/80 rounded px-2 py-1 transition-colors"
                    >
                      <x-lucide-trash-2 class="size-4" />
                    </x-ui.button>
                  </div>
                </template>

                <button
                  type="button"
                  @click="editingProject.languages.push('')"
                  class="rounded px-2 py-1 text-sm text-purple-500 transition-colors hover:text-purple-600"
                >
                  + Add Technology
                </button>
              </div>
            </div>

            <div>
              <div class="flex items-center justify-end space-x-3 pt-4">
                <x-ui.button
                  type="button"
                  variant="ghost"
                  @click="cancelEdit()"
                >
                  Cancel
                </x-ui.button>
                <x-ui.button
                  type="button"
                  variant="default"
                  @click="saveProject()"
                  ::class="{ 'opacity-50 cursor-not-allowed': !editingProject.name || !editingProject.name.trim() }"
                  ::disabled="!editingProject.name || !editingProject.name.trim()"
                >
                  Save Changes
                </x-ui.button>
              </div>
            </div>
        </x-ui.glass-card>
      </div>
    </div>

    <input
      name="projects"
      type="hidden"
      :value="JSON.stringify(selectedProjects)"
    />
  </div>
</x-dashboard.collapsible-section>
