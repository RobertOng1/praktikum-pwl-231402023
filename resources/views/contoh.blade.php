@extends('layouts.layout')

@section('content')
{{-- content --}}
<div class="flex justify-center mt-10 flex-col gap-10">
  <form action="/" method="POST">
    @csrf
    @method('POST')
    {{-- input bar --}}
    <label class="form-control w-full max-w-lg mx-auto">
      <div class="label">
        <span class="label-text text-emerald-600">New Task</span>
      </div>
      <input name="task" type="text" placeholder="Type here"
        class="input input-bordered input-success w-full max-w-lg" />
      @error('task')
      <p class="text-red-500">{{ $message }}</p>
      @enderror
      <div class="label">
      </div>
      {{-- button add --}}
      <button type="submit" class="btn btn-success w-36 self-center rounded-full">Add</button>
      {{-- akhir button add --}}
    </label>
    {{-- akhir input bar --}}
  </form>

  {{-- task --}}
  <div class="flex flex-col gap-3 mb-10">
  @foreach ($tasks as $task)
  {{-- task 1 --}}
    <div role="alert" class="alert max-w-4xl mx-auto">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <div class="flex flex-col">
        <span class="text-sm text-slate-400">{{ $task->tanggal }}</span>
        <span class="text-xl font-bold">{{ $task->task }}</span>
      </div>
      <div>
        <div class="tooltip" data-tip="Detail">
          <button class="btn btn-sm shadow-lg bg-base-200 rounded-full">View</button>
        </div>
        <div class="tooltip" data-tip="Edit">
          <button class="btn btn-sm shadow-lg bg-yellow-500 rounded-full">Edit</button>
        </div>
        <div class="tooltip" data-tip="Selesai">
          <form action="/deleteTask/{{ $task->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-sm btn-success rounded-full" onclick="return confirm('Yakin udah selesai?')">Done</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
    {{-- akhir task 1 --}}
  </div>
</div>
{{-- akhir content --}}
@endsection