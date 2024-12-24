@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('main-sidebar.grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main-sidebar.grades') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('main-sidebar.grades') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-md-12 mb-30">
        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            {{ trans('grades.add_grade') }}
        </button>
        <br><br>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{ trans('grades.name') }}</th>
                <th scope="col">{{ trans('grades.notes') }}</th>
                <th scope="col">{{ trans('grades.processes') }}</th>
                <
                
              </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade )
                <tr>
                  <th scope="row">1</th>
                  <td>{{$grade->name}}</td>
                  <td>{{$grade->notes}}</td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $grade->id }}"
                    title="{{ trans('Grades_trans.Edit') }}"><i
                    class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $grade->id }}"
                    title="{{ trans('Grades_trans.Delete') }}"><i
                    class="fa fa-trash"></i></button>
                </td>
                </tr>
                {{-- edit modal --}}
                <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('grades.edit_Grade') }}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <!-- add_form -->
                               <form action="{{route('grades.update','test')}}" method="post">
                                   {{method_field('patch')}}
                                   @csrf
                                   <div class="row">
                                       <div class="col">
                                           <label for="Name"
                                                  class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                               :</label>
                                           <input id="Name" type="text" name="name"
                                                  class="form-control"
                                                  value="{{$grade->getTranslation('name', 'ar')}}"
                                                  required>
                                           <input id="id" type="hidden" name="id" class="form-control"
                                                  value="{{ $grade->id }}">
                                       </div>
                                       <div class="col">
                                           <label for="Name_en"
                                                  class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                               :</label>
                                           <input type="text" class="form-control"
                                                  value="{{$grade->getTranslation('name', 'en')}}"
                                                  name="Name_en" required>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label
                                           for="exampleFormControlTextarea1">{{ trans('grades.Notes') }}
                                           :</label>
                                       <textarea class="form-control" name="Notes"
                                                 id="exampleFormControlTextarea1"
                                                 rows="3">{{ $grade->notes }}</textarea>
                                   </div>
                                   <br><br>

                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                       <button type="submit"
                                               class="btn btn-success">{{ trans('grades.submit') }}</button>
                                   </div>
                               </form>

                           </div>
                       </div>
                   </div>
               </div>

               {{-- delete modal --}}
               <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('grades.delete_Grade') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('grades.destroy','test')}}" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('grades.Warning_Grade') }}
                               <input id="id" type="hidden" name="id" class="form-control"
                                      value="{{ $grade->id }}">
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                           data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                   <button type="submit"
                                           class="btn btn-danger">{{ trans('grades.submit') }}</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
                    
                @endforeach
              
            </tbody>
          </table>
          
    </div>
    {{-- add modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('grades.add_grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('grades.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name"
                                           class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('grades.notes') }}
                                    :</label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('grades.close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('grades.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
