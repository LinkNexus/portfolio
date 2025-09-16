@props(["label", "type" => "text"])

<div class="space-y-2">
  <label for="{{ $attributes->get('id') ?? $attributes->get("name") }}"
         class="block text-sm font-medium text-foreground">
    {{ $label }}
  </label>

  @if ($type === "textarea")
    <x-dashboard.form.textarea
      {{ $attributes->merge(['id' => $attributes->get('name')])  }}
    />
  @else
    <x-dashboard.form.input
      {{ $attributes->merge(['id' => $attributes->get('name')]) }}
    />
  @endif
</div>
