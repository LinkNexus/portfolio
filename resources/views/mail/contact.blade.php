<x-mail::message>
  # New Message from Portfolio

  ## From: {{ $name }}, {{ $email }}

  Subject: {{ $subjectString }}

  Message: {{ $message }}

  Recieved on {{ now() }}

  <x-mail::button url="mailto:{{ $email }}">
    Contact the person
  </x-mail::button>
</x-mail::message>
