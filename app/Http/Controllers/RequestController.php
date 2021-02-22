<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Disaster_Report;
use App\Models\District;
use App\Models\General_form;
use App\Models\Province;
use App\Models\Risk;
use App\Models\Subdistrict;
use App\Models\Sufferer;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //general requst index
    public function general_request_index()
    {
        $data['page'] = '/request';
        $data['form'] = General_form::get();
        return view('/request/general_request', $data);
    }

    // create online general requst
    public function general_request()
    {
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();

        return view('/request/general_request_insert_online', $data);
    }

    // create general
    public function general_request_insert()
    {
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();

        $data['page'] = '/request';
        return view('/request/general_request_insert', $data);
    }

    // insert general online
    public function insert_genral(Request $request)
    {
        // dd($request);
        $table = [
            'write_at' => $request->write_at,
            'general_date' => $request->general_date,
            'general_title' => $request->general_title,
            'mention' => $request->mention,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'home_num' => $request->home_num,
            'moo' => $request->moo,
            'moo_num' => $request->moo_num,
            'road' => $request->road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'tel' => $request->tel,
            'wish' => $request->wish,
            'sign' => $request->sign,
            'position' => $request->position,
        ];

        General_form::insert($table);
        return redirect('/download/fill');
    }

    // insert general
    public function insert_genral2(Request $request)
    {
        // dd($request);
        $table = [
            'write_at' => $request->write_at,
            'general_date' => $request->general_date,
            'general_title' => $request->general_title,
            'mention' => $request->mention,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'home_num' => $request->home_num,
            'moo' => $request->moo,
            'moo_num' => $request->moo_num,
            'road' => $request->road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'tel' => $request->tel,
            'wish' => $request->wish,
            'sign' => $request->sign,
            'position' => $request->position,
        ];

        General_form::insert($table);
        return redirect('/request/general_request');
    }

    // edit general
    public function edit_general($id)
    {
        $data['page'] = '/request';
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();

        $data['request'] = General_form::where('general_id', $id)->first();
        return view('/request/general_request_edit', $data);
    }

    //update general
    public function update_general(Request $request, $id)
    {
        // dd($request);
        $table = [
            'write_at' => $request->write_at,
            'general_date' => $request->general_date,
            'general_title' => $request->general_title,
            'mention' => $request->mention,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'home_num' => $request->home_num,
            'moo' => $request->moo,
            'moo_num' => $request->moo_num,
            'road' => $request->road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'tel' => $request->tel,
            'wish' => $request->wish,
            'sign' => $request->sign,
            'position' => $request->position,
        ];

        General_form::where('general_id', $id)->update($table);
        return redirect('/request/general_request');

    }

    //delete general
    public function destroy_genral($id)
    {
        General_form::find($id)->delete();
        return redirect('/request/general_request');
    }

    //create cetificate request online
    public function certificate_request_online()
    {
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();
        return view('/request/certificate_request_insert_online', $data);
    }

    //insert cetificate online
    public function insert_certificate_request_online(Request $request)
    {
        // dd($request);
        $table = [
            'write_at' => $request->write_at,
            'guaranty_to_date' => $request->guaranty_to_date,
            // 'general_title' => $request->general_title,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'home_num' => $request->home_num,
            'home_soil' => $request->home_soil,
            'home_road' => $request->home_road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'position' => $request->position,
            'position_text' => $request->position_text,
            'position_text2' => $request->position_text2,
            'risk_id' => $request->risk_id,
            'risk_name' => $request->risk_name,
            'guaranty_event_date' => $request->guaranty_event_date,
            'guaranty_event_time' => $request->guaranty_event_time,
            'risk_detail1' => $request->risk_detail1,
            'risk_detail2' => $request->risk_detail2,
            'risk_detail3' => $request->risk_detail3,
            'request_at' => $request->request_at,
            'evidence' => $request->evidence,
            'status' => $request->status,
            'person' => $request->person,
            'natural_person1' => $request->natural_person1,
            'natural_person2' => $request->natural_person2,
            'natural_person3' => $request->natural_person3,
            'natural_person_text' => $request->natural_person_text,
            'juristic_person1' => $request->juristic_person1,
            'juristic_person2' => $request->juristic_person2,
            'juristic_person3' => $request->juristic_person3,
            'juristic_person4' => $request->juristic_person4,
            'juristic_text' => $request->juristic_text,
            'evidence_in' => $request->evidence_in,
            'authorize' => $request->authorize,
            'witnesses' => $request->witnesses,
            'other' => $request->other,
            'other_text' => $request->other_text,
            'total' => $request->total,
            'name_confirm' => $request->name_confirm,
        ];
        // dd($table);

        Certificate::insert($table);
        return redirect('/download/fill');

    }

    //certificate requst index
    public function certificate_request_index()
    {
        $data['page'] = '/certificate_request';
        $data['form'] = Certificate::get();
        // dd($data);
        return view('/request/certificate_request', $data);
    }

    //create certificate
    public function certificate_request_insert()
    {
        $data['page'] = '/certificate';
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();

        return view('/request/certificate_request_insert', $data);
    }
    //insert certificate
    public function insert_certificate_request(Request $request)
    {
        // dd($request);
        $table = [
            'write_at' => $request->write_at,
            'guaranty_to_date' => $request->guaranty_to_date,
            // 'general_title' => $request->general_title,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'home_num' => $request->home_num,
            'home_soil' => $request->home_soil,
            'home_road' => $request->home_road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'position' => $request->position,
            'position_text' => $request->position_text,
            'position_text2' => $request->position_text2,
            'risk_id' => $request->risk_id,
            'risk_name' => $request->risk_name,
            'guaranty_event_date' => $request->guaranty_event_date,
            'guaranty_event_time' => $request->guaranty_event_time,
            'risk_detail1' => $request->risk_detail1,
            'risk_detail2' => $request->risk_detail2,
            'risk_detail3' => $request->risk_detail3,
            'request_at' => $request->request_at,
            'evidence' => $request->evidence,
            'status' => $request->status,
            'person' => $request->person,
            'natural_person1' => $request->natural_person1,
            'natural_person2' => $request->natural_person2,
            'natural_person3' => $request->natural_person3,
            'natural_person_text' => $request->natural_person_text,
            'juristic_person1' => $request->juristic_person1,
            'juristic_person2' => $request->juristic_person2,
            'juristic_person3' => $request->juristic_person3,
            'juristic_person4' => $request->juristic_person4,
            'juristic_text' => $request->juristic_text,
            'evidence_in' => $request->evidence_in,
            'authorize' => $request->authorize,
            'witnesses' => $request->witnesses,
            'other' => $request->other,
            'other_text' => $request->other_text,
            'total' => $request->total,
            'name_confirm' => $request->name_confirm,
        ];
        // dd($table);

        Certificate::insert($table);
        return redirect('/request/certificate_request');

    }

    //edit certificate
    public function certificate_request_edit($id)
    {
        $data['page'] = '/certificate';
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();

        $data['form'] = Certificate::where('guaranty_id', $id)->first();
        // dd($data);
        return view('/request/certificate_request_edit', $data);
    }

    //update certificate
    public function update_certificate_request(Request $request, $id)
    {
        dd($request);
        $table = [
            'write_at' => $request->write_at,
            'guaranty_to_date' => $request->guaranty_to_date,
            // 'general_title' => $request->general_title,
            'user_name' => $request->user_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'home_num' => $request->home_num,
            'home_soil' => $request->home_soil,
            'home_road' => $request->home_road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'position' => $request->position,
            'position_text' => $request->position_text,
            'position_text2' => $request->position_text2,
            'risk_id' => $request->risk_id,
            'risk_name' => $request->risk_name,
            'guaranty_event_date' => $request->guaranty_event_date,
            'guaranty_event_time' => $request->guaranty_event_time,
            'risk_detail1' => $request->risk_detail1,
            'risk_detail2' => $request->risk_detail2,
            'risk_detail3' => $request->risk_detail3,
            'request_at' => $request->request_at,
            'evidence' => $request->evidence,
            'status' => $request->status,
            'person' => $request->person,
            'natural_person1' => $request->natural_person1,
            'natural_person2' => $request->natural_person2,
            'natural_person3' => $request->natural_person3,
            'natural_person_text' => $request->natural_person_text,
            'juristic_person1' => $request->juristic_person1,
            'juristic_person2' => $request->juristic_person2,
            'juristic_person3' => $request->juristic_person3,
            'juristic_person4' => $request->juristic_person4,
            'juristic_text' => $request->juristic_text,
            'evidence_in' => $request->evidence_in,
            'authorize' => $request->authorize,
            'witnesses' => $request->witnesses,
            'other' => $request->other,
            'other_text' => $request->other_text,
            'total' => $request->total,
            'name_confirm' => $request->name_confirm,
        ];
        Certificate::where('guaranty_id', $id)->update($table);
        return redirect('/request/certificate_request');

    }

    //delete certificate
    public function destroy_certificate_request($id)
    {
        Certificate::find($id)->delete();
        return redirect('/request/certificate_request');
    }

    // create certificate online
    public function certificate_create_online()
    {
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();

        return view('request/certificate_insert_online', $data);
    }

    // insert certificate online
    public function certificate_insert_online(Request $request)
    {
        // dd($request);
        $table = [
            'sufferer_date' => $request->sufferer_date,
            'sufferer_no' => $request->sufferer_no,
            'sufferer_gover' => $request->sufferer_gover,
            'sufferer_confirm' => $request->sufferer_confirm,
            'sufferer_user_birte' => $request->sufferer_user_birte,
            'sufferer_userid' => $request->sufferer_userid,
            'sufferer_home_num' => $request->sufferer_home_num,
            'sufferer_home_no' => $request->sufferer_home_no,
            'sufferer_road' => $request->sufferer_road,
            'province' => $request->province,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'zip_code' => $request->zip_code,
            'sufferer_user_tel' => $request->sufferer_user_tel,
            'home_num' => $request->home_num,
            'home_moo' => $request->home_moo,
            'home_road' => $request->home_road,
            'home_province' => $request->home_province,
            'home_district' => $request->home_district,
            'home_subdistrict' => $request->home_subdistrict,
            'home_zipcode' => $request->home_zipcode,
            'home_tel' => $request->home_tel,
            'risk_id' => $request->risk_id,
            'sufferer_loaction' => $request->sufferer_loaction,
            'sufferer_start_date' => $request->sufferer_start_date,
            'sufferer_start_time' => $request->sufferer_start_time,
            'sufferer_user_name' => $request->sufferer_user_name,
            'sufferer_user_position' => $request->sufferer_user_position,
            'sufferer_user_director' => $request->sufferer_user_director,
        ];
        // dd($table);
        Sufferer::insert($table);
        return redirect('/download/fill');
    }

    // certificate index
    public function certificate_index()
    {
        $data['page'] = '/certificate';
        $data['form'] = Sufferer::get();
        return view('/request/certificate', $data);
    }

    // create certificate
    public function certificate_create()
    {
        $data['page'] = '/certificate';

        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();

        return view('request/certificate_insert', $data);
    }

    // insert certificate
    public function certificate_insert(Request $request)
    {
        // dd($request);
        $table = [
            'sufferer_date' => $request->sufferer_date,
            'sufferer_no' => $request->sufferer_no,
            'sufferer_gover' => $request->sufferer_gover,
            'sufferer_confirm' => $request->sufferer_confirm,
            'sufferer_user_birte' => $request->sufferer_user_birte,
            'sufferer_userid' => $request->sufferer_userid,
            'sufferer_home_num' => $request->sufferer_home_num,
            'sufferer_home_no' => $request->sufferer_home_no,
            'sufferer_road' => $request->sufferer_road,
            'province' => $request->province,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'zip_code' => $request->zip_code,
            'sufferer_user_tel' => $request->sufferer_user_tel,
            'home_num' => $request->home_num,
            'home_moo' => $request->home_moo,
            'home_road' => $request->home_road,
            'home_province' => $request->home_province,
            'home_district' => $request->home_district,
            'home_subdistrict' => $request->home_subdistrict,
            'home_zipcode' => $request->home_zipcode,
            'home_tel' => $request->home_tel,
            'risk_id' => $request->risk_id,
            'sufferer_loaction' => $request->sufferer_loaction,
            'sufferer_start_date' => $request->sufferer_start_date,
            'sufferer_start_time' => $request->sufferer_start_time,
            'sufferer_user_name' => $request->sufferer_user_name,
            'sufferer_user_position' => $request->sufferer_user_position,
            'sufferer_user_director' => $request->sufferer_user_director,
        ];
        // dd($table);
        Sufferer::insert($table);
        return redirect('/request/certificate');
    }

    // edit certificate
    public function certificate_edit($id)
    {
        $data['page'] = '/certificate';
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        $data['risk'] = Risk::get();

        $data['form'] = Sufferer::where('sufferer_id', $id)->first();
        return view('/request/certificate_edit', $data);
    }

    // update certificate
    public function certificate_update(Request $request, $id)
    {
        // dd($request);
        $table = [
            'sufferer_date' => $request->sufferer_date,
            'sufferer_no' => $request->sufferer_no,
            'sufferer_gover' => $request->sufferer_gover,
            'sufferer_confirm' => $request->sufferer_confirm,
            'sufferer_user_birte' => $request->sufferer_user_birte,
            'sufferer_userid' => $request->sufferer_userid,
            'sufferer_home_num' => $request->sufferer_home_num,
            'sufferer_home_no' => $request->sufferer_home_no,
            'sufferer_road' => $request->sufferer_road,
            'province' => $request->province,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'zip_code' => $request->zip_code,
            'sufferer_user_tel' => $request->sufferer_user_tel,
            'home_num' => $request->home_num,
            'home_moo' => $request->home_moo,
            'home_road' => $request->home_road,
            'home_province' => $request->home_province,
            'home_district' => $request->home_district,
            'home_subdistrict' => $request->home_subdistrict,
            'home_zipcode' => $request->home_zipcode,
            'home_tel' => $request->home_tel,
            'risk_id' => $request->risk_id,
            'sufferer_loaction' => $request->sufferer_loaction,
            'sufferer_start_date' => $request->sufferer_start_date,
            'sufferer_start_time' => $request->sufferer_start_time,
            'sufferer_user_name' => $request->sufferer_user_name,
            'sufferer_user_position' => $request->sufferer_user_position,
            'sufferer_user_director' => $request->sufferer_user_director,
        ];

        Sufferer::where('sufferer_id', $id)->update($table);
        return redirect('/request/certificate');
    }

    // delete certificate
    public function certificate_delete($id)
    {
        Sufferer::find($id)->delete();
        return redirect('/request/certificate');

    }

    // ems report
    public function ems_report_insert_online()
    {
        return view('/request/ems_report_insert_online');
    }

    // insert ems
    public function insert_ems_online(Request $request)
    {
        // dd($request);

        $table = [
            'disaster_no' => $request->disaster_no,
            'disaster_date' => $request->disaster_date,
            'disaster_date_start' => $request->disaster_date_start,
            'disaster_time_start' => $request->disaster_time_start,
            'disaster_date_end' => $request->disaster_date_end,
            'disaster_time_end' => $request->disaster_time_end,
            'disaster_form' => $request->disaster_form,
            'disaster_to' => $request->disaster_to,
            'disaster_risk' => $request->disaster_risk,
            'disaster_severity' => $request->disaster_severity,
            'disaster_look' => $request->disaster_look,
            'disaster_location' => $request->disaster_location,
            'disaster_people' => $request->disaster_people,
            'disaster_home' => $request->disaster_home,
            'disaster_injured' => $request->disaster_injured,
            'disaster_die' => $request->disaster_die,
            'disaster_lost' => $request->disaster_lost,
            'disaster_migrate' => $request->disaster_migrate,
            'disaster_move' => $request->disaster_move,
            'disaster_home_num' => $request->disaster_home_num,
            'disaster_building' => $request->disaster_building,
            'disaster_factory' => $request->disaster_factory,
            'disaster_temple' => $request->disaster_temple,
            'disaster_gover' => $request->disaster_gover,
            'disaster_damaged' => $request->disaster_damaged,
            'disaster_damage_price' => $request->disaster_damage_price,
            'disaster_plants' => $request->disaster_plants,
            'disaster_field' => $request->disaster_field,
            'disaster_garden' => $request->disaster_garden,
            'disaster_fish' => $request->disaster_fish,
            'disaster_shrimp' => $request->disaster_shrimp,
            'disaster_cow' => $request->disaster_cow,
            'disaster_pig' => $request->disaster_pig,
            'disaster_duck' => $request->disaster_duck,
            'disaster_animal' => $request->disaster_animal,
            'disaster_animal_price' => $request->disaster_animal_price,
            'disaster_road' => $request->disaster_road,
            'disaster_bridge' => $request->disaster_bridge,
            'disaster_bridgehead' => $request->disaster_bridgehead,
            'disaster_weir' => $request->disaster_weir,
            'disaster_other' => $request->disaster_other,
            'disaster_public_price' => $request->disaster_public_price,
            'disaster_total_price' => $request->disaster_total_price,
            'disaster_municipality' => $request->disaster_municipality,
            'disaster_firecar' => $request->disaster_firecar,
            'disaster_watercar' => $request->disaster_watercar,
            'disaster_rescue' => $request->disaster_rescue,
            'disaster_truck' => $request->disaster_truck,
            'disaster_boat' => $request->disaster_boat,
            'disaster_waterpump' => $request->disaster_waterpump,
            'disaster_tool' => $request->disaster_tool,
            'disaster_govern_total' => $request->disaster_govern_total,
            'disaster_private_total' => $request->disaster_private_total,
            'disaster_volunteer' => $request->disaster_volunteer,
            'disaster_government' => $request->disaster_government,
            'disaster_private' => $request->disaster_private,
            'risk_id' => $request->risk_id,
            'user_name' => $request->user_name,
            'user_name_type' => $request->user_name_type,
        ];

        Disaster_Report::insert($table);
        return redirect('/download/fill');

    }

    //ems requst index
    public function ems_repoet()
    {
        $data['page'] = '/ems';
        $data['form'] = Disaster_Report::get();
        // dd($data);
        return view('/request/ems_report', $data);
    }

    //ems create ems
    public function ems_create()
    {
        $data['page'] = '/ems';
        return view('/request/ems_report_create', $data);
    }

}
