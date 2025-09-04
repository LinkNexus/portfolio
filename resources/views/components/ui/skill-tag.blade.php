@props(['skill', 'index' => 0])

<div
  class="px-3 py-1 bg-muted/80 backdrop-blur-sm rounded-md text-sm border border-purple-500/10 shadow-sm"
  x-data
  x-intersect="$el.animate(
    [{opacity:0, transform:'scale(0.8)'},{opacity:1, transform:'scale(1)'}],
    {duration:500, delay:{{ $index * 50 }}, easing:'ease-out'}
  )"
  @mouseenter="animate($el,{scale:1.05,y:-2},{duration:0.2})"
  @mouseleave="animate($el,{scale:1,y:0},{duration:0.2})"
>
  {{ $skill }}
</div>
