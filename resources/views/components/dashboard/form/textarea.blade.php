<textarea
  {{ $attributes->except(["value"])->merge(['class' => "w-full rounded-lg border border-border/50 bg-background/80 backdrop-blur-sm px-4 py-3 text-sm transition-all duration-200 placeholder:text-muted-foreground/70 focus:border-purple-500 focus:bg-background focus:outline-none focus:ring-2 focus:ring-purple-500/20"]) }}
>
  {{ $attributes->get("value") ?? $slot }}
</textarea>
