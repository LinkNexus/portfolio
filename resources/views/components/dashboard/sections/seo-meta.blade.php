<x-dashboard.collapsible-section
  title="SEO & Meta Information"
  subtitle="Manage your portfolio's search engine optimization settings"
>
  <div class="grid grid-cols-1 gap-4">
    <x-dashboard.form.field
      name="title"
      label="Portfolio Title"
      required
      value="{!! $personalData['layout']['title'] !!}"
    />

    <x-dashboard.form.field
      type="textarea"
      name="description"
      label="Portfolio Description"
      rows="4"
      value="{!! $personalData['layout']['description'] !!}"
    />
  </div>
</x-dashboard.collapsible-section>
