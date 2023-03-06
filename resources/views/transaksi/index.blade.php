<x-app-layout>
      <x-slot name="vendor_css">
         <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
      </x-slot>
      <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="card-header">
               <h4>Management Data transaksi</h4>
               <div class="card-header-action">
                  <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                  Tambah Data
                  </a>
               </div>
            </div>
            <div class="card-datatable table-responsive">
               <table class="dt-transaksi table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>No Invoice</th>
                        <th>Konsumen</th>
                        <th>Layanan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Status</th>
                        <th>Berat</th>
                        <th>Tanggal Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th>Tanggal Diambil</th>
                        <th>Status Bayar</th>
                        <th>Diskon</th>
                        <th>Total Bayar</th>
                        <th>Keterangan</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($transaksi as $item)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->no_invoice }}</td>
                        <td>{{ $item->konsumen->nama }}</td>
                        <td>{{ $item->layanan->nama }}</td>
                        <td>{{ $item->jenis_pembayaran->nama }}</td>
                        <td>{{ $item->status_pesanan->nama }}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->tanggal_keluar }}</td>
                        <td>{{ $item->tanggal_diambil }}</td>
                        <td>{{ $item->status_bayar }}</td>
                        <td>{{ $item->diskon }}</td>
                        <td>{{ $item->total_bayar }}</td>
                        <td>{{ $item->keterangan }}</td> 
                        <td>
                           <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow">
                              <i class="ti ti-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-20px, 24px);" data-popper-placement="bottom-start">
                                 <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Update Status</a>
                                 <form class="deleteForm" action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="deletetransaksi()"><i class="ti ti-trash me-1"></i> Delete</a>
                                  </form>
                              </div>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
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
            dt_transaksi_table.dataTable();

          function deletetransaksi(id){
                Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Yes, delete it!',
                      customClass: {
                      confirmButton: 'btn btn-primary me-3',
                      cancelButton: 'btn btn-label-secondary'
                      },
                      buttonsStyling: false
                      }).then(function (result) {
                      if (result.value) {
                      $('.deleteForm').submit();
                      Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            customClass: {
                            confirmButton: 'btn btn-success'
                            }
                      });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                      Swal.fire({
                            title: 'Cancelled',
                            text: 'Your imaginary file is safe :)',
                            icon: 'error',
                            customClass: {
                            confirmButton: 'btn btn-success'
                            }
                      });
                      }
                      });
          }
         </script>
      </x-slot>
   </x-app-layout>
   