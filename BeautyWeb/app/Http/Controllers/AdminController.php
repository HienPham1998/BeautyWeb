<?php

namespace App\Http\Controllers;
use App\Input;
use Carbon\Carbon;
use App\Bill;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use DateTime;
use DatePeriod;
use DateInterval;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    public function statisticIndex(Request $request){
        $data = collect([]); // Could also be an array
        $labels = collect([]);

        if($request->from_date && $request->to_date) {
            $begin = new DateTime($request->from_date);
            $end = new DateTime($request->to_date);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $full_date = $dt->format("Y-m-d");
                $date = $dt->format("d/m");
                $labels->push($date);
                $data->push(Bill::withTrashed()->whereRaw('date(created_at) = ?', [date($full_date)])->sum("total"));
                // dd($date);
            }
        } else {
            $labels = collect(['Today', 'Week', 'Month']);
            $data->push(Bill::whereDate('created_at', Carbon::today())->sum("total"));
            $data->push(Bill::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum("total"));
            $data->push(Bill::whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])->sum("total"));
        }

        $chart = new SampleChart;
        $chart->labels($labels);
        $chart->dataset('Total Money', 'line', $data);

        return view("admin.statistic", compact("chart"));
    }
    public function billStatistic(Request $request){
        $data = collect([]); // Could also be an array
        $labels = collect([]);

        if($request->from_date && $request->to_date) {
            $begin = new DateTime($request->from_date);
            $end = new DateTime($request->to_date);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $full_date = $dt->format("Y-m-d");
                $date = $dt->format("d/m");
                $labels->push($date);
                $data->push(Bill::withTrashed()->whereRaw('date(created_at) = ?', [date($full_date)])->count());
                // dd($date);
            }
        }
        else {
            $labels = collect(['Today', 'Week', 'Month']);
            $data->push(Bill::whereDate('created_at', Carbon::today())->count());
            $data->push(Bill::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count());
            $data->push(Bill::whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])->count());
        }

        $chart = new SampleChart;
        $chart->labels($labels);
        $chart->dataset('Total bill', 'bar', $data);

        return view("admin.statistic", compact("chart"));
    }
  
}
