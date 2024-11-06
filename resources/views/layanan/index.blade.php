@extends('template.index')

@section('layanan')

                        <!-- Table with stripped rows -->
                        <h2>Layanan</h2>
                        <div class="table-container">
                            <a href="{{ route('hardwarel.index') }}"><button type="button" class="btn btn-primary btn-sm">Hardware</button></a>
                            <a href="{{ route('softwarel.index') }}"><button type="button" class="btn btn-primary btn-sm">Software</button></a>
                            <a href="{{ route('locotrackl.index') }}"><button type="button" class="btn btn-primary btn-sm">Locotrack</button></a>
                            <a href="{{ route('jaringanl.index') }}"><button type="button" class="btn btn-primary btn-sm">Jaringan</button></a>
                        </div>
@endsection
                        

    <script type="text/javascript">
        $(document).on("click", "#tombolubah", function() {
            let unit_edit = $(this).data('unit');

            $("#unit_edit").val(unit_edit);
        })
    </script>