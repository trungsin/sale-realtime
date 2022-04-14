<?php

namespace App\DataTables;

use App\Models\Team;
use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class TeamDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query results from query() method
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->editColumn('user', function(Team $team) {
                $userIds = $team->teamUsers()->pluck('user_id')->toArray();
                return User::whereIn('id', $userIds)->pluck('name')->join(', ');
            })
            ->addColumn('action', function (Team $team) {
                return view('admin.team.action', compact('team'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Team $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('team-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-5'l><'col-sm-7'f>>" .
                "<'row'<'col-sm-12'<'table-responsive'tr>>>" .
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
            )
            ->orderBy(1)
        ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->title('Name'),
            Column::computed('user')->title('Users'),
            Column::make('description')->title('Description'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center text-nowrap')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Team_' . date('YmdHis');
    }
}
