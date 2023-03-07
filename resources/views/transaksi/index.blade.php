<x-app-layout>
      <x-slot name="vendor_css">
         <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
      </x-slot>
      <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="card-header">
               <h4>Management Data transaksi</h4>
               @hasanyrole('administrator|petugas')
               <div class="card-header-action">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                        Tambah Data
                        </a>
                     </div>
            @endhasanyrole
            </div>
            <div class="card-datatable">
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
                        <th>Status Bayar</th>
                        <th>Diskon</th>
                        <th>Total Bayar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
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
                        <td>{{ $item->berat }} {{ $item->layanan->satuan }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->tanggal_keluar }}</td>
                        <td>
                              @if($item->status_bayar)
                                    <span class="badge bg-success">
                                          DIBAYAR
                                    </span>
                              @else
                                    <span class="badge bg-danger">
                                          BELUM DIBAYAR
                                    </span>
                              @endif
                        </td>
                        <td>{{ number_format($item->diskon) }}</td>
                        <td>{{ number_format($item->total_bayar) }}</td>
                        <td>{{ 'Hutang Rp. ' . number_format(json_decode($item->keterangan, true)['hutang']) }}</td>
                        <td>
                              <div class="dropdown">
                                 <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="true">
                                 <i class="ti ti-dots-vertical"></i>
                                 </button>
                                 <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-20px, 24px);" data-popper-placement="bottom-start">
                                          @hasanyrole('administrator|petugas')
                                    <a class="dropdown-item" href="javascript:void(0);"  onclick="submitUpdateStatus({{ $item->id }},{{ $item->status_bayar }})"><i class="ti ti-pencil me-1"></i> Edit</a>
                                    @if($item->status_bayar)
                                    <a class="dropdown-item" href="/dashboard/transaksi/invoice?no_invoice={{ $item->no_invoice }}"><i class="ti ti-receipt me-1"></i> Invoice</a>
                                    @endif
                                    <form class="deleteForm" action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <a class="dropdown-item" href="javascript:void(0);" onclick="deletetransaksi()"><i class="ti ti-trash me-1"></i> Delete</a>
                                     </form>
                                     @endhasanyrole
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
      <x-slot name="modal">
                  <div class="modal fade" id="modalUpdate" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                 <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       <div class="text-center mb-4">
                                          <h3 class="mb-2">Ubah Status</h3>
                                       </div>
                                       <form id="statusForm" class="row g-3" action="" method="POST">
                                          @method('PUT')
                                          @csrf
                                          <div class="form-group">
                                                <label>Pilih Status Pesanan</label>
                                                <select class="form-control select2" id="select_konsumen" name="status_pesanan_id">
                                                      <option>Pilih Status Pesanan</option>
                                                      @foreach ($status as $item)
                                                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          <div class="form-group" id="select_bayar">
                                                <label>Pilih Status Bayar</label>
                                                <select class="form-control select2" name="status_bayar">
                                                      <option>Pilih Status Bayar</option>
                                                      <option value="1">Bayar</option>
                                                      <option value="0">Belum Bayar</option>
                                                </select>
                                          </div>
                                          <div class="col-12 text-center">
                                             <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                             <button
                                                type="reset"
                                                class="btn btn-label-secondary"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                                >
                                             Cancel
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
      </x-slot>
      <x-slot name="vendor_js">
         <script src="{{ asset('') }}vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
         <!-- Flat Picker -->
      </x-slot>
      <x-slot name="page_js">
         <script>
            var dt_transaksi_table = $('.dt-transaksi')
            dt_transaksi_table.dataTable({
                  "scrollX": true
            });

            function submitUpdateStatus(id, status_bayar) {
                  $('#statusForm').attr('action', '/dashboard/transaksi/' + id);
                  if(status_bayar == 0){
                        console.log(status_bayar);
                        document.getElementById("select_bayar").style.display = "block";
                  } else if(status_bayar == 1) {
                        console.log(status_bayar);
                        document.getElementById("select_bayar").style.display = "none";
                  }
                  $('#modalUpdate').modal('show');
            }

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
