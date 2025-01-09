<x-mail::message>
# Introduction

{{$user->name}} account have been delete at {{$user->created_at->diffForHumans()}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
