<?php

namespace App\DataTables\Reports;

use App\Customer;
use App\Renter;
use App\Flat;
use App\Renter_flat;
use App\Monthly_total;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use DB;

class TotalsDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $data;

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            // ->addColumn('gender', function ($query) {
            //     if ($query->gender == 1) {
            //         return "Male";
            //     }
            //     return "Female";
            // })

            // ->addColumn('passport_number', function ($query) {
            //     if ($query->passport) {
            //         return $query->passport->passport_no;
            //     }
            //     return "";
            // })



             ->addColumn('house_name', function ($query) {
                
                    $ll = Auth::user()->id;

                    if ($query->llord == $ll) 
                        return $query->m_house;
                    else
                   return  "-";


              })
             

             ->addColumn('flat_number', function ($query) {
                
                    $ll = Auth::user()->id;

                    if ($query->llord == $ll) 
                        return $query->flat_number;
                    else
                   return  "-";
            
                    //       ->join('flats', 'monthly_totals.mt_flat_id', '=', 'flats.f_id')
                    //       ->leftJoin('renters', 'monthly_totals.mt_renter_id', '=', 'renters.r_id')        
                    //       ->where('mt_flat_id', '=', 7)
                    //       ->get('f_number');
                        

                    // return $query;
                                     
  
               
            })


             ->addColumn('renter_name', function ($query) {
                
                   $ll = Auth::user()->id;

                   if ($query->llord == $ll)
                   return $query->renter_name; 
                  else
                    return  "-";
                      // return $query; 
               
            })

             ->addColumn('month_of_rent', function ($query) {
                
                    $ll = Auth::user()->id;

                    if ($query->llord == $ll)
                    return $query->mt_date; 
                    else
                     return  "-";
                // return $query; 
            })

            ->addColumn('total_amount', function ($query) {
                
                    $ll = Auth::user()->id;

                    if ($query->llord == $ll)
                    return $query->total_money;
                    else
                     return  "-";  
               
            })

             
             ->addColumn('payment_date', function ($query) {
                
                    $ll = Auth::user()->id;
                     
                     if ($query->llord == $ll)
                    return $query->payment_date;
                    else
                     return  "-";  
               
            })


             ->addColumn('payment_status', function ($query) {
                
                    $ll = Auth::user()->id;
                     
                     if ($query->llord == $ll)
                    return $query->payment_status;
                    else
                     return  "-";  
               
            })

            // ->filterColumn('full_name', function ($query, $keyword) {
            //     $query->whereRaw("CONCAT(IFNULL(given_name, ''), ' ', IFNULL(sur_name, '')) like ?", "%{$keyword}%");
            // })
            // ->orderColumn('full_name', 'given_name $1')
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Monthly_total $model) {
        $model = $model->newQuery();
        // $model->with(['passport' => function ($q) {
        //     if (isset($this->data['passport_no'])) {
        //         $q->where('passport_no', 'like', '%' . $this->data['passport_no'] . '%');
        //     }
        // }]);

        if ($this->request()->get('m_house')) 
        {
            $model->where('m_house', $this->request()->get('m_house'));
        }


        if ($this->request()->get('flat_number')) 
        {
            $model->where('flat_number', $this->request()->get('flat_number'));
        }
   

       if ($this->request()->get('renter_name')) {
            $model->where('renter_name', $this->request()->get('renter_name'));
        }

        if ($this->request()->get('mt_date')) {
            $model->where('mt_date', $this->request()->get('mt_date'));
        }

        if ($this->request()->get('total_amount')) {
            $model->where('total_money', $this->request()->get('total_amount'));
        }

        if ($this->request()->get('payment_date')) {
            $model->where('payment_date', $this->request()->get('payment_date'));
        }

        if ($this->request()->get('payment_status')) {
            $model->where('payment_status', $this->request()->get('payment_status'));
        }



        // Making Query

        // if (isset($this->data['full_name'])) {
        //     $model->where(DB::raw("CONCAT(IFNULL(given_name, ''), ' ', IFNULL(sur_name, ''))"), 'like', '%' . $this->data['full_name'] . '%');
        // }

         if (isset($this->data['m_house'])) {
            $model->where('m_house', 'like', $this->data['m_house'] . '%');
        }

        if (isset($this->data['flat_number'])) {
            $model->where('flat_number', 'like', $this->data['flat_number'] . '%');
        }


        if (isset($this->data['renter_name'])) {
            $model->where('renter_name', 'like', $this->data['renter_name'] . '%');
        }

        if (isset($this->data['mt_date'])) {
            $model->where('mt_date', 'like', $this->data['mt_date'] . '%');
        }


         if (isset($this->data['payment_status'])) {
            $model->where('payment_status', 'like', '%' . $this->data['payment_status'] . '%');
        }

        // if (isset($this->data['passport_no'])) {
        //     $model->whereHas('passport', function ($q) {
        //         $q->where('passport_no', 'like', '%' . $this->data['passport_no'] . '%');
        //     });
        // }
       
        // End Of Making Query
         return $this->applyScopes($model);
//        return $model;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        $search = "Search: "; // We can also use variables; This is for instruction purpose only
        $page_length = 10; // We can make it dynamic dependent on User
        $row_text = " Rows";
        $need_input_columns = "[0,1]"; // We have to make the array as string to pass it because of array is is needed as string
        $builder = $this->builder();

        $filterData = [];
        if (isset($this->data['m_house'])) {
            $filterData['m_house'] = $this->data['m_house'];
        }

        if (isset($this->data['flat_number'])) {
            $filterData['flat_number'] = $this->data['flat_number'];
        }
        if (isset($this->data['renter_name'])) {
            $filterData['renter_name'] = $this->data['renter_name'];
        }
        if (isset($this->data['mt_date'])) {
            $filterData['mt_date'] = $this->data['mt_date'];
        }
        if (isset($this->data['payment_status'])) {
            $filterData['payment_status'] = $this->data['payment_status'];
        }
        $builder->postAjax([
            'url' => route('total-report.index'),
            'data' => $filterData,
        ]);
        $searchData = json_encode($filterData);
        return $builder
            ->setTableId('total-report-table')
            ->columns($this->getColumns())
            ->dom("Bfltr<'row'<'col-sm-12'tr>> <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>")
            ->orderBy(0, "ASC")
            ->parameters(array(
                'processing' => 'Please wait...',
                'searchDelay' => 500,
                'language' => array(
                    'lengthMenu' => '_MENU_ records',
                    'search' => $search,
                    'info' => 'Showing _START_ to _END_ of _TOTAL_ records',
                ),
                'lengthMenu' => array(
                    array(5, 10, 25, 50, 100, -1),
                    array('5' . $row_text, '10' . $row_text, '25' . $row_text, '50' . $row_text, '100' . $row_text, 'Show all')
                ),
                'pagingType' => "full_numbers",
                'pageLength' => $page_length,
                'createdRow' => "function (row, data, dataIndex ) {
                    $(row).attr('id', 'tr-' + data.id);
                }",
                'searchPlaceholder' => "Search...",
                'initComplete' => "function (settings, json) {
                    var DT = this.api();
                    var searchData = $searchData;
                    for (const property in searchData) {
                        $('input[name=\"'+property+'\"]').val(searchData[property]);
                    }
                    if(Object.keys(searchData).length > 0) {
                        $('#customer_report_filter').removeClass('kt-portlet--collapsed');
                    } else {
                        $('#customer_report_filter').addClass('kt-portlet--collapsed');
                    }
                    /*this.api().columns($need_input_columns).every(function (colIdx) {
                        var column = this;
                        var title = $('tfoot').find('th').eq(colIdx).text();
                        console.log($(column.footer()).empty());
                        var input = document.createElement('input');
                        // input.setAttribute('type', 'text');
                        input.placeholder = title;
                        $(input).appendTo($(column.footer()).empty())
                        .on('change keyup clear', function () {
                             column.search($(this).val(), false, false,true).draw();
                        });
                    });*/
                    afterTableInitialization(settings, json);
                    customSearchAjax(settings, json, $('#total-report-form'));
                }",
                'preDrawCallback' => "function(){
                    $('#customer-report-table_processing').remove();
                }",
            ));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [

            

            Column::make('house_name')->footer(makeLabel('house_name')),
            Column::make('flat_number')->footer(makeLabel('flat_number')),
            Column::make('renter_name')->footer(makeLabel('renter_name')),
            Column::make('month_of_rent')->footer(makeLabel('month_of_rent')),
            Column::make('total_amount')->footer(makeLabel('total_amount')),
            Column::make('payment_date')->footer(makeLabel('payment_date')),
            Column::make('payment_status')->footer(makeLabel('payment_status')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Total_report_' . date('YmdHis');
    }

    public function setData($dataArray) {
        $this->data = $dataArray;
        return $this;
    }
}
