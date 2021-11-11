@extends('layouts.app')

@section('content')

    <div class="uk-margin-top">
        <p>
            <a class="uk-button uk-button-primary" href="{{ route("article.create") }}">Добавить статью</a>
        </p>
        <table class="uk-table uk-table-striped uk-table-hover uk-table-small uk-table-justify uk-table-responsive"
               id="table">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script>
        let article =@json($article);

        let table_data = {
            "headings": [
                "Заголовок",
                "Содержание",
                'Дата создания',
                "Действие"
            ],
            data: article.data
        };
        console.log(article.data)
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
            columns: [
                {
                    select: 2,
                    type: 'date',
                    format: "DD/MM/YYYY"
                }
            ]
        });

    </script>

@endsection
