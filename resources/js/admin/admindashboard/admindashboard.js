var companies_info = JSON.parse(document.getElementById('user_info').textContent);
var option;
var chartDom = document.getElementById('chart');
var myChart = echarts.init(chartDom);
var permitTypeOption;
var chartDom2 = document.getElementById('chart2');
var myChart2 = echarts.init(chartDom2);
//investment type
var localCount = 0;
var foreignCount = 0;
var jointventure = 0;
companies_info.forEach(function(company) {
  if (company.profile.form_of_invest_id == 1) {
    localCount++;
  } else if (company.profile.form_of_invest_id == 2) {
    foreignCount++;
  } else if (company.profile.form_of_invest_id == 4) {
    jointventure++
  }
});
option = {
    title: {
        text: '',
        subtext: '',
        left: 'center',
    },
    tooltip: {
        trigger: 'item',
        textStyle: {
            fontFamily: 'Arial',
        }
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        textStyle: {
            fontFamily: 'Arial',
        }
    },
    series: [
        {
            name: 'Investment',
            type: 'pie',
            radius: '50%',
            data: [
                { value: localCount, name: 'Local Company' },
                { value: foreignCount, name: 'Foreign Company' },
                { value: jointventure, name: 'Joint Venture Company' },
            ],
            emphasis: {
                itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            },
            label: {
                show: true,
                textStyle: {
                    fontStyle: 'italic',
                    fontFamily: 'Arial',
                    fontWeight: 'bold',
                }
            }
        }
    ],
    color: ['#16a34a', '#1d4ed8', '#c026d3']
};
//permit type
var permit_MIC = 0
var permit_MIC_endorsement = 0
var permit_YRIC = 0
companies_info.forEach(function(company){
    if(company.profile.permit_type_id == 1){
        permit_MIC++
    }else if(company.profile.permit_type_id == 2){
        permit_MIC_endorsement++
    }else if(company.profile.permit_type_id == 16){
        permit_YRIC++
    }
});
permitTypeOption = {
    tooltip: {
        trigger: 'item',
        textStyle: {
            fontFamily: 'Arial',
        }
    },
    legend: {
        top: '5%',
        left: 'center',
        textStyle: {
            fontFamily: 'Arial',
        }
    },
    series: [
        {
            name: 'Number of Companies',
            type: 'pie',
            radius: ['25%', '52%'],
            avoidLabelOverlap: false,
            label: {
                show: false,
                position: 'center',
            },
            emphasis: {
                label: {
                    show: true,
                    fontSize: 40,
                    fontFamily: 'Arial',
                    fontWeight: 'bold',
                }
            },
            labelLine: {
                show: false,
            },
            data: [
                { value: permit_MIC, name: 'MIC Permit' },
                { value: permit_MIC_endorsement, name: 'MIC Endorsement' },
                { value: permit_YRIC, name: 'YRIC Endorsement' },
            ]
        }
    ],
    color: ['#16a34a', '#1d4ed8', '#c026d3',]
};
option && myChart.setOption(option);
permitTypeOption && myChart2.setOption(permitTypeOption);

//sector
var chartDomSector = document.getElementById('sectorChart');
var myChartSector = echarts.init(chartDomSector);
var sectorOption;

sectorOption = {
    dataset: [
        {
            dimensions: ['sectors', 'companies'],
            source: [
                ['Sector 1', 41],
                ['Sector 2', 20],
                ['Sector 3', 52],
                ['Sector 4', 37],
                ['Sector 5', 25],
                ['Sector 6', 19],
                ['Sector 7', 71],
                ['Sector 8', 36],
                ['Sector 9', 67],
                ['Sector 10', 67],
                ['Sector 11', 67],
                ['Sector 12', 67]
            ]
        },
        {
            transform: {
                type: 'sort',
                config: { dimension: 'sectors', order: 'asc' }
            }
        }
    ],
    xAxis: {
        type: 'category',
        axisLabel: {
            interval: 0,
            rotate: 90,
            textStyle: {
                fontFamily: 'Arial'
            }
        },
        name: 'Sector',
        nameTextStyle: {
            fontFamily: 'Arial'
        }
    },
    yAxis: {
        name: 'Companies',
        nameTextStyle: {
            fontFamily: 'Arial'
        },
        axisLabel: {
            textStyle: {
                fontFamily: 'Arial'
            }
        }
    },
    tooltip: {
        textStyle: {
            fontFamily: 'Arial'
        }
    },
    series: {
        type: 'bar',
        encode: { x: 'name', y: 'score' },
        datasetIndex: 1,
        itemStyle: {
            color: function (params) {
                var colors = ['#6610f2', '#ffbf00', '#f6e84e', '#E91E63', '#f5460c', '#6610f3', '#ffbf05', '#f6e84f', '#E91E66', '#f5460d', '#E91E68', '#f5460e'];
                return colors[params.dataIndex % colors.length];
            }
        }
    }
};

sectorOption && myChartSector.setOption(sectorOption);

//yearly
var chartDomLine = document.getElementById('lineChart');
var myChartLine = echarts.init(chartDomLine);
var lineChartOption;

lineChartOption = {
    dataset: [
        {
            dimensions: ['Year', 'Income'],
            source: [
                { 'Year': 1950 },
                { 'Year': 1960 },
                { 'Year': 1970 },
                { 'Year': 1980 },
                { 'Year': 1990 },
                { 'Year': 2000 },
                { 'Year': 2010 },
                { 'Year': 2020 }
            ]
        },
        {
            transform: {
                type: 'filter',
                config: {
                    and: [
                        { dimension: 'Year', gte: 1950 },
                        { dimension: 'Country', '=': 'Germany' }
                    ]
                }
            }
        },
        {
            transform: {
                type: 'filter',
                config: {
                    and: [
                        { dimension: 'Year', gte: 1950 },
                        { dimension: 'Country', '=': 'France' }
                    ]
                }
            }
        }
    ],
    title: {
        text: 'Investor Companies Since 1950',
        textStyle: {
            fontFamily: 'Arial'
        }
    },
    tooltip: {
        trigger: 'axis',
        textStyle: {
            fontFamily: 'Arial'
        }
    },
    xAxis: {
        type: 'category',
        nameLocation: 'middle',
        data: ['1950', '1960', '1970', '1980', '1990', '2000', '2010', '2020'],
        axisLabel: {
            textStyle: {
                fontFamily: 'Arial'
            }
        },
        nameTextStyle: {
            fontFamily: 'Arial'
        }
    },
    yAxis: {
        name: 'Income',
        axisLabel: {
            textStyle: {
                fontFamily: 'Arial'
            }
        },
        nameTextStyle: {
            fontFamily: 'Arial'
        }
    },
    series: [
        {
            type: 'line',
            datasetId: 'dataset_since_1950_of_germany',
            showSymbol: false,
            encode: {
                x: 'Year',
                y: 'Income',
                itemName: 'Year',
                tooltip: ['Income']
            },
            data: [100, 200, 800, 770, 500, 600, 700, 1000]
        },
    ]
};

lineChartOption && myChartLine.setOption(lineChartOption);
