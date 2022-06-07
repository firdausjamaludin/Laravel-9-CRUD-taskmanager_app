<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Tasks
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="text-align: center">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Task</button>
            @if($isOpen)
            @include('livewire.create')
            @endif
            <!-- <table class="table-fixed w-full"> -->
            <table class="table-fixed w-full">
                <!-- <thead>
                    <tr class="bg-gray-100 border px-2 py-2">
                        <th class="px-2 py-2 w-20">No.</th>
                        <th class="px-2 py-4">Title</th>
                        <th class="px-6 py-2" colspan="3">Task</th>
                    </tr>
                </thead> -->
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <th class=" text-sm bg-gray-100 border-2 px-2 py-2" colspan="3">
                            Time left:
                            @if ($task->status)

                            <?php
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $fdate =  $task->deadline;
                            $tdate =  date('m/d/Y h:i:s a', time());
                            $datetime1 = new DateTime($fdate);
                            $datetime2 = new DateTime($tdate);
                            $interval = $datetime2->diff($datetime1);
                            $days = $interval->format('%r %a days %h hours %i minutes ago');
                            echo $days;
                            ?>

                            @else

                            <?php
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $fdate =  $task->deadline;
                            $tdate =  date('m/d/Y h:i:s a', time());
                            $datetime1 = new DateTime($fdate);
                            $datetime2 = new DateTime($tdate);
                            $interval = $datetime2->diff($datetime1);
                            $days = $interval->format('%r %a days %h hours %i minutes remaining');
                            echo $days;
                            ?>

                            @endif
                        </th>
                    </tr>
                    <tr>
                        <!-- <td class="border px-4 py-2">{{ $task->id }}</td> -->
                        <!-- <td class="border px-2 py-2" style="text-align: center"></td> -->
                        <!-- <td class="border px-2 py-2" style="text-align: center">{{ $task->title }}</td> -->
                        <td class="break-words border-2 px-6 py-6" colspan="3">{{ $task->body }}
                    </tr>
                    <tr class="text-sm bg-gray-100 border-2 px-2 py-2">
                        <th class="">Deadline</th>
                        <th class="">Status</th>
                        <th class="">Action</th>
                    </tr>
                    <tr class="text-sm bg-gray-100 border-2 px-2 py-2">
                        <td class="bg-gray-100 border px-2 py-2" style="text-align: center">
                            {{ $task->deadline }}
                        </td>
                        <td class="bg-gray-100 border px-2 py-2" style="text-align: center">
                            @if ($task->status)
                            <p>Completed</p>

                            @else
                            <p>Incomplete</p>

                            @endif
                        </td>

                        <td class="bg-gray-100 border px-4 py-2" style="text-align: center">
                            <button wire:click="edit({{ $task->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $task->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-3 py-3" colspan="3">
                    </tr>
                    @endforeach
                </tbody>
                <tbody>

                </tbody>
            </table>
            <table class="table-fixed w-full">


            </table>
        </div>
    </div>
</div>