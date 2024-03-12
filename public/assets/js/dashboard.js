$(function() {
	getContents();
});

function getContents() {
	$('#cover-spin').show();
	$.ajax({
		type: "GET",
		url: getDashboardURL,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function (response) {
			$('#cover-spin').hide();
			if (response.status == 'success') {
                getUserByDepartments(response.departments);
				getUserByDesignations(response.designations);
			}
		},
		error:function(error) {
			$('#cover-spin').hide();
			toastr.error('Something went wrong.');
		}
	});
}

function getUserByDepartments(departments) {
    let departmentArray = [];
    for(let i = 0; i < departments.length; i++)
    {
        let temp=[]; 
        temp.push(departments[i].title);
        temp.push(departments[i].count);
        departmentArray.push(temp);
    }
    let html = '';
    html += '<div class="card shadow mb-4">'+
        '<figure class="highcharts-figure">'+
            '<div id="user-by-department">'+
            '</div>'+
        '</figure>'+
    '</div>';
    $('.users-department').html(html);

    Highcharts.chart('user-by-department', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'User<br>By<br>Departments<br>',
            align: 'center',
            verticalAlign: 'middle',
            y: 60
        },
        
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            name: 'User',
            innerSize: '50%',
            data: departmentArray
        }]
    });

}

function getUserByDesignations(designations) {
    let designationArray = [];
    for(let i = 0; i < designations.length; i++)
    {
        let temp=[]; 
        temp.push(designations[i].title);
        temp.push(designations[i].count);
        designationArray.push(temp);
    }
    let html = '';
    html += '<div class="card shadow mb-4">'+
            '<figure class="highcharts-figure">'+
                '<div id="users-by-designation">'+
                '</div>'+
            '</figure>'+
        '</div>';
    $('.users-designation').html(html);
    Highcharts.chart('users-by-designation', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'User By Designations',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'User',
            data: designationArray
        }]
    });
}