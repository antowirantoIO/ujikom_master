<x-app-layout>
    <x-slot name="vendor_css">
       <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    </x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
               <h4>Pilih Tanggal</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="date" id="end_date" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary mt-2" id="filter">Filter</button>
                    </div>
                </div>
            </div>
      </div>
      <hr>
       <div class="card">
          <div class="card-header">
             <h4>Laporan Data transaksi</h4>
          </div>
          <div class="card-datatable table-responsive">
             <table class="dt-transaksi table">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Tanggal Masuk</th>
                      <th>No Invoice</th>
                      <th>Konsumen</th>
                      <th>Layanan</th>

                      <th>Status Bayar</th>
                      <th>Diskon</th>
                      <th>Total Bayar</th>
                   </tr>
                </thead>
             </table>
          </div>
       </div>
    </div>
    </div>
    <x-slot name="vendor_js">
       <script src="{{ asset('') }}vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
       <!-- Flat Picker -->
    </x-slot>
    <x-slot name="page_js">
       <script>
          var dt_transaksi_table = $('.dt-transaksi')
          dt_transaksi_table.DataTable();

            $('#filter').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                $.ajax({
                    url: "{{ route('laporan.transaksi.ajax') }}",
                    method: "GET",
                    data: {start_date: start_date, end_date: end_date},
                    success: function(data){
                        dt_transaksi_table.dataTable().fnDestroy();

                        dt_transaksi_table.DataTable({
                            data: data,
                            columns: [
                                {data: 'no', name: 'no'},
                                {data: 'tanggal_masuk', name: 'tanggal_masuk'},
                                {data: 'no_invoice', name: 'no_invoice'},
                                {data: 'konsumen', name: 'konsumen'},
                                {data: 'layanan', name: 'layanan'},

                                {data: 'status_bayar', name: 'status_bayar'},
                                {data: 'diskon', name: 'diskon'},
                                {data: 'total_bayar', name: 'total_bayar'},
                            ]
                        });
                    }
                });
            });
       </script>
    </x-slot>
 </x-app-layout>
