<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
					<!-- Content -->
					<div class="w-full">
					  <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
						<!-- Grid -->
						<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
						  <!-- Card -->
						  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<div class="p-4 md:p-5">
							  <div class="flex items-center gap-x-2">
								<p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
								  Total admins
								</p>
								<div class="hs-tooltip">
								  <div class="hs-tooltip-toggle">
									<svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
									<span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
										Le nombre d'utilisateurs quotidiens
									</span>
								  </div>
								</div>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								  {{$total_admins}}
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
								Total Enseignants
								</p>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_ensignants}}
								</h3>
							  </div>
							</div>
						  </div>
						  <!-- End Card -->

						  <!-- Card -->
						  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
							<div class="p-4 md:p-5">
							  <div class="flex items-center gap-x-2">
								<p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
								Total Apprenants
								</p>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_apprenants}}
								</h3>
								<span class="flex items-center gap-x-1 text-red-600">
								  <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
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
								En ligne
								</p>
							  </div>

							  <div class="mt-1 flex items-center gap-x-2">
								<h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_online}}
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
								Enseignants
								</h2>
								<p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_ensignants}}
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
								  Projets
								</h2>
								<p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
								{{$total_projets}}
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
										TOP 10 Enseignants
									</h2>
								  </div>

								  <div>
									<div class="inline-flex gap-x-2">
									  <a href="{{ route('admin.enseignants') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" href="#">
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
										MODULE / UNITÉ	
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
											Date de création
										</span>
										</div>
									</th>

									</tr>
								</thead>
									
								
								<tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
									@forelse ($topEnseignants as $enseignant)
									<tr>
										
									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{ $enseignant->matricule }}</span>
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
										<div class="flex items-center gap-x-3">
											<img class="inline-block size-[38px] rounded-full" src="{{$enseignant->user->profile_photo_url }}" alt="{{$enseignant->user->nom}} {{$enseignant->user->prenom }}">
											<div class="grow">
											<span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$enseignant->user->nom}} {{$enseignant->user->prenom }}</span>
											<span class="block text-sm text-gray-500 dark:text-neutral-500">{{$enseignant->user->email }}</span>
											</div>
										</div>
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{$enseignant->specialite }}</span>
										</div>
									</td>


									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										@if(Cache::has('user-enligne' . $enseignant->user->id))
											<div class="inline-flex items-center">
												<span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
													<span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
													En ligne
												</span>
												@else

												<span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
													<span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
													Hors ligne
												</span>
												<span class="block text-xs px-2.5 text-gray-500 dark:text-neutral-500">{{ $enseignant->user->last_seen_at ? 'Actif il y a ' . \Carbon\Carbon::parse($enseignant->user->last_seen_at)->diffForHumans(null, true) : '' }}</span>
											</div>
										@endif
										</div>
									</td>

									<td class="size-px whitespace-nowrap">
										<div class="px-6 py-3">
										<span class="text-sm text-gray-500 dark:text-neutral-500">{{ $enseignant->created_at->format('d M, Y') }}</span>
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
											{{ $topEnseignants->links() }}
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