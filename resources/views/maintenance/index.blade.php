@extends('template.index')

@section('maintenance')
                        <!-- Table with stripped rows -->
                        <h2>Maintenance</h2>
                        <div class="table-container">
                            <a href="{{ route('hardwarem.index') }}"><button type="button" class="btn btn-primary btn-sm">Hardware</button></a>
                            <a href="{{ route('softwarem.index') }}"><button type="button" class="btn btn-primary btn-sm">Software</button></a>
                            <a href="{{ route('locotrackm.index') }}"><button type="button" class="btn btn-primary btn-sm">Locotrack</button></a>
                            <a href="{{ route('jaringanm.index') }}"><button type="button" class="btn btn-primary btn-sm">Jaringan</button></a>
                        </div>
@endsection
                        

    <script type="text/javascript">
        $(document).on("click", "#tombolubah", function() {
            let unit_edit = $(this).data('unit');

            $("#unit_edit").val(unit_edit);
        })
    </script>
