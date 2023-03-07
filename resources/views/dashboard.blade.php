<x-app-layout>
    <x-slot name="vendor_css">
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/apex-charts/apex-charts.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
        <link rel="stylesheet" href="{{ asset('') }}vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    </x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <!-- View sales -->
                <div class="col-xl-4 mb-4 col-lg-5 col-12">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-7">
                        <div class="card-body text-nowrap">
                          <h5 class="card-title mb-0">Selamat Datang {{ explode(" ", Auth::user()->name)[0] }}! 🎉</h5>
                          <p class="mb-2">{{ date('d/m/Y') }}</p>
                          <a href="javascript:;" class="btn btn-primary">Lihat Transaksi</a>
                        </div>
                      </div>
                      <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{ asset('') }}img/illustrations/card-advance-sale.png"
                            height="140"
                            alt="view sales"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- View sales -->

                <!-- Statistics -->
                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">Updated {{ date('M') }}</small>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                              <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">{{ $konsumen }}</h5>
                              <small>Konsumen</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                              <i class="ti ti-users ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">{{ $status['BARU'] }}</h5>
                              <small>Orderan Baru</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                              <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">{{ $status['DIPROSES'] }}</h5>
                              <small>Orderan Proses</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                              <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">{{ $status['SELESAI'] }}</h5>
                              <small>Orderan Selesai</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xl-4 col-12">
                  <div class="row">
                    <!-- Expenses -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h5 class="card-title mb-0">{{ number_format($income_today) }}</h5>
                          <small class="text-muted">Harian</small>
                        </div>
                        <div class="card-body">
                            </div>
                      </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Profit last month -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">{{ number_format($income_month) }}</h5>
                                <small class="text-muted">Bulanan</small>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Generated Leads -->
                    <div class="col-xl-12 mb-4 col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                              <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                <small>Monthly Report</small>
                              </div>
                              <div class="chart-statistics">
                                <h3 class="card-title mb-1">4,350</h3>
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="ti ti-chevron-up me-1"></i> 15.8%</small
                                >
                              </div>
                            </div>
                            <div id="generatedLeadsChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Generated Leads -->
                  </div>
                </div>

                <!-- Revenue Report -->
                <div class="col-12 col-xl-8 mb-4 col-lg-7">
                  <div class="card">
                    <div class="card-header pb-3">
                      <h5 class="m-0 me-2 card-title">Income Tahunan</h5>
                    </div>
                    <div class="card-body">
                      <div class="row row-bordered g-0">
                        <div class="col-md-12">
                          <div id="totalRevenueChart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Revenue Report -->
              </div>
            </div>

            @php
                function _tanggal($tanggal)
                {
                    $bulan = ['Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    return $bulan[(int) $tanggal];
                }
            @endphp

            <x-slot name="vendor_js">
                <script src="{{ asset('') }}vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="{{ asset('') }}vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
                </x-slot>
                <x-slot name="page_js">
                <script src="{{ asset('') }}js/dashboards-ecommerce.js"></script>

                <script>
                    
                    function number_format(number, decimals, dec_point, thousands_sep) {
                    // *     example: number_format(1234.56, 2, ',', ' ');
                    // *     return: '1 234,56'
                        number = (number + '').replace(',', '').replace(' ', '');
                        var n = !isFinite(+number) ? 0 : +number,
                                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                s = '',
                                toFixedFix = function (n, prec) {
                                    var k = Math.pow(10, prec);
                                    return '' + Math.round(n * k) / k;
                                };
                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                        if (s[0].length > 3) {
                            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                        }
                        if ((s[1] || '').length < prec) {
                            s[1] = s[1] || '';
                            s[1] += new Array(prec - s[1].length + 1).join('0');
                        }
                        return s.join(dec);
                    }

                    $('document').ready(function(){
                        let cardColor, labelColor, headingColor, borderColor, legendColor;

                        if (isDarkStyle) {
                            cardColor = config.colors_dark.cardColor;
                            labelColor = config.colors_dark.textMuted;
                            legendColor = config.colors_dark.bodyColor;
                            headingColor = config.colors_dark.headingColor;
                            borderColor = config.colors_dark.borderColor;
                        } else {
                            cardColor = config.colors.cardColor;
                            labelColor = config.colors.textMuted;
                            legendColor = config.colors.bodyColor;
                            headingColor = config.colors.headingColor;
                            borderColor = config.colors.borderColor;
                        }

                        const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
                            totalRevenueChartOptions = {
                                series: [
                                    {
                                        name: 'Earning',
                                        data: [
                                            <?php foreach ($chart_data as $value) {
                                                echo $value->total . ', ';
                                            } ?>
                                        ]
                                    }
                                ],
                                chart: {
                                    type: 'bar',
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '40%',
                                        borderRadius: 10,
                                        startingShape: 'rounded',
                                        endingShape: 'rounded'
                                    }
                                },
                                colors: [config.colors.primary, config.colors.warning],
                                dataLabels: {
                                    enabled: false
                                },
                                legend: {
                                    show: true,
                                    horizontalAlign: 'left',
                                    position: 'top',
                                    fontFamily: 'Public Sans',
                                    markers: {
                                        height: 12,
                                        width: 12,
                                        radius: 12,
                                        offsetX: -3,
                                        offsetY: 2
                                    },
                                    labels: {
                                        colors: legendColor
                                    },
                                    itemMargin: {
                                        horizontal: 5
                                    }
                                },
                                grid: {
                                    show: false,
                                    padding: {
                                        bottom: -8,
                                        top: 20
                                    }
                                },
                                xaxis: {
                                    categories: [
                                        <?php foreach ($chart_data as $value) {
                                            echo '"' . _tanggal($value->month) . '",';
                                        } ?>
                                    ],
                                    labels: {
                                        style: {
                                            fontSize: '13px',
                                            colors: labelColor,
                                            fontFamily: 'Public Sans'
                                        }
                                    },
                                    axisTicks: {
                                        show: false
                                    },
                                    axisBorder: {
                                        show: false
                                    }
                                },
                                yaxis: {
                                    labels: {
                                        offsetX: -16,
                                        style: {
                                            fontSize: '13px',
                                            colors: labelColor,
                                            fontFamily: 'Public Sans'
                                        },
                                        formatter: function (value) {
                                            return 'RP. ' + number_format(value);
                                        }
                                    }
                                },
                            };
                        if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
                            const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
                            totalRevenueChart.render();
                        }
                    })

                </script>
            </x-slot>
</x-app-layout>
