<x-app-layout>
        <x-slot name="vendor_css">
           <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        </x-slot>
        <div class="container-xxl flex-grow-1 container-p-y">
           <div class="card">
              <div class="card-header">
                 <h4>Management Data Petugas</h4>
                 <div class="card-header-action">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#petugasModal">
                    Tambah Data
                    </button>
                 </div>
              </div>
              <div class="card-datatable table-responsive">
                 <table class="dt-petugas table">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Kode Petugas</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Telephone</th>
                          <th>Active</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @foreach($petugas as $item)
                       <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td>{{ $item->kode_petugas }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->alamat }}</td>
                          <td>{{ $item->telephone }}</td>
                          <td>{{ $item->is_active ? 'Active' : 'Nonactive' }}</td>
                          <td>
                             <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-20px, 24px);" data-popper-placement="bottom-start">
                                   <a class="dropdown-item" href="javascript:void(0);" onclick="updatePetugas({{ $item->id }})"><i class="ti ti-pencil me-1"></i> Edit</a>
                                   <form class="deleteForm" action="{{ route('petugas.destroy', $item->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <a class="dropdown-item" href="javascript:void(0);" onclick="deletePetugas()"><i class="ti ti-trash me-1"></i> Delete</a>
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
           <div class="modal fade" id="petugasModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                 <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       <div class="text-center mb-4">
                          <h3 class="mb-2">Tambah Data Petugas</h3>
                       </div>
                       <form id="petugasForm" class="row g-3" action="{{ route('petugas.store') }}" method="POST">
                          @csrf
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="kode_user">Kode User</label>
                             <input
                                required
                                type="text"
                                id="kode_user"
                                name="kode_user"
                                class="form-control"
                                placeholder="PTG-20233ID"
                                />
                          </div>
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="nama">Nama</label>
                             <input
                                required
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="John Doe"
                                />
                          </div>
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="alamat">Alamat</label>
                             <input
                                required
                                type="text"
                                id="alamat"
                                name="alamat"
                                class="form-control"
                                placeholder="Jln. Jend Soedirman No 269"
                                />
                          </div>
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="telephone">Telephone</label>
                             <input
                                required
                                type="text"
                                id="telephone"
                                name="telephone"
                                class="form-control"
                                placeholder="0813xxxxxxx"
                                />
                          </div>
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="email">Email</label>
                             <input
                                required
                                type="email"
                                id="email"
                                name="email"
                                class="form-control modal-edit-tax-id"
                                placeholder="user@laundry.com"
                                />
                          </div>
                          <div class="col-12 col-md-6">
                             <label class="form-label" for="password">Password</label>
                             <input
                                required
                                type="password"
                                id="password"
                                name="password"
                                class="form-control modal-edit-tax-id"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
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
           <div class="modal fade" id="petugasModalUpdate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
               <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     <div class="text-center mb-4">
                        <h3 class="mb-2">Tambah Data Petugas</h3>
                     </div>
                     <form id="petugasFormUpdate" class="row g-3" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-12 col-md-6">
                           <label class="form-label" for="kode_user">Kode User</label>
                           <input
                              required
                              type="text"
                              id="kode_user"
                              name="kode_user"
                              class="form-control"
                              placeholder="PTG-20233ID"
                              />
                        </div>
                        <div class="col-12 col-md-6">
                           <label class="form-label" for="nama">Nama</label>
                           <input
                              required
                              type="text"
                              id="nama"
                              name="nama"
                              class="form-control"
                              placeholder="John Doe"
                              />
                        </div>
                        <div class="col-12 col-md-6">
                           <label class="form-label" for="alamat">Alamat</label>
                           <input
                              required
                              type="text"
                              id="alamat"
                              name="alamat"
                              class="form-control"
                              placeholder="Jln. Jend Soedirman No 269"
                              />
                        </div>
                        <div class="col-12 col-md-6">
                           <label class="form-label" for="telephone">Telephone</label>
                           <input
                              required
                              type="text"
                              id="telephone"
                              name="telephone"
                              class="form-control"
                              placeholder="0813xxxxxxx"
                              />
                        </div>
                        <div class="col-12 col-md-6">
                           <label class="form-label" for="email">Email</label>
                           <input
                              required
                              type="email"
                              id="email"
                              name="email"
                              class="form-control modal-edit-tax-id"
                              placeholder="user@laundry.com"
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
              var dt_petugas_table = $('.dt-petugas')
              dt_petugas_table.dataTable();

              function updatePetugas(id){
                        $.ajax({
                              url : `/dashboard/petugas/${id}`,
                              method: 'GET',
                              success: function(data) {
                                    $('#petugasModalUpdate').modal("show")

                                    $('input#kode_user').val(data.kode_petugas)
                                    $('input#nama').val(data.name)
                                    $('input#alamat').val(data.alamat)
                                    $('input#telephone').val(data.telephone)
                                    $('input#email').val(data.email)

                                    $('#petugasFormUpdate').attr('action', '/dashboard/petugas/' + id);
                              }
                        })
                    }
                    $('#kod_user').val('PTGS-' + "{{ date('Y') }}" + Math.floor(Math.random() * 1000) + 1);
            function deletePetugas(id){
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
     