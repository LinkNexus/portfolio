<x-dashboard.collapsible-section
  title="Personal Information"
  subtitle="Update your portfolio details and contact information"
  :expanded="true"
>
  <!-- Form Fields -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <x-dashboard.form.field
      name="name"
      label="Full Name"
      required
      type="text"
      id="name"
      value="{!! $personalData['name'] !!}"
    ></x-dashboard.form.field>

    <!-- Email Field -->
    <x-dashboard.form.field
      name="email"
      type="email"
      label="Email Address"
      required
      value="{!! $personalData['email'] !!}"
    />

    <!-- Location Field -->
    <x-dashboard.form.field
      label="Location"
      required
      type="text"
      name="location"
      value="{!! $personalData['location'] !!}"
    />

    <!-- GitHub Field -->
    <x-dashboard.form.field
      label="Github Profile"
      required
      type="text"
      name="github"
      value="{!! $personalData['github'] !!}"
    />

    <!-- LinkedIn Field -->
    <div class="md:col-span-2">
      <x-dashboard.form.field
        label="LinkedIn Profile"
        required
        type="text"
        name="linkedin"
        value="{!! $personalData['linkedin'] !!}"
      />
    </div>
  </div>

  <!-- Speech/Bio Field -->
  <x-dashboard.form.field
    type="textarea"
    name="speech"
    label="Speech/Bio"
    rows="4"
    value="{!! $personalData['speech'] !!}"
  />
</x-dashboard.collapsible-section>
