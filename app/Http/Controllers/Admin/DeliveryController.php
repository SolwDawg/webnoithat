<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Feeship;
    use Illuminate\Http\Request;
    use App\Models\City;
    use App\Models\Province;
    use App\Models\Wards;
    use Yajra\DataTables\DataTables;

    class DeliveryController extends Controller
    {
        public function index(Request $request)
        {
           if ($request->ajax()) {
               $data = Feeship::latest()->get();

               return DataTables::of($data)->addIndexColumn()->make(true);
           }
        }

        public function create(Request $request)
        {
            $city = City::orderBy('matp', 'ASC')->get();
            return view('admin.delivery.create', compact('city'));
        }

        public function select_delivery(Request $request)
        {
            $data = $request->all();
            if ($data['action']) {
                $output = '';
                if ($data['action'] == 'city') {
                    $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                    $output .= '<option>--Choose Province---</option>';
                    foreach ($select_province as $key => $province) {
                        $output .= '<option value="'.$province->maqh.'">'.$province->name_province.'</option>';
                    }
                } else {
                    $select_wards = Wards::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                    $output .= '<option>--Choose Wards---</option>';
                    foreach ($select_wards as $key => $wards) {
                        $output .= '<option value="'.$wards->xaid.'">'.$wards->name_wards.'</option>';
                    }
                }
            }
            echo $output;
        }

        public function store(Request $request)
        {
            $feeship = new Feeship();

            $feeship->fee_city = $request['city'];
            $feeship->fee_province = $request['province'];
            $feeship->fee_wards = $request['wards'];
            $feeship->fee_feeship = $request['fee_ship'];
            $feeship->save();

            return redirect()->route('admin.delivery.index')->with('message', 'Fee ship Added Successfully');
        }
    }
