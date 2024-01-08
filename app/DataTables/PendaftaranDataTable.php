<?php

namespace App\DataTables;

use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendaftaranDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $actionButton = '
                <span class="badge badge-warning">
                <a href="' . route('pendaftaran.update', $row->id) . '">
                ' . $row->status_pendaftran . ' </a>
                </span>
                ';
                return $actionButton;
            })
            ->addColumn('Nama', function ($row) {
                return $row->user->name;
            })
            ->addColumn('Nisn', function ($row) {
                return $row->user->nisn;
            })
            ->addColumn('Kelas', function ($row) {
                return $row->user->kelas;
            })
            ->addColumn('No_Hp', function ($row) {
                return $row->user->nohp;
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pendaftaran $model): QueryBuilder
    {
        $pembina = User::pembinaData()->first();
        $dataPembina = $pembina->pembina->id;
        return $model->belumDisetujui($dataPembina)->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendaftaran-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                ->orderable(false)
                ->searchable(false),
            Column::make('Nama'),
            Column::make('Nisn'),
            Column::make('Kelas'),
            Column::make('No_Hp')
                ->title('No Hp'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pendaftaran_' . date('YmdHis');
    }
}
