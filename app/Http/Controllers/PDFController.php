<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\Leave;
use App\Models\General_form;
use App\Models\Certificate;
use App\Models\Sufferer;

use PDF;

class PDFController extends Controller
{
    public function leave($id)
    {
        $leave = Leave::JOIN('staffs', 'leave.staff_id', 'staffs.staff_id')
            ->where('leave_id', $id)->first();
        $leave->leave_date_start = $this->date_($leave->leave_date_start);
        $leave->leave_date_end = $this->date_($leave->leave_date_end);
        $pdf = PDF::LoadView('/PDF/leave', ['leave' => $leave]);
        // dd($pdf);
        return @$pdf->stream();

        // $data['leave'] = $leave = Leave::JOIN('staffs', 'leave.staff_id', 'staffs.staff_id')
        // ->where('leave_id', $id)->first();
        // return view('/PDF/leave',$data);

    }

    public function date_($date_data)
    {
        $this_d = date('d', strtotime($date_data));
        $this_m = date('n', strtotime($date_data));
        $this_Y = date('Y', strtotime($date_data));

        $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

        $nMonth = $this_m - 1;
        $year = $this_Y + 543;

        // echo ("วันนี้เป็นวัน  $TH_Day[$nDay]  ที่  $date  เดือน  $TH_Month[$nMonth]  ปี พ.ศ.  $year");
        // echo $date_data;
        // dd("วันที่  $this_d  เดือน  $TH_Month[$nMonth] พ.ศ. $year");
        return "วันที่  $this_d  เดือน  $TH_Month[$nMonth] พ.ศ. $year";
    }

    // general
    public function general($id)
    {

        $general = General_form::JOIN('provinces', 'general_form.province', 'provinces.province_id')
        ->JOIN('districts', 'general_form.district', 'districts.district_id')
        ->JOIN('subdistricts', 'general_form.sub_district', 'subdistricts.subdistrict_id')
        ->where('general_id', $id)->first();

        // $general = General_form::where('general_id', $id)->first();
        $general->general_date = $this->date_($general->general_date);
        $pdf = PDF::LoadView('/PDF/general', ['general' => $general]);
        return @$pdf->stream();

        // $data['general'] = General_form::where('general_id', $id)->first();
        // // dd($data);
        // return view('/PDF/general',$data);
    }

    // certificate requsest
    public function certificate_request($id)
    {
        // $certificate = Certificate::where('guaranty_id', $id)->first();
        // // $general->general_date = $this->date_($general->general_date);
        // $pdf = PDF::LoadView('/PDF/certificate_request', ['certificate' => $certificate]);
        // return @$pdf->stream();

        $data['certificate'] = Certificate::where('guaranty_id', $id)->first();
        // dd($data);
        return view('/PDF/certificate_request',$data);

    }

    // certificate
    public function certificate($id)
    {
        $sufferer = Sufferer::JOIN('provinces', 'sufferer_request_form.province', 'provinces.province_id')
        ->JOIN('districts', 'sufferer_request_form.district', 'districts.district_id')
        ->JOIN('subdistricts', 'sufferer_request_form.subdistrict', 'subdistricts.subdistrict_id')
        ->JOIN('risks' , 'sufferer_request_form.risk_id' , 'risks.risk_id')
        ->where('sufferer_id', $id)->first();

        $date = Sufferer::JOIN('provinces', 'sufferer_request_form.home_province', 'provinces.province_id')
        ->JOIN('districts', 'sufferer_request_form.home_district', 'districts.district_id')
        ->JOIN('subdistricts', 'sufferer_request_form.home_subdistrict', 'subdistricts.subdistrict_id')
        ->where('sufferer_id', $id)->first();

        // $sufferer = Sufferer::where('sufferer_id', $id)->first();
        $sufferer->sufferer_date = $this->date_($sufferer->sufferer_date);
        $sufferer->sufferer_user_birte = $this->date_($sufferer->sufferer_user_birte);
        $sufferer->sufferer_start_date = $this->date_($sufferer->sufferer_start_date);
        $pdf = PDF::LoadView('/PDF/certificate', ['sufferer' => $sufferer, 'date'=>$date]);
        return @$pdf->stream();

        // $data['sufferer'] = $sufferer;
        // $data['date'] = $date;

        // return view('/PDF/certificate', $data);
    }
}
