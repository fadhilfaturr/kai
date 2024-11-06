@extends('template.index')

@section('troubleshoot')

                        <!-- Table with stripped rows -->
                        <h2>Troubleshoot</h2>
                        <div class="table-container">
                            <a href="{{ route('hardwaret.index') }}"><button type="button" class="btn btn-primary btn-sm">Hardware</button></a>
                            <a href="{{ route('softwaret.index') }}"><button type="button" class="btn btn-primary btn-sm">Software</button></a>
                            <a href="{{ route('locotrackt.index') }}"><button type="button" class="btn btn-primary btn-sm">Locotrack</button></a>
                            <a href="{{ route('jaringant.index') }}"><button type="button" class="btn btn-primary btn-sm">Jaringan</button></a>
                        </div>
@endsection
                        <!-- End Table with stripped rows -->

    <script type="text/javascript">
        $(document).on("click", "#tombolubah", function() {
            let unit_edit = $(this).data('unit');

            $("#unit_edit").val(unit_edit);
        })
    </script>
