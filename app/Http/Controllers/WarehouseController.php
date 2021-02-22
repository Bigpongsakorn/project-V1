<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Borrow_bk;
use App\Models\CategoryWarehouse;
use App\Models\ReturnDevice;
use App\Models\Warehouse;
// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["user_status"] = $this->usertype(); // เช็คว่ามีการ login อยู่หรือไม่
        $data['data'] = Warehouse::all();
        // $data['data'] = CategoryWarehouse::JOIN('equipments', 'category_warehouses.categoryw_id', 'equipments.categoryw_id')->get();
        $data['page'] = "warehouse";
// dd($data);
        return view('warehouse.index', $data);

        // $data = Warehouse::all();
        // return view('warehouse.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data["user_status"] = $this->usertype();
        $data['ware'] = Warehouse::all();
        $data['category'] = CategoryWarehouse::all();
        $data['page'] = 'warehouse';
        // dd($data);
        return view('warehouse.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// dd($request);

        // $request->validate([
        //     'equip_name' => 'required',
        //     'equip_price' => 'required',
        //     'equip_amount' => 'required',
        //     // 'equip_status' => 'required',
        //     'categoryw_id' => 'required',
        //     'equip_type' => 'required',
        //     // 'equip_type2' => $equip_type2 = $request->input('equip_type2'),
        // ]);

        try {
            $table = [
                'equip_name' => $request->equip_name,
                'equip_price' => $request->equip_price,
                'equip_amount' => $request->equip_amount,
                'equip_unit' => $request->equip_unit,
                'equip_type' => $request->equip_type,
                'equip_date' => date('Y-m-d'),
            ];
            // dd($table);
            Warehouse::insert($table);

        } catch (\Throwable $th) {

            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');

        }

// dd($table);

        return redirect('/warehouse/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["user_status"] = $this->usertype();
        $data['data'] = Warehouse::find($id);
        $data['page'] = 'warehouse';
        $data['category'] = CategoryWarehouse::all();
        // dd($data);
        return view('warehouse.edit', $data);

        // $data = Warehouse::find($id);
        // return view('warehouse.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);

        $table = [
            'equip_name' => $request->equip_name,
            'equip_price' => $request->equip_price,
            'equip_amount' => $request->equip_amount,
            'equip_type' => $request->equip_type,
            'equip_unit' => $request->equip_unit,
            'equip_fix' => $request->equip_fix,
        ];
        // dd($table);
        Warehouse::find($id)->update($table);
        return redirect('/warehouse/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Warehouse::find($id)->delete();
        return redirect('/warehouse/index');
    }

    // ส่วนยืม/คืน อุปกรณ์
    // แสดง
    public function borrows()
    {
        $data["user_status"] = $this->usertype();
        $data['wareho'] = Warehouse::all();
        // $data['wareho'] = CategoryWarehouse::JOIN('warehouses', 'category_warehouses.categoryw_id', 'warehouses.categoryw_id')->get();
        $data['page'] = "/warehouse/borrows";
        $data['user_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // dd($data);
        return view('warehouse.borrows', $data);
    }

    // ทำการยืม
    // หน้ากรอกข้อมูล
    public function borrowseqip($id)
    {
        $data["user_status"] = $this->usertype();
        $data['data'] = Warehouse::find($id);
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // dd($id);
        $data['page'] = '/warehouse/borrows';
        return view('warehouse.borrows_eqip', $data);
    }

    // ทำการยืม
    // save เข้าฐานข้อมูล
    public function borrowsadd(Request $request)
    {
        // dd($request);
        $table = [
            'equip_id' => $request->equip_id,
            'staff_id' => $request->staff_id,
            'borrow_amount' => "1",
            'borrow_detail' => $request->borrow_detail,
        ];
        $amount = [
            'equip_id' => $request->equip_id,
            'staff_id' => $request->staff_id,
            'borrow_amount' => $request->borrow_amount,
            'borrow_detail' => $request->borrow_detail,
            'borrow_date' => date('Y-m-d'),
        ];
        // dd($table);
        // dd($amount);

        //เก็บhistoryของอุปกรณ์
        Borrow::create($amount);

        $old = Warehouse::where('equip_id', $request->equip_id)->first(); // เรียกข้อมูล SQL Where

        if ($old->equip_amount >= 0 && $old->equip_amount >= $request->borrow_amount) {

            $new = $old->equip_amount - $request->borrow_amount; // ทำการลบข้อมูลใน amount จาก wherehouse

            $table2 = [
                'equip_amount' => $new,
            ];

            // Update ข้อมูลใน warehouse
            Warehouse::where('equip_id', $request->equip_id)->update($table2);
// dd($old->equip_type);
            if ($old->equip_type != '2') {

                $borrow_amount = $request->borrow_amount;
                for ($i = 0; $i < $borrow_amount; $i++) {
                    Borrow_bk::create($table);
                }
                
            } 
return redirect('/warehouse/borrows');
        } else {

            return redirect()->back()->with('alert', 'ของไม่พอ!');
        }
    }

    // Show ขอมูลของคนที่ยืมอุปกรณ์
    public function show_borrows($id)
    {
        // dd($id);

        $data["user_status"] = $this->usertype();
        $data['page'] = '/warehouse/borrows';

        $data['borrow'] = Borrow_bk::where('equip_id', $id)->get();
        $data['warehouse'] = Warehouse::find($id);

        $data['sum'] = Borrow_bk::select('*', 'borrow_bks.created_at')
        ->selectRaw('sum(borrow_bks.borrow_amount)as amount')
        ->JOIN('staffs', 'borrow_bks.staff_id', 'staffs.staff_id')
        ->where('equip_id', $id)->groupBy('borrow_bks.staff_id')->get();

        // dd( $data);

        return view('warehouse.show_borrows', $data);

        // return view('warehouse.show_borrows', compact(['eq_id']));

    }

    // หน้าคืน อุปกรณ์
    public function showreturn($id)
    {
        $data['user_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['warehouse_id'] = Warehouse::find($id);
        $data['borrow_id'] = Borrow::JOIN('users', 'borrows.user_id', 'users.user_id')->where('borrows.equip_id', $id)->where('borrows.user_id', $data)->get();

        $data['sql'] = Borrow::selectRaw('sum(borrows.borrow_amount)as amount')->where('borrows.equip_id', $id)->where('borrows.user_id', $data)->first();

        $data['page'] = '/warehouse/borrows';

        // echo $sql;
        // dd($data);
        return view('warehouse.return', $data);
    }

    // คืน
    // save ลงฐานข้อมูล
    public function savereturn(Request $request, $id)
    {
        // dd($request);

        $table = [
            // 'borrow_id' => $request->borrow_id,
            'staff_id' => $request->staff_id,
            'equip_id' => $request->equip_id,
            'equip_amount' => $request->equip_amount,
        ];

        $old = Warehouse::where('equip_id', $request->equip_id)->first(); // เรียกข้อมูล SQL Where
        // $old2 = Borrow::where('eqip_id',)->first();
        // dd($old);
        // echo $old->equip_amount;
        // echo "<br>";
        // echo $request->equip_amount;

        if ($request->equip_amount > 0) {

            $total = $request->equip_amount + $old->equip_amount;
            // echo $old->equip_amount . "<br>";
            $total2 = [
                'equip_amount' => $total,
            ];

            // ไปอัพเดตข้อมูลใน Warehouse เพิ่มข้อมูลในส่วนของอุปกรณ์ที่ได้คืน
            Warehouse::where('equip_id', $request->equip_id)->update($total2);

            $f_amount = $request->equip_amount;

            // echo "f_amount => $f_amount <br>";

            $Borrow = Borrow_bk::where('equip_id', $request->equip_id)->where('staff_id', $request->staff_id)->get();
            $Borrow2 = Borrow_bk::where('equip_id', $request->equip_id)->where('staff_id', $request->staff_id)->first();

            // echo $Borrow2->borrow_detail;
            // dd($Borrow);
            $table2 = [
                'staff_id' => $request->staff_id,
                'equip_id' => $request->equip_id,
                'return_amount' => $request->equip_amount,
                'return_detail' => $Borrow2->borrow_detail,
                'return_date' => date('Y-m-d'),
            ];
            // dd($table2);
            ReturnDevice::insert($table2);

            // echo $Borrow;

            foreach ($Borrow as $key => $value) {
                if ($value['borrow_amount'] <= $f_amount && $f_amount > 0) {
                    Borrow_bk::where('equip_id', $request->equip_id)->where('staff_id', $request->staff_id)->where('borrow_id', $value['borrow_id'])->delete();
                    $f_amount = $f_amount - $value['borrow_amount'];
                    // echo "<br>ลบ";
                }
            }
            // dd($Borrow);

            // echo "Borrow::where(equip_id,$request->equip_id)->where(user_id,$request->user_id)->where(borrow_id,$value[borrow_id])->delete() ";
            // echo "<br>";
            // echo "$f_amount=$f_amount-$value[borrow_amonut]";

            return redirect('/warehouse/borrows');

        } else {

            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');

        }
    }

    // คืน
    // save ลงฐานข้อมูล
    // public function savereturn2(Request $request)
    // {
    //     // dd($request);
    //     $id = Auth::user()->user_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
    //     $table = [
    //         'user_id' => $id,
    //         'equip_id' => $request->equip_id,
    //         'equip_amount' => $request->equip_amount,
    //     ];
    //     $old = Warehouse::where('equip_id', $request->equip_id)->first(); // เรียกข้อมูล SQL Where
    //     if ($request->equip_amount > 0) {
    //         $total = $request->equip_amount + $old->equip_amount;
    //         $total2 = [
    //             'equip_amount' => $total,
    //         ];
    //         // ไปอัพเดตข้อมูลใน Warehouse เพิ่มข้อมูลในส่วนของอุปกรณ์ที่ได้คืน
    //         Warehouse::where('equip_id', $request->equip_id)->update($total2);
    //         $f_amount = $request->equip_amount;
    //         $Borrow = Borrow::where('equip_id', $request->equip_id)->where('user_id', $id)->get();
    //         foreach ($Borrow as $key => $value) {
    //             if ($value['borrow_amount'] <= $f_amount && $f_amount > 0) {
    //                 Borrow::where('equip_id', $request->equip_id)->where('user_id', $id)->where('borrow_id', $value['borrow_id'])->delete();
    //                 $f_amount = $f_amount - $value['borrow_amount'];
    //             }
    //         }
    //         return 1;
    //     } else {
    //         return 0;
    //     }
    // }

    //histoy
    public function histoy($id)
    {

        $data['page'] = "/warehouse/borrows";
        // $data['borrow'] = Borrow_bk::where('equip_id', $id)->get();

        $data['warehouse'] = Warehouse::find($id);

        // $data['user'] = Borrow_bk::JOIN('users','borrow_bks.user_id','users.user_id')->get();
        //เก็บข้อมูลยืมทั้งหมด
        $data['borrow'] = Borrow::select('borrows.created_at', 'borrows.borrow_detail', 'borrows.borrow_amount', 'borrows.staff_id', 'staffs.staff_fname', 'staffs.staff_lname', 'staffs.staff_position', 'borrows.borrow_date','equipments.equip_unit')
            ->JOIN('staffs', 'borrows.staff_id', 'staffs.staff_id')
            ->JOIN('equipments','borrows.equip_id','equipments.equip_id')
            ->where('borrows.equip_id', $id)->get();

        $data['return'] = ReturnDevice::select('return.return_date', 'return.return_detail', 'return.return_amount', 'return.staff_id', 'staffs.staff_fname', 'staffs.staff_lname', 'staffs.staff_position','equipments.equip_unit')
            ->JOIN('staffs', 'return.staff_id', 'staffs.staff_id')
            ->JOIN('equipments','return.equip_id','equipments.equip_id')
            ->where('return.equip_id', $id)->get();

        // dd($data);
        return view('warehouse.histoy_borrows', $data);
    }

    //category
    public function categoryindex()
    {
        $data['page'] = "/warehouse/category";
        $data['category'] = CategoryWarehouse::all();

        // dd($data);

        return view('warehouse.category', $data);
    }

    //category create
    public function categorycreate()
    {
        $data['page'] = "/warehouse/category";

        return view('warehouse.create_category', $data);
    }

    //insert category
    public function insertcategory(Request $request)
    {
        // dd($request);
        $table = [
            'categoryw_name' => $request->categoryw_name,
        ];

        CategoryWarehouse::create($request->all());

        return redirect('warehouse/category');
    }

    //edit category
    public function editcategory($id)
    {
        $data['page'] = "/warehouse/category";
        $data['category'] = CategoryWarehouse::find($id);

        // dd($data);

        return view('warehouse.edit_category', $data);
    }

    //update category
    public function updatecategory(Request $request, $id)
    {
        // dd($request);
        $table = [
            'categoryw_name' => $request->categoryw_name,
        ];

        CategoryWarehouse::find($id)->update($request->all());

        return redirect('warehouse/category');
    }

    // delete category
    public function deletecategory($id)
    {
        CategoryWarehouse::find($id)->delete();
        return redirect('/warehouse/category');

    }

    //return
    public function returnindex()
    {
        return view('warehouse.return_index');
    }

}
