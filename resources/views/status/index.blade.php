<x-app-layout>
        <x-slot name="vendor_css">
           <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        </x-slot>
        <div class="container-xxl flex-grow-1 container-p-y">
           <div class="card">
              <div class="card-header">
                 <h4>Management Data Status</h4>
                 <div class="card-header-action">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal">
                    Tambah Data
                    </button>
                 </div>
              </div>
              <div class="card-datatable table-responsive">
                 <table class="dt-status table">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @foreach($status as $item)
                       <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td>{{ $item->nama }}</td>
                          <td>
                             <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-20px, 24px);" data-popper-placement="bottom-start">
                                   <a class="dropdown-item" href="javascript:void(0);" onclick="updatestatus({{ $item->id }})"><i class="ti ti-pencil me-1"></i> Edit</a>
                                   <form class="deleteForm" action="{{ route('status.destroy', $item->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <a class="dropdown-item" href="javascript:void(0);" onclick="deletestatus()"><i class="ti ti-trash me-1"></i> Delete</a>
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
        <x-slot name="modal">
           <div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                 <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       <div class="text-center mb-4">
                          <h3 class="mb-2">Tambah Data Status</h3>
                       </div>
                       <form id="statusForm" class="row g-3" action="{{ route('status.store') }}" method="POST">
                          @csrf
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="nama">Nama</label>
                             <input
                                required
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="PTG-20233ID"
                                />
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
           <div class="modal fade" id="statusModalUpdate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
               <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     <div class="text-center mb-4">
                        <h3 class="mb-2">Tambah Data Status</h3>
                     </div>
                     <form id="statusFormUpdate" class="row g-3" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input
                                       required
                                       type="text"
                                       id="nama"
                                       name="nama"
                                       class="form-control"
                                       placeholder="Baru"
                                       />
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
              var dt_status_table = $('.dt-status')
              dt_status_table.dataTable();

              function updatestatus(id){
                        $.ajax({
                              url : `/dashboard/status/${id}`,
                              method: 'GET',
                              success: function(data) {
                                    $('#statusModalUpdate').modal("show")

                                    $('input#nama').val(data.nama)

                                    $('#statusFormUpdate').attr('action', '/dashboard/status/' + id);
                              }
                        })
                    }

            function deletestatus(id){
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
     