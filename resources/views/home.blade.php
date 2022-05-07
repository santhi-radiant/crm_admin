@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h6 class="text-black-50">Dashboard</h6>
    </div>

<!-- Bordered Table  -->
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <!--Horizontal form-->
    <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
        <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
           Projects
        </div>
        <div class="p-3">
            <table class="table-fixed">
                <thead>
                  <tr>
                    <th class="border w-1/2 px-4 py-2">Title</th>
                    <th class="border w-1/4 px-4 py-2">Description</th>
                    <th class="border w-1/4 px-4 py-2">Deadline</th>
                    <th class="border w-1/4 px-4 py-2">Status</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project )
                    <tr>
                        <td class="border px-4 py-2">{{$project->title}}</td>
                        <td class="border px-4 py-2">{{$project->description}}</td>
                        <td class="border px-4 py-2">{{$project->deadline}}</td>
                        <td class="border px-4 py-2">{{$project->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
    <!--/Horizontal form-->
<!-- Bordered Table  -->




    <!-- Bordered Table  -->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <!--Horizontal form-->
        <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
            <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
               Tasks
            </div>
            <div class="p-3">
                <table class="table-fixed">
                    <thead>
                      <tr>
                        <th class="border w-1/2 px-4 py-2">Title</th>
                        <th class="border w-1/4 px-4 py-2">Description</th>
                        <th class="border w-1/4 px-4 py-2">Status</th>
                        <th class="border w-1/4 px-4 py-2">Project</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($tasks as $task )
                        <tr>
                            <td  class="border px-4 py-2">{{$task->title}}</td>
                            <td  class="border px-4 py-2">{{$task->description}}</td>
                            <td  class="border px-4 py-2">{{$task->status}}</td>
                            @if($task->projects != null)
                            @foreach ($task->projects as $project )
                            <td  class="border px-4 py-2"> {{$project->title}} </td>
                            @endforeach
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/Horizontal form-->
<!-- Bordered Table  -->

  <!-- Full Table   -->
  <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
           Clients
        </div>
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/4 px-4 py-2">Company</th>
                    <th class="border w-1/6 px-4 py-2">Vat</th>
                    <th class="border w-1/7 px-4 py-2">Address</th>
                 </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client )
                    <tr>
                        <td  class="border px-4 py-2">{{$client->company}}</td>
                        <td  class="border px-4 py-2">{{$client->vat}}</td>
                        <td  class="border px-4 py-2">{{$client->address}}</td>
                        <!--<td class="border px-4 py-2">
                            <i class="fas fa-check text-green-500 mx-2"></i>
                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                            </a>
                        </td> -->
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Full Table-->



@endsection
