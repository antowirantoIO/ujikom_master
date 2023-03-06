<x-app-layout>
   <x-slot name="vendor_css">
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/node-waves/node-waves.css" />
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/typeahead-js/typeahead.css" />
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/bs-stepper/bs-stepper.css" />
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/bootstrap-select/bootstrap-select.css" />
      <link rel="stylesheet" href="{{ asset('') }}vendor/libs/select2/select2.css" />
   </x-slot>
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="col-12 mb-4">
         <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
            <div class="bs-stepper-header">
               <div class="step" data-target="#account-details-vertical">
                  <button type="button" class="step-trigger">
                  <span class="bs-stepper-circle">
                  <i class="ti ti-users"></i>
                  </span>
                  <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Konsumen Data</span>
                  <span class="bs-stepper-subtitle">Menginput Data Konsumen</span>
                  </span>
                  </button>
               </div>
               <div class="line"></div>
               <div class="step" data-target="#personal-info-vertical">
                  <button type="button" class="step-trigger">
                  <span class="bs-stepper-circle">
                  <i class="ti ti-barrel"></i>
                  </span>
                  <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Data Layanan</span>
                  <span class="bs-stepper-subtitle">Menginput Data Layanan</span>
                  </span>
                  </button>
               </div>
               <div class="line"></div>
               <div class="step" data-target="#social-links-vertical">
                  <button type="button" class="step-trigger">
                  <span class="bs-stepper-circle"><i class="ti ti-cash"></i> </span>
                  <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Pembayaran</span>
                  <span class="bs-stepper-subtitle">Menginput Detail Pembayaran</span>
                  </span>
                  </button>
               </div>
            </div>
            <div class="bs-stepper-content">
               <form onSubmit="return false">
                  <!-- Account Details -->
                  <div id="account-details-vertical" class="content">
                     <div class="content-header mb-3">
                        <h6 class="mb-0">Konsumen Data</h6>
                        <small>Masukan Data Konsumen.</small>
                     </div>
                     <div class="row g-3">
                        <div class="col-sm-6">
                              <label class="form-label" for="konsumen_id">Konsumen</label>
                              <select class="select2" name="konsumen_id" id="konsumen_id">
                                 <option label=" "></option>
                                 @foreach ($konsumen as $item)
                                    <option 
                                       value="{{ $item->id }}"
                                       data-kode_konsumen="{{ $item->kode_konsumen }}"
                                       data-konsumen_nama="{{ $item->nama }}"
                                       data-konsumen_telephone="{{ $item->telephone }}"
                                    >{{ $item->nama }}</option>
                                 @endforeach
                              </select>
                           </div>
                        <div class="col-sm-6">
                              <label class="form-label" for="kode_konsumen">Kode Konsumen</label>
                              <input
                                 type="text"
                                 id="kode_konsumen"
                                 readonly
                                 class="form-control"
                                 placeholder="KSM-205576"
                                 />
                           
                        </div>
                        <div class="col-sm-6 form-password-toggle">
                           <label class="form-label" for="konsumen_nama">Nama Konsumen</label>
                           <input
                              type="text"
                              readonly
                              id="konsumen_nama"
                              class="form-control"
                              placeholder="John Doe"
                              />
                        </div>
                        <div class="col-sm-6 form-password-toggle">
                              <label class="form-label" for="konsumen_telephone">No Telephone</label>
                              <input
                                 type="text"
                                 readonly
                                 id="konsumen_telephone"
                                 class="form-control"
                                 placeholder="John Doe"
                                 />
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                           <button class="btn btn-label-secondary btn-prev" disabled>
                           <i class="ti ti-arrow-left me-sm-1"></i>
                           <span class="align-middle d-sm-inline-block d-none">Previous</span>
                           </button>
                           <button class="btn btn-primary btn-next">
                           <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                           <i class="ti ti-arrow-right"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <!-- Personal Info -->
                  <div id="personal-info-vertical" class="content">
                     <div class="content-header mb-3">
                        <h6 class="mb-0">Data Layanan</h6>
                        <small>Masukan Data Layanan.</small>
                     </div>
                     <div class="row g-3">
                        <div class="col-sm-6">
                           <label class="form-label" for="first-name1">First Name</label>
                           <input type="text" id="first-name1" class="form-control" placeholder="John" />
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="last-name1">Last Name</label>
                           <input type="text" id="last-name1" class="form-control" placeholder="Doe" />
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="country1">Country</label>
                           <select class="select2" id="country1">
                              <option label=" "></option>
                              <option>UK</option>
                              <option>USA</option>
                              <option>Spain</option>
                              <option>France</option>
                              <option>Italy</option>
                              <option>Australia</option>
                           </select>
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="language1">Language</label>
                           <select
                              class="selectpicker w-auto"
                              id="language1"
                              data-style="btn-default"
                              data-icon-base="ti"
                              data-tick-icon="ti-check text-white"
                              multiple
                              >
                              <option>English</option>
                              <option>French</option>
                              <option>Spanish</option>
                           </select>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                           <button class="btn btn-label-secondary btn-prev">
                           <i class="ti ti-arrow-left me-sm-1"></i>
                           <span class="align-middle d-sm-inline-block d-none">Previous</span>
                           </button>
                           <button class="btn btn-primary btn-next">
                           <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                           <i class="ti ti-arrow-right"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <!-- Social Links -->
                  <div id="social-links-vertical" class="content">
                     <div class="content-header mb-3">
                        <h6 class="mb-0">Social Links</h6>
                        <small>Enter Your Social Links.</small>
                     </div>
                     <div class="row g-3">
                        <div class="col-sm-6">
                           <label class="form-label" for="twitter1">Twitter</label>
                           <input
                              type="text"
                              id="twitter1"
                              class="form-control"
                              placeholder="https://twitter.com/abc"
                              />
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="facebook1">Facebook</label>
                           <input
                              type="text"
                              id="facebook1"
                              class="form-control"
                              placeholder="https://facebook.com/abc"
                              />
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="google1">Google+</label>
                           <input
                              type="text"
                              id="google1"
                              class="form-control"
                              placeholder="https://plus.google.com/abc"
                              />
                        </div>
                        <div class="col-sm-6">
                           <label class="form-label" for="linkedin1">Linkedin</label>
                           <input
                              type="text"
                              id="linkedin1"
                              class="form-control"
                              placeholder="https://linkedin.com/abc"
                              />
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                           <button class="btn btn-label-secondary btn-prev">
                           <i class="ti ti-arrow-left me-sm-1"></i>
                           <span class="align-middle d-sm-inline-block d-none">Previous</span>
                           </button>
                           <button class="btn btn-success btn-submit">Submit</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <x-slot name="vendor_js">
      <script src="{{ asset('') }}vendor/libs/bs-stepper/bs-stepper.js"></script>
      <script src="{{ asset('') }}vendor/libs/bootstrap-select/bootstrap-select.js"></script>
      <script src="{{ asset('') }}vendor/libs/select2/select2.js"></script>
      <script src="{{ asset('') }}js/form-wizard-icons.js"></script>

      <script>
            $('#konsumen_id').on('change', function() {
                var kode_konsumen = $('#konsumen_id').find(':selected').data('kode_konsumen');
                var nama = $('#konsumen_id').find(':selected').data('konsumen_nama');
                var telephone = $('#konsumen_id').find(':selected').data('konsumen_telephone');

                $('#kode_konsumen').val(kode_konsumen);
                $('#konsumen_nama').val(nama);
                $('#konsumen_telephone').val(telephone);
            });
      </script>
   </x-slot>
</x-app-layout>
   