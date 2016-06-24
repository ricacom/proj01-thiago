$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2016-03-25',
            ag_ok: 2666,
            ag_faill: null,
            Ag_mark: 2647
        }, {
            period: '2016-03-26',
            ag_ok: 2778,
            ag_faill: 2294,
            Ag_mark: 2441
        }, {
            period: '2016-03-27',
            ag_ok: 4912,
            ag_faill: 1969,
            Ag_mark: 2501
        }, {
            period: '2016-03-28',
            ag_ok: 3767,
            ag_faill: 3597,
            Ag_mark: 5689
        }, {
            period: '2016-03-29',
            ag_ok: 6810,
            ag_faill: 1914,
            Ag_mark: 2293
        }, {
            period: '2016-03-30',
            ag_ok: 5670,
            ag_faill: 4293,
            Ag_mark: 1881
        }, {
            period: '2016-04-01',
            ag_ok: 4820,
            ag_faill: 3795,
            Ag_mark: 1588
        }, {
            period: '2016-04-02',
            ag_ok: 15073,
            ag_faill: 5967,
            Ag_mark: 16175
        }, {
            period: '2016-04-03',
            ag_ok: 1000,
            ag_faill: 500,
            Ag_mark: 2000
        }, {
            period: '2016-04-04',
            ag_ok: 8432,
            ag_faill: 5713,
            Ag_mark: 1791
        }],
        xkey: 'period',
        ykeys: ['ag_ok', 'ag_faill', 'Ag_mark'],
        labels: ['Agend. Realizado', 'Agend. Perdido', 'Agend. Marcado'],
        lineColors: ['green', 'red', 'blue'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });



});
