let dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
    [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
    [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],
    [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" ],
    [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" ],
    [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" ],
    [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" ],
    [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" ],
    [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" ],
    [ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" ],
    [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" ],
    [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" ],
    [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" ],
    [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" ],
    [ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" ],
    [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" ],
    [ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" ],
    [ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" ],
    [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" ],
    [ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" ],
    [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" ],
    [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" ],
    [ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600" ],
    [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" ],
    [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" ],
    [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" ],
    [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" ],
    [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" ],
    [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" ],
    [ "Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400" ],
    [ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" ],
    [ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" ],
    [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" ],
    [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" ],
    [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
];




(function($) {
    "use strict"
    //example 1
    var table = $('#example').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
    });
      
    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })
    
    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });



    //example 2
    var table2 = $('#example2').DataTable( {
        createdRow: function ( row, data, index ) {
            $(row).addClass('selected')
        },

        "scrollY":        "42vh",
        "scrollCollapse": true,
        "paging":         false
    });

    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })
        
    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });
	
	// dataTable1
	var table = $('#dataTable1').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable2
	var table = $('#dataTable2').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable3
	var table = $('#dataTable3').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable4
	var table = $('#dataTable4').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false,
		
	});
	
	// dataTable5
	var table = $('#example5').DataTable({
		searching: false,
		paging:true,
		select: false,
		info: true,         
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
		
	}); 
	
	// dataTable6
		var table = $('#example6').DataTable({
			searching: false,
			paging:true,
			select: false,
			info: false,         
			lengthChange:false ,
			language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
			
		});
		
		// dataTable7
		var table = $('#example7').DataTable({
			searching: false,
			paging:true,
			select: false,
			info: false,         
			lengthChange:false ,
			language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
			
		});
		
		// dataTable8
		var table = $('#example8').DataTable({
			searching: false,
			paging:true,
			select: false,
			info: false,         
			lengthChange:false ,
			language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
			
		});
	// orderTable
		var table = $('#orderTable').DataTable({
			searching: false,
			paging:true,
			select: false,
			info: false,         
			lengthChange:false ,
			language: {
				paginate: {
				  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
				  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
				}
			  }
			
		});
		
		
	
	// table row
	var table = $('#dataTable1, #dataTable2, #dataTable3, #dataTable4,  #example3, #example4 ').DataTable({
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
	});

	
	$('#example tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
	});
	
	function getDatatablesTipe(url, table = '#myDatatable') {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'name' },
                { data: 'merek.name' },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
							<div class="d-flex">
								<a href="" class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" onclick="event.preventDefault(); $.popup({ url: '/edit-merek/${row.id}/', title: 'Edit Merek' })"><i class="fa fa-pencil-alt"></i></a>
								<a href="delete-merek/${row.id}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="${row.name}"><i class="fa fa-trash"></i></a>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    function getDatatablesMerek(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'name' },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
							<div class="d-flex">
								<a href="" class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" onclick="event.preventDefault(); $.popup({ url: '/edit-merek/${row.id}/', title: 'Edit Merek' })"><i class="fa fa-pencil-alt"></i></a>
								<a href="delete-tipe/${row.id}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="${row.name}"><i class="fa fa-trash"></i></a>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

	function getDatatablesRoll(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'roll_name' },
                { data: 'produk.nama_produk' },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
							<div class="d-flex">
								<a href="" class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" onclick="event.preventDefault(); $.popup({ url: '/edit-m_roll/${row.id}/', title: 'Edit Master Roll' })"><i class="fa fa-pencil-alt"></i></a>
								<a href="delete-tipe/${row.id}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="${row.name}"><i class="fa fa-trash"></i></a>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

	function getDatatablesSubRoll(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'kode_sub_roll' },
                { data: 'm_roll.roll_name' },
                { data: 'm_roll.produk.nama_produk' },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
							<div class="d-flex">
								<a href="delete-tipe/${row.id}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="${row.name}"><i class="fa fa-trash"></i></a>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    function getDatatablesProduk(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'id_produk' },
                { data: 'nama_produk' },
                { data: 'kategori.kategori' },
                { data: 'warranty.tipe' },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
							<div class="d-flex">
								<a href="" class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" onclick="event.preventDefault(); $.popup({ url: '/edit-produk/${row.id}/', title: 'Edit Produk' })"><i class="fa fa-pencil-alt"></i></a>
								<a href="delete-tipe/${row.id}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="${row.name}"><i class="fa fa-trash"></i></a>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    function getDatatablesPendaftaran(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'code' },
                { data: 'nama' },
                { data: 'merek' },
                { data: 'tipe' },
                { data: 'nomor_rangka' },
                { data: 'nomor_plat' },
                { data: 'dealer' },
                { data: 'status',
                    render: function(data, type, row) {
                        var statusBadge = '',
                            action_status = '';

                        if(row.status != 'claimed'){
                            action_status = `<a class="dropdown-item" href="/verified-registration/${row.id}">Verifikasi</a>`;
                        } else {
                            action_status = `<a class="dropdown-item" href="/notverified-registration/${row.id}">Batal Verifikasi</a>`;
                        }

                        if(row.status == 'claimed') {
                            statusBadge = `<span class="badge badge-success">Terverifikasi<span class="ms-1 fa fa-check"></span>`;
                        } else if (row.status == 'unclaimed') {
                            statusBadge = `<span class="badge badge-warning">Belum <br> Klaim<br><span class="ms-1 fas fa-ban"></span>`;
                        } else if (row.status == 'pending') {
                            statusBadge = `<span class="badge badge-primary">Pending<span class="ms-1 fa fa-check"></span>`;
                        }

                        var button = `<div class="row">
                                        <div class="col-md-6">
                                            ${statusBadge}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-7" data-bs-toggle="dropdown"
                                                data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                                            </circle>
                                                        </g></svg></span>
                                                </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-7">
                                                <div class="py-2">
                                                    ${action_status}
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;


                        return button;
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
						return `
                            <div class="d-flex">
                                <div class="dropdown">
                                    <button class="btn btn-primary tp-btn-light" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="order-dropdown-2">
                                        <a class="btn-xs dropdown-item" title="Detail" onclick="event.preventDefault(); $.popup({ url: '/detail-pendaftaran/${row.id}/', title: 'Detail Pendaftaran', modalSize: 'lg' })">
                                            <i class="fa fa-regular fa-eye"></i> Lihat
                                        </a>
                                        <a class="btn btn-xs dropdown-item" title="Edit" onclick="event.preventDefault(); $.popup({ url: '/edit-pendaftaran/${row.id}/', title: 'Edit Pendaftaran', modalSize: 'lg' })">
                                            <i class="fa fa-pencil-alt"></i> Ubah
                                        </a>
                                        <a href="delete-pendaftaran/${row.id}" class="btn-xs dropdown-item btn-delete" data-name="${row.code}">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </div>
							</div>
						`;
					},					
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }
    
    function getDatatablesHistRoll(url, table) {
        return $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
            },
            pageLength: 10,
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
				{data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
					},
					orderable: false // Kolom tidak dapat diurutkan
				},
                { data: 'kode_sub_roll' },
                { data: 'roll_name' },
                { data: 'nama_produk' },
                { data: 'user_input' },
                { data: 'tgl_input' }
            ]
        });
    }

    getDatatablesTipe('get-data-tipe', '#myDatatable');
    getDatatablesMerek('get-data-merek', '#merek');
    getDatatablesRoll('get-data-m_roll', '#m_roll');
    getDatatablesSubRoll('get-data-sub_roll', '#sub_roll');
    getDatatablesProduk('get-data-listproduk', '#produk');
    getDatatablesPendaftaran('get-data-pendaftaran', '#pendaftaran');
    getDatatablesHistRoll('get-data-hist_sub_roll', '#hist_sub_roll');
	
})(jQuery);