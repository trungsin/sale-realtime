<?php

namespace App\DataTables;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Auth;
use DataTables;
use DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->addColumn('action', function (User $user) {
                return view('admin.user.action', compact('user'));
            })
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {

        $id = Auth::user()->id;
        $currentuser = User::find($id);
        if ($currentuser->hasRole('Admin')) {
            return $model::select('users.*', 'roles.name as role_name', DB::raw("GROUP_CONCAT(DISTINCT teams.name SEPARATOR ', ') as team"))
                ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
                ->leftJoin('team_users', 'team_users.user_id', '=', 'users.id')
                ->leftJoin('teams', 'teams.id', '=',  'team_users.team_id')
                ->groupBy('users.id', 'roles.id')
                ->newQuery()
            ;
        }
        $listTeamId = TeamUser::select('team_id')
            ->where('user_id', '=', $id)
            ->get()
        ;
        $listUserId = TeamUser::select('user_id')
            ->whereIn('team_id', $listTeamId)
            ->get()
        ;
        return $model::select('users.*', 'roles.name as role_name', DB::raw("GROUP_CONCAT(DISTINCT teams.name SEPARATOR ', ') as team"))
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->leftJoin('team_users', 'team_users.user_id', '=', 'users.id')
            ->leftJoin('teams', 'teams.id', '=',  'team_users.team_id')
            ->whereIn('users.id', $listUserId)
            ->groupBy('users.id', 'roles.id')
            ->newQuery()
            ;

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom(
                "<'row'<'col-sm-5'l><'col-sm-7'f>>" .
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
            Column::make('email')->title('Email'),
            Column::make('role_name')->name('roles.name')->title('Role'),
            Column::make('team')->name('teams.name')->title('Teams'),
            Column::make('sign_in_count')->title('Sign In Count'),
            Column::make('last_sign_in_at')->title('Last Sign In'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center text-nowrap'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
