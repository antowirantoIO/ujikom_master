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
               <form onclick="return false" id="form_trans" method="POST">
                @csrf
                  <!-- Account Details -->
                  <div id="account-details-vertical" class="content">
                     <div class="content-header mb-3">
                        <h6 class="mb-0">Konsumen Data</h6>
                        <small>Masukan Data Konsumen.</small>
                     </div>
                     <div class="row g-3">
                        <div class="col-sm-6">
                              <label class="form-label" for="konsumen_id">Konsumen <span color="text-danger">*</span></label>
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
                           <label class="form-label" for="select_layanan">Layanan <span color="text-danger">*</span></label>
                           <select class="select2" name="layanan_id" id="select_layanan">
                              <option label=" "></option>
                              @foreach ($layanan as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        data-jenis_paket="{{ $item->jenis }}"
                                        data-jumlah_hari="{{ $item->lama_hari }}"
                                        data-harga="{{ $item->harga }}"
                                        data-berat="{{ $item->berat }}"
                                        data-satuan="{{ $item->satuan }}"
                                    >{{ $item->nama }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="jenis_paket">Jenis Paket</label>
                            <input type="text" id="jenis_paket" readonly class="form-control" />
                         </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="jumlah_hari">Jumlah Hari</label>
                            <input type="text" id="jumlah_hari" readonly class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="text" id="harga" readonly class="form-control" />
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="berat">Berat <span color="text-danger">*</span></label>
                            <input type="text" id="berat" name="berat" class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="satuan">Satuan</label>
                            <input type="text" id="satuan" readonly class="form-control" />
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="text" id="tanggal_masuk" name="tanggal_masuk" readonly class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="tanggal_keluar">Estimasi Selesai</label>
                            <input type="text" id="tanggal_keluar" name="tanggal_keluar"  readonly class="form-control" />
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
                            <label class="form-label" for="select_pembayaran">Jenis Pembayaran <span color="text-danger">*</span></label>
                            <select class="select2" name="jenis_pembayaran_id" id="select_pembayaran">
                               <option label=" "></option>
                               @foreach ($pembayaran as $item)
                                     <option value="{{ $item->id }}">{{ $item->nama }}</option>
                               @endforeach
                            </select>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="status_pembayaran">Status Pembayaran <span color="text-danger">*</span></label>
                            <select class="select2" name="status_bayar" id="status_pembayaran">
                               <option label=" "></option>
                               <option value="1">Bayar</option>
                               <option value="0">Belum Bayar</option>
                            </select>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="no_invoice">Kode Transaksi</label>
                            <input type="text" id="no_invoice" readonly name="no_invoice" class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="jumlah_bayar">Jumlah Bayar <span color="text-danger">*</span></label>
                            <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control" />
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="diskon">Diskon <span color="text-danger">*</span></label>
                            <input type="text" id="diskon" name="diskon" class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="total_bayar">Total Bayar</label>
                            <input type="text" id="total_bayar" name="total_bayar" readonly class="form-control" />
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="hutang">Hutang</label>
                            <input type="text" id="hutang" readonly name="hutang" class="form-control"</input>
                         </div>
                         <div class="col-sm-6">
                            <label class="form-label" for="kembalian">Kembalian</label>
                            <input type="text" id="kembalian" name="kembalian" readonly class="form-control" />
                         </div>
                        <div class="col-12 d-flex justify-content-between">
                           <button class="btn btn-label-secondary btn-prev">
                           <i class="ti ti-arrow-left me-sm-1"></i>
                           <span class="align-middle d-sm-inline-block d-none">Previous</span>
                           </button>
                           <button type="submit" class="btn btn-success btn-submit">Submit</button>
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
            $('#no_invoice').val('TRX-' + "{{ date('Y') }}" + Math.floor(Math.random() * 1000) + 1);
            $('#select_layanan').on('change', function() {
                var jenis_paket = $('#select_layanan').find(':selected').data('jenis_paket');
                var jumlah_hari = $('#select_layanan').find(':selected').data('jumlah_hari');
                var harga = $('#select_layanan').find(':selected').data('harga');
                var berat = $('#select_layanan').find(':selected').data('berat');
                var satuan = $('#select_layanan').find(':selected').data('satuan');

                $('#jenis_paket').val(jenis_paket);
                $('#jumlah_hari').val(jumlah_hari);
                $('#harga').val(harga);
                $('#berat').val(berat);
                $('#satuan').val(satuan);

                // get day now
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                $('#tanggal_masuk').val(today);

                // get day out
                var day_out = new Date();
                day_out.setDate(day_out.getDate() + parseInt(jumlah_hari));
                var dd_out = String(day_out.getDate()).padStart(2, '0');
                var mm_out = String(day_out.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy_out = day_out.getFullYear();

                day_out = yyyy_out + '-' + mm_out + '-' + dd_out;

                $('#tanggal_keluar').val(day_out);
            });
            $('#berat').on('keyup', function() {
                var berat = $('#berat').val();
                var harga = $('#harga').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                $('#total_bayar').val(total_bayar);
            });
            $('#jumlah_bayar').on('keyup', function() {
                var jumlah_bayar = $('#jumlah_bayar').val();
                var harga = $('#harga').val();
                var berat = $('#berat').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                var diskon = 0;
                var hutang = 0;
                var kembalian = 0;

                if (jumlah_bayar > total_bayar) {
                    diskon = 0;
                    hutang = 0;
                    kembalian = jumlah_bayar - total_bayar;
                } else if (jumlah_bayar < total_bayar) {
                    diskon = 0;
                    hutang = total_bayar - jumlah_bayar;
                    kembalian = 0;
                } else {
                    diskon = 0;
                    hutang = 0;
                    kembalian = 0;
                }

                $('#diskon').val(diskon);
                $('#total_bayar').val(total_bayar);
                $('#hutang').val(hutang);
                $('#kembalian').val(kembalian);

            });

            $('#diskon').on('keyup', function() {
                var diskon = $('#diskon').val();
                var harga = $('#harga').val();
                var berat = $('#berat').val();
                var kembalian = $('#jumlah_bayar').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                var jumlah_bayar = total_bayar;

                if (diskon > 0) {
                    jumlah_bayar = total_bayar - diskon;
                }

                $('#total_bayar').val(
                    jumlah_bayar == 0 ? total_bayar : jumlah_bayar
                );

                $('#kembalian').val(
                    kembalian == 0 ? 0 : $('#jumlah_bayar').val() - jumlah_bayar
                );
            });
      </script>
   </x-slot>
</x-app-layout>
