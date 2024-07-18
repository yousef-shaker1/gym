<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\day;
use App\Models\Team;
use App\Models\time;
use App\Models\User;
use App\Models\Order;
use App\Models\photo;
use App\Models\Message;
use App\Models\Section;
use App\Models\Customer;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\checkcustomer;
use Fx3costa\LaravelChartJs\ChartJs;
use App\Http\Requests\checkcalculate;

class UserpageController extends Controller
{
    public function homepage(){
        $sections = Section::get();
        $teams = Team::get();
        $photos = photo::get();
        return view('user.index', compact('sections', 'teams', 'photos'));
    }
    
    public function aboutus(){
        $teams = Team::get();
        $messages = Message::get();
        return view('user.aboutus', compact('teams', 'messages'));
    }

    public function class_details(){
        $sections = Section::get();
        $days = day::get();
        $times = time::with('section', 'day')->orderBy('time')->get();
        $caption = Team::get();
        return view('user.class_details', compact('sections', 'days', 'times', 'caption'));
    }

    public function services(){
        $sections = Section::get();
        return view('user.services', compact('sections'));
    }

    public function team(){
        $teams = Team::get();
        return view('user.team',compact('teams'));
    }


    public function calculator(){
        return view('user.calculator');
    }

    public function blog(){
        $sections = Section::get();
        return view('user.blog', compact('sections'));
    }

    public function contact(){
        return view('user.contact');
    }

    public function show_user(){
        $customers = Customer::paginate(8);
        return view('admin.show_user', compact('customers'));
    }

    public function delete_customer(checkcustomer $request, $i){
        $customer_id = $request->id;
        $customer = Customer::where('id', $customer_id)->first();
        User::where('email', $customer->email)->delete();
        $customer->delete();
        session()->flash('delete', 'customer deleted success');
        return redirect()->back();
    }

    public function admin_page(){
                // حدد الفترة الزمنية المطلوبة
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $allDays = [];
        $currentDate = $startDate->copy();
        while ($currentDate->lte($endDate)) {
            $allDays[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }
        
        // جلب الطلبات المجمعة من قاعدة البيانات
        $orders = DB::table('orders')
        ->select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as total'))
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();
        
        // تحويل النتائج إلى مصفوفة لسهولة الدمج
        $orderData = $orders->keyBy('day')->toArray();
        
        // دمج النتائج لعرض جميع الأيام
        $labels = [];
        $data = [];
        foreach ($allDays as $day) {
            $labels[] = $day;
            $data[] = isset($orderData[$day]) ? $orderData[$day]->total : 0;
        }
        
        // إعداد الرسم البياني
        $chart = app()->chartjs
            ->name('orderChart')
            ->type('line')
            ->size(['width' => 600, 'height' => 700])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "الطلبات",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $data,
                    'pointRadius' => 0, // إخفاء النقاط
                    'lineTension' => 0.4, // منحنى الخط
                ]
            ])
            ->options([]);
        

    $orderRejected = Order::where('status', 'رفض')->count(); 
    $Acceptorder = Order::where('status', 'قبول')->count(); 
    $chartjs2 = app()->chartjs
    ->name('barChartTest')
    ->type('bar')
    ->size(['width' => 400, 'height' => 300])
    ->labels(['الاوردرات المرفوضة', 'الاوردرات المقبولة'])
    ->datasets([
        [
            "label" => "أحوال الطلبات",
            'backgroundColor' => ['#B22222', '#4169E1'],
            'data' => [$orderRejected, $Acceptorder]
        ]
    ])
    ->options([]);
        return view('admin.index', compact('chartjs2', 'chart'));
    }

    public function bmr(checkcalculate $request)
    {
        $height = $request->input('height');
        $weight = $request->input('weight');
        $age = $request->input('age');
        $sex = $request->input('sex');

    
        if ($sex == 'male') {
            $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } else {
            $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
        }
    
        session()->flash('message', "Your BMR is: $bmr calories/day");
        return redirect()->back();
        
    }


}
