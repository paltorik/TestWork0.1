@extends('layouts.app')

@section('content')



    <table id="table">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
<script>
    let article=@json($article);
    let table_data = {
        "headings": [
            "Заголовок",
            "Содержание",
            'Дата создания',
            "Действие"
        ],
        data: article
    };

    dataTable = new DataTable(document.getElementById('table'), {
        data: table_data,
        perPage: 20,
        perPageSelect: [20, 50, 100],
        nextPrev: true,
        firstLast: false,
        prevText: '&lsaquo;',
        nextText: '&rsaquo;',
        firstText: '&laquo;',
        lastText: '&raquo;',
        sortable: true,
        searchable: true,
        fixedColumns: true,
        fixedHeight: false,
        truncatePager: true,
        columns:[
            {
                select: 2,
                type:'date',
                format:"DD/MM/YYYY"
            },
            {
                select: 6,
                render: function(data, cell, row) {
                    return '<a href="/article/show/'+data+'">Change</a>';
                }
            }
        ]
    });

</script>

@endsection
