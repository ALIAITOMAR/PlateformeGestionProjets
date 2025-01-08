<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
					<!-- Content -->
					<div class="w-full">
					  <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
						<!-- Grid -->
						<div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6">
						  <!-- Card -->
						  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<div class="p-4 md:p-5">
							  <div class="flex items-center gap-x-2">
								<p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
								  Total projets
								</p>
								<div class="hs-tooltip">
								  <div class="hs-tooltip-toggle">
									<svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
									<span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
									  The number of daily users
									</span>
								  </div>
								</div>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								  {{$total_projets}}
								</h3>
								<span class="flex items-center gap-x-1 text-green-600">
								  <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
								  <span class="inline-block text-sm">
									1.7%
								  </span>
								</span>
							  </div>
							</div>
						  </div>
						  <!-- End Card -->

						  <!-- Card -->
						  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<div class="p-4 md:p-5">
							  <div class="flex items-center gap-x-2">
								<p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
								Total livrables
								</p>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_livrables}}
								</h3>
							  </div>
							</div>
						  </div>
						  <!-- End Card -->
						</div>
						<!-- End Grid -->

						<div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
						  <!-- Card -->
						  <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<!-- Header -->
							<div class="flex justify-between items-center">
							  <div>
								<h2 class="text-sm text-gray-500 dark:text-neutral-500">
								  Projets
								</h2>
								<p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_projets}}
								</p>
							  </div>

							  <div>
								<span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
								  <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
								  25%
								</span>
							  </div>
							</div>
							<!-- End Header -->

							<div id="hs-multiple-bar-charts"></div>
						  </div>
						  <!-- End Card -->

						  <!-- Card -->
						  <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<!-- Header -->
							<div class="flex justify-between items-center">
							  <div>
								<h2 class="text-sm text-gray-500 dark:text-neutral-500">
								  Livrables
								</h2>
								<p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_livrables}}
								</p>
							  </div>

							  <div>
								<span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500">
								  <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
								  2%
								</span>
							  </div>
							</div>
							<!-- End Header -->

							<div id="hs-single-area-chart"></div>
						  </div>
						  <!-- End Card -->
						</div>

						<!-- Card -->
						<div class="flex flex-col">
						  <div class="-m-1.5 overflow-x-auto">
							<div class="p-1.5 min-w-full inline-block align-middle">
							  <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
								<!-- Header -->
								<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
								  <div>
									<h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
										10 derniers projets livrés
									</h2>
								  </div>

								  <div>
									<div class="inline-flex gap-x-2">
									  <a href="{{ route('apprenant.livrables') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" href="#">
										View all
									  </a>
									</div>
								  </div>
								</div>
								<!-- End Header -->

								<!-- Table -->
								<table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
								<thead class="bg-gray-50 dark:bg-neutral-800">
									<tr>

									<th scope="col" class="ps-6 py-3 text-start">
										<div class="flex items-center gap-x-2">
										<span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
											Projet
										</span>
										</div>
									</th>

									<th scope="col" class="px-6 py-3 text-start">
										<div class="flex items-center gap-x-2">
										<span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
										Classe / Groupe
										</span>
										</div>
									</th>

									<th scope="col" class="px-6 py-3 text-start">
										<div class="flex items-center gap-x-2">
										<span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
										Apprenants
										</span>
										</div>
									</th>

									<th scope="col" class="px-6 py-3 text-start">
										<div class="flex items-center gap-x-2">
										<span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
											Etat
										</span>
										</div>
									</th>

									<th scope="col" class="px-6 py-3 text-start">
										<div class="flex items-center gap-x-2">
										<span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
											Date Echeance
										</span>
										</div>
									</th>

									</tr>
								</thead>
									
								
								<tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
									@forelse ($livrables as $livrable)
									<tr>
										
									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->projet->titre }}</span>
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->classe->nom }}</span>
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">
											<div class="flex justify-center text-center -space-x-4 rtl:space-x-reverse">
												@foreach ($livrable->affectation->classe->apprenants->take(4) as $apprenant)
													<img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{ $apprenant->user->profile_photo_url }}" alt="{{ $apprenant->user->nom }}">
												@endforeach
												@if ($livrable->affectation->classe->apprenants->count() > 4)
													<a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+{{ ($affectation->classe->apprenants->count() - 4) }}</a>
												@elseif ($livrable->affectation->classe->apprenants->count() === 0)
													{{ $livrable->affectation->classe->apprenants->count() }}
												@endif
											</div>
											</span>
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										@if($livrable->etat === 'Rendu')    
											<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
												<svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<line x1="12" x2="12" y1="2" y2="6"></line>
													<line x1="12" x2="12" y1="18" y2="22"></line>
													<line x1="4.93" x2="7.76" y1="4.93" y2="7.76"></line>
													<line x1="16.24" x2="19.07" y1="16.24" y2="19.07"></line>
													<line x1="2" x2="6" y1="12" y2="12"></line>
													<line x1="18" x2="22" y1="12" y2="12"></line>
													<line x1="4.93" x2="7.76" y1="19.07" y2="16.24"></line>
													<line x1="16.24" x2="19.07" y1="7.76" y2="4.93"></line>
												</svg>
												{{ $livrable->etat }}
											</span>
											@endif

											@if($livrable->etat === 'Rendu en retard')    
											<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
												<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
													<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
												</svg>
												{{ $livrable->etat }}
											</span>
											@endif

											@if($livrable->etat === 'Approuvé')    
											<span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
												<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
													<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
												</svg>
												{{ $livrable->etat }}
											</span>
											@endif

											@if($livrable->etat === 'Rejeté')    
											<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-green-200">
												<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
													<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
												</svg>
												{{ $livrable->etat }}
											</span>
											@endif
										</div>
									</td>


									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{ $livrable->affectation->date_echeance->format('d/m/Y') }}</span>
										</div>
									</td>

									</tr>
									@empty
									<tr>
										<td colspan="9" class="text-center size-px whitespace-nowrap">
											<div class="px-6 py-3">
												<span class="text-sm text-gray-500 dark:text-neutral-500">{{ __('Aucun enregistrement trouvé') }}</span>
											</div>
										</td>
									</tr>
									@endforelse
								</tbody>
								</table>
								<!-- End Table -->

								<!-- Footer -->
								<div class="px-6 py-4 grid gap-3 border-t border-gray-200 dark:border-neutral-700">
									<div>
										<div class="">
											{{ $livrables->links() }}
										</div>
									</div>
								</div>
								<!-- End Footer -->
							  </div>
							</div>
						  </div>
						</div>
						<!-- End Card -->
					  </div>
					</div>
					<!-- End Content -->
						</div>
            </div>
        </div>
    </div>
	<script>
  window.addEventListener('load', () => {
    (function () {
      buildChart('#hs-multiple-bar-charts', (mode) => ({
        chart: {
          type: 'bar',
          height: 300,
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        series: [
          {
            name: 'Chosen Period',
            data: [23000, 44000, 55000, 57000, 56000, 61000, 58000, 63000, 60000, 66000, 34000, 78000]
          }, {
            name: 'Last Period',
            data: [17000, 76000, 85000, 101000, 98000, 87000, 105000, 91000, 114000, 94000, 67000, 66000]
          }
        ],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '16px',
            borderRadius: 0
          }
        },
        legend: {
          show: false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 8,
          colors: ['transparent']
        },
        xaxis: {
          categories: [
            'Janvier',
			'Février',
			'Mars',
			'Avril',
			'Mai',
			'Juin',
			'Juillet',
			'Août',
			'Septembre',
			'Octobre',
			'Novembre',
			'Décembre'
          ],
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            show: false
          },
          labels: {
            style: {
              colors: '#9ca3af',
              fontSize: '13px',
              fontFamily: 'Inter, ui-sans-serif',
              fontWeight: 400
            },
            offsetX: -2,
            formatter: (title) => title.slice(0, 3)
          }
        },
        yaxis: {
          labels: {
            align: 'left',
            minWidth: 0,
            maxWidth: 140,
            style: {
              colors: '#9ca3af',
              fontSize: '13px',
              fontFamily: 'Inter, ui-sans-serif',
              fontWeight: 400
            },
            formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
          }
        },
        states: {
          hover: {
            filter: {
              type: 'darken',
              value: 0.9
            }
          }
        },
        tooltip: {
          y: {
            formatter: (value) => `$${value >= 1000 ? `${value / 1000}k` : value}`
          },
          custom: function (props) {
            const { categories } = props.ctx.opts.xaxis;
            const { dataPointIndex } = props;
            const title = categories[dataPointIndex];
            const newTitle = `${title}`;

            return buildTooltip(props, {
              title: newTitle,
              mode,
              hasTextLabel: true,
              wrapperExtClasses: 'min-w-28',
              labelDivider: ':',
              labelExtClasses: 'ms-2'
            });
          }
        },
        responsive: [{
          breakpoint: 568,
          options: {
            chart: {
              height: 300
            },
            plotOptions: {
              bar: {
                columnWidth: '14px'
              }
            },
            stroke: {
              width: 8
            },
            labels: {
              style: {
                colors: '#9ca3af',
                fontSize: '11px',
                fontFamily: 'Inter, ui-sans-serif',
                fontWeight: 400
              },
              offsetX: -2,
              formatter: (title) => title.slice(0, 3)
            },
            yaxis: {
              labels: {
                align: 'left',
                minWidth: 0,
                maxWidth: 140,
                style: {
                  colors: '#9ca3af',
                  fontSize: '11px',
                  fontFamily: 'Inter, ui-sans-serif',
                  fontWeight: 400
                },
                formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
              }
            },
          },
        }]
      }), {
        colors: ['#2563eb', '#d1d5db'],
        grid: {
          borderColor: '#e5e7eb'
        }
      }, {
        colors: ['#6b7280', '#2563eb'],
        grid: {
          borderColor: '#374151'
        }
      });
    })();
  });
</script>

<script>
  window.addEventListener('load', () => {
    (function () {
      buildChart('#hs-single-area-chart', (mode) => ({
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        series: [
          {
            name: 'Visitors',
            data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70]
          }
        ],
        legend: {
          show: false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight',
          width: 2
        },
        grid: {
          strokeDashArray: 2
        },
        fill: {
          type: 'gradient',
          gradient: {
            type: 'vertical',
            shadeIntensity: 1,
            opacityFrom: 0.1,
            opacityTo: 0.8
          }
        },
        xaxis: {
          type: 'category',
          tickPlacement: 'on',
          categories: [
            '25 Janvier 2024',
            '26 Janvier 2024',
            '27 Janvier 2024',
            '28 Janvier 2024',
            '29 Janvier 2024',
            '30 Janvier 2024',
            '31 Janvier 2024',
            '1 Février 2024',
            '2 Février 2024',
            '3 Février 2024',
            '4 Février 2024',
            '5 Février 2024'
          ],
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            stroke: {
              dashArray: 0
            },
            dropShadow: {
              show: false
            }
          },
          tooltip: {
            enabled: false
          },
          labels: {
            style: {
              colors: '#9ca3af',
              fontSize: '13px',
              fontFamily: 'Inter, ui-sans-serif',
              fontWeight: 400
            },
            formatter: (title) => {
              let t = title;

              if (t) {
                const newT = t.split(' ');
                t = `${newT[0]} ${newT[1].slice(0, 3)}`;
              }

              return t;
            }
          }
        },
        yaxis: {
          labels: {
            align: 'left',
            minWidth: 0,
            maxWidth: 140,
            style: {
              colors: '#9ca3af',
              fontSize: '13px',
              fontFamily: 'Inter, ui-sans-serif',
              fontWeight: 400
            },
            formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
          }
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy'
          },
          y: {
            formatter: (value) => `${value >= 1000 ? `${value / 1000}k` : value}`
          },
          custom: function (props) {
            const { categories } = props.ctx.opts.xaxis;
            const { dataPointIndex } = props;
            const title = categories[dataPointIndex].split(' ');
            const newTitle = `${title[0]} ${title[1]}`;

            return buildTooltip(props, {
              title: newTitle,
              mode,
              valuePrefix: '',
              hasTextLabel: true,
              markerExtClasses: '!rounded-sm',
              wrapperExtClasses: 'min-w-28'
            });
          }
        },
        responsive: [{
          breakpoint: 568,
          options: {
            chart: {
              height: 300
            },
            labels: {
              style: {
                colors: '#9ca3af',
                fontSize: '11px',
                fontFamily: 'Inter, ui-sans-serif',
                fontWeight: 400
              },
              offsetX: -2,
              formatter: (title) => title.slice(0, 3)
            },
            yaxis: {
              labels: {
                align: 'left',
                minWidth: 0,
                maxWidth: 140,
                style: {
                  colors: '#9ca3af',
                  fontSize: '11px',
                  fontFamily: 'Inter, ui-sans-serif',
                  fontWeight: 400
                },
                formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
              }
            },
          },
        }]
      }), {
        colors: ['#2563eb', '#9333ea'],
        fill: {
          gradient: {
            stops: [0, 90, 100]
          }
        },
        grid: {
          borderColor: '#e5e7eb'
        }
      }, {
        colors: ['#3b82f6', '#a855f7'],
        fill: {
          gradient: {
            stops: [100, 90, 0]
          }
        },
        grid: {
          borderColor: '#374151'
        }
      });
    })();
  });
</script>