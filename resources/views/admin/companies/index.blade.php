
@extends('admin.layouts.admin')

@section('title', __('views.admin.companies.index.title'))

@section('content')
    <div class="row">
        <div class="col col-md-12">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('admin.companies.create') }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.companies.add.title') }}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="col col-md-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>@sortablelink('ruc', __('views.admin.companies.index.table_header_0'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('name',  __('views.admin.companies.index.table_header_1'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('business_name',  __('views.admin.companies.index.table_header_2'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('email', __('views.admin.companies.index.table_header_3'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('phone', __('views.admin.companies.index.table_header_4'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('created_at', __('views.admin.companies.index.table_header_5'),['page' => $companies->currentPage()])</th>
                    <th>@sortablelink('updated_at', __('views.admin.companies.index.table_header_6'),['page' => $companies->currentPage()])</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->ruc }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->business_name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>{{ $company->updated_at }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.companies.show', [$company->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.companies.index.show') }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.companies.edit', [$company->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.companies.index.edit') }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-xs btn-info" data-company_id="{{ $company->id }}" name="btnCompanyDelete"  data-company_name="{{ $company->name }}" type="button" data-placement="top" data-title="{{ __('views.admin.companies.index.edit') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $companies->links() }}
            </div>
        </div>
        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="favoritesModalLabel">{{ __('views.admin.companies.delete.modal.title') }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('views.admin.companies.delete.modal.message') }} <span id="pName"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(['method' => 'delete', 'id'=>'formConfirmDelete','class'=>'form-horizontal form-label-left']) }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('views.admin.companies.delete.modal.cancel') }}</button>
                        <span class="pull-right">
                        <button type="submit" class="btn btn-danger" id="confirmDeleteBtn" >
                        {{ __('views.admin.companies.delete.modal.accept') }}
                      </button>
                    </span>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/companies/delete.js')) }}
@endsection