<?php

namespace App\Http\Controllers\BackEndCon\Reports;

use App\Renter;
use App\Flat;
use App\Renter_flat;
use App\Monthly_total;
use App\DataTables\Reports\TotalsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TotalReportController extends Controller
{
    private $controllerInfo;

    public function __construct()
    {
        $this->controllerInfo = (object) array(
            'title' => 'Monthly Total Report',
            'actionButtons' => true,
            'routeNamePrefix' => 'monthly-total-report',
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param CustomersDataTable $customers
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(TotalsDataTable $renters, Request $request)
    {
        $controllerInfo = $this->controllerInfo;

        $ll = Auth::user()->id;
        $pps = Monthly_total::where('llord','=',$ll)->get();

          // dd($pps); 

        return $renters->setData($request->input())->render('Admin.reports.total-report.index-dt',['pps'=>$pps], compact('controllerInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomersDataTable $customers
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TotalsDataTable $renters, Request $request)
    {
        $controllerInfo = $this->controllerInfo;
        return $renters->setData($request->input())->render('Admin.reports.total-report.index-dt', compact('controllerInfo'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = Monthly_total::find($id)->delete();
        if ($delete) {
            return response()->json(['success' => true, 'message' => $this->controllerInfo->title . ' Deleted Successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Whoops! ' . $this->controllerInfo->title . ' Not Deleted'], 200);
        }
    }
}
