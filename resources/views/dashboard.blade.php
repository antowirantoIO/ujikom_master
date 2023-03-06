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
                          <p class="mb-2">{{ date('d/m/Y - H:i') }}</p>
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
                              <h5 class="mb-0">230</h5>
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
                              <h5 class="mb-0">208</h5>
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
                              <h5 class="mb-0">120</h5>
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
                              <h5 class="mb-0">300</h5>
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
                          <h5 class="card-title mb-0">Rp. 320.000</h5>
                          <small class="text-muted">Mingguan</small>
                        </div>
                        <div class="card-body">
                          <div class="mt-md-2 text-center mt-lg-3 mt-3">
                            <small class="text-muted mt-3">120.000 pendapatan lebih dari minggu lalu</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Profit last month -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">Rp. 920.000</h5>
                                <small class="text-muted">Bulanan</small>
                            </div>
                            <div class="card-body">
                                <div class="mt-md-2 text-center mt-lg-3 mt-3">
                                    <small class="text-muted mt-3">120.000 pendapatan lebih dari bulan lalu</small>
                                </div>
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
                        <div class="col-md-8">
                          <div id="totalRevenueChart"></div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center mt-4">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary"
                                type="button"
                                id="budgetId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                              </button>
                            </div>
                          </div>
                          <h3 class="text-center pt-4 mb-0">$25,825</h3>
                          <p class="mb-4 text-center"><span class="fw-semibold">Budget: </span>56,800</p>
                          <div class="px-3">
                            <div id="budgetChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Revenue Report -->
              </div>
            </div>

            <x-slot name="vendor_js">
                <script src="{{ asset('') }}vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="{{ asset('') }}vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
                </x-slot>
                <x-slot name="page_js">
                <script src="{{ asset('') }}js/dashboards-ecommerce.js"></script>

                <script>

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
                                        data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
                                    }
                                ],
                                chart: {
                                    height: 365,
                                    parentHeightOffset: 0,
                                    stacked: true,
                                    type: 'bar',
                                    toolbar: { show: false }
                                },
                                tooltip: {
                                    enabled: false
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
                                stroke: {
                                    curve: 'smooth',
                                    width: 6,
                                    lineCap: 'round',
                                    colors: [cardColor]
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
                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
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
                                        }
                                    },
                                    max: 300,
                                    tickAmount: 5
                                },
                                responsive: [
                                    {
                                        breakpoint: 1700,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '43%'
                                                }
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 1441,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '52%'
                                                }
                                            },
                                            chart: {
                                                height: 375
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 1300,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '62%'
                                                }
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 1025,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '70%'
                                                }
                                            },
                                            chart: {
                                                height: 390
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 991,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '38%'
                                                }
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 850,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '48%'
                                                }
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 449,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '70%'
                                                }
                                            },
                                            chart: {
                                                height: 360
                                            },
                                            xaxis: {
                                                labels: {
                                                    offsetY: -5
                                                }
                                            }
                                        }
                                    },
                                    {
                                        breakpoint: 394,
                                        options: {
                                            plotOptions: {
                                                bar: {
                                                    columnWidth: '88%'
                                                }
                                            }
                                        }
                                    }
                                ],
                                states: {
                                    hover: {
                                        filter: {
                                            type: 'none'
                                        }
                                    },
                                    active: {
                                        filter: {
                                            type: 'none'
                                        }
                                    }
                                }
                            };
                        if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
                            const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
                            totalRevenueChart.render();
                        }
                    })

                </script>
            </x-slot>
</x-app-layout>
