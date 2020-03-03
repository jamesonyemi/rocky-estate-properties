@if ( ( count($retriveProjects) === 1 ) )
    @include('client_portal.my_projects.single_project')
@else
    @include('client_portal.my_projects.multiple_projects')
@endif


