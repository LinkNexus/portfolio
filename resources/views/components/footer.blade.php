<footer class="relative overflow-hidden border-t border-white/20 dark:border-gray-800/50 bg-gradient-to-br from-gray-50/80 via-white/80 to-purple-50/80 dark:from-gray-900/80 dark:via-gray-900/80 dark:to-purple-950/80 backdrop-blur-xl">
  <!-- Background Elements -->
  <div class="absolute inset-0 bg-gradient-to-br from-purple-500/[0.02] via-transparent to-pink-500/[0.02] dark:from-purple-400/[0.05] dark:to-pink-400/[0.05]"></div>
  <div class="absolute top-0 left-1/4 w-64 h-64 bg-purple-500/5 rounded-full blur-3xl transform -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-pink-500/5 rounded-full blur-3xl transform translate-y-1/2"></div>

  <div class="container relative mx-auto max-w-7xl px-6 md:px-8 py-16 lg:py-20">
    
    <!-- Main Footer Content -->
    <div 
      class="grid grid-cols-1 lg:grid-cols-4 gap-12 lg:gap-16 mb-12"
      x-data
      x-init="$el.style.opacity = '0'; animate($el, { opacity: 1, y: [30,0] }, { duration: 0.6 })"
    >
      
      <!-- Brand Section -->
      <div class="lg:col-span-2">
        <div class="mb-6">
          <a href="/" class="flex items-center text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent hover:from-purple-700 hover:to-pink-700 transition-all duration-300">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-lg mr-4">
              <span class="text-xl">✨</span>
            </div>
            {{ $personalData['name'] }}
          </a>
        </div>
        
        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-8 max-w-md">
          Passionate software engineer crafting digital experiences with modern technologies and innovative solutions.
        </p>

        <!-- Social Links -->
        <div class="flex space-x-4">
          <a 
            href="https://github.com/{{ $personalData['github'] ?? '#' }}" 
            target="_blank"
            class="group flex h-12 w-12 items-center justify-center rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:border-purple-500/30"
          >
            <x-lucide-github class="h-5 w-5 text-gray-600 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors" />
          </a>
          
          <a 
            href="https://linkedin.com/in/{{ $personalData['linkedin'] ?? '#' }}" 
            target="_blank"
            class="group flex h-12 w-12 items-center justify-center rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:border-blue-500/30"
          >
            <x-lucide-linkedin class="h-5 w-5 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors" />
          </a>
          
          <a 
            href="mailto:{{ $personalData['email'] ?? '#' }}"
            class="group flex h-12 w-12 items-center justify-center rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:border-emerald-500/30"
          >
            <x-lucide-mail class="h-5 w-5 text-gray-600 dark:text-gray-400 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors" />
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">
          Quick Links
        </h3>
        <ul class="space-y-4">
          @php
            $quickLinks = [
              ['name' => 'About', 'href' => '#hero', 'icon' => 'user'],
              ['name' => 'Skills', 'href' => '#skills', 'icon' => 'code'],
              ['name' => 'Experience', 'href' => '#experience', 'icon' => 'briefcase'],
              ['name' => 'Projects', 'href' => '#projects', 'icon' => 'rocket']
            ];
          @endphp
          
          @foreach($quickLinks as $link)
            <li>
              <a 
                href="{{ $link['href'] }}" 
                class="group flex items-center space-x-3 text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-all duration-300"
              >
                @if($link['icon'] === 'user')
                  <x-lucide-user class="h-4 w-4 group-hover:scale-110 transition-transform" />
                @elseif($link['icon'] === 'code')
                  <x-lucide-code class="h-4 w-4 group-hover:scale-110 transition-transform" />
                @elseif($link['icon'] === 'briefcase')
                  <x-lucide-briefcase class="h-4 w-4 group-hover:scale-110 transition-transform" />
                @elseif($link['icon'] === 'rocket')
                  <x-lucide-rocket class="h-4 w-4 group-hover:scale-110 transition-transform" />
                @endif
                <span class="font-medium">{{ $link['name'] }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">
          Get In Touch
        </h3>
        <ul class="space-y-4">
          <li class="flex items-center space-x-3 text-gray-600 dark:text-gray-400">
            <x-lucide-mail class="h-4 w-4 text-purple-500" />
            <span class="font-medium">{{ $personalData['email'] ?? 'hello@example.com' }}</span>
          </li>
          <li class="flex items-center space-x-3 text-gray-600 dark:text-gray-400">
            <x-lucide-map-pin class="h-4 w-4 text-purple-500" />
            <span class="font-medium">{{ $personalData['location'] ?? 'Remote' }}</span>
          </li>
          <li class="flex items-center space-x-3 text-gray-600 dark:text-gray-400">
            <x-lucide-clock class="h-4 w-4 text-purple-500" />
            <span class="font-medium">Available for opportunities</span>
          </li>
        </ul>

        <!-- CTA Button -->
        <a 
          href="#contact" 
          class="mt-6 inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:from-purple-700 hover:to-pink-700 hover:scale-105 hover:shadow-xl"
        >
          <x-lucide-send class="mr-2 h-4 w-4" />
          Start a Conversation
        </a>
      </div>
    </div>

    <!-- Divider -->
    <div class="border-t border-white/20 dark:border-gray-800/50 pt-8">
      
      <!-- Bottom Footer -->
      <div 
        class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0"
        x-data
        x-init="animate($el, { opacity: [0,1], y: [20,0] }, { duration: 0.5, delay: 0.3 })"
      >
        
        <!-- Copyright -->
        <div class="text-center lg:text-left">
          <p 
            class="text-gray-600 dark:text-gray-400 font-medium"
            x-data
            x-on:mouseenter="animate($el, { scale: 1.02 }, { duration: 0.2 })"
            x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
          >
            &copy; {{ now()->year }} {{ $personalData['name'] }}. All rights reserved.
          </p>
        </div>

        <!-- Built With Love -->
        <div 
          class="flex items-center space-x-2 text-gray-600 dark:text-gray-400"
          x-data
          x-on:mouseenter="animate($el, { scale: 1.02 }, { duration: 0.2 })"
          x-on:mouseleave="animate($el, { scale: 1 }, { duration: 0.2 })"
        >
          <span class="font-medium">Built with</span>
          <span 
            class="inline-block"
            x-data
            x-on:mouseenter="animate($el, { rotate: 360 }, { duration: 0.5 })"
          >
            💻
          </span>
          <span class="font-medium">and</span>
          <span 
            class="inline-block"
            x-data
            x-init="animate($el, { scale: [1, 1.2, 1] }, { duration: 2, repeat: Infinity })"
          >
            ❤️
          </span>
          <span class="font-medium">using Laravel & Tailwind CSS</span>
        </div>

        <!-- Back to Top -->
        <a 
          href="#hero" 
          class="group flex items-center justify-center space-x-2 rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 hover:border-purple-500/30"
        >
          <span>Back to top</span>
          <x-lucide-arrow-up class="h-4 w-4 group-hover:-translate-y-1 transition-transform" />
        </a>
      </div>
    </div>
  </div>
</footer>

