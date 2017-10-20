<?php

namespace App\Admin\Controllers;

use App\Practitioner;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

class PractitionerController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        $user_data_exist = DB::select('SELECT id FROM practitioners WHERE admin_users_id = ?', [Admin::user()->id]);
        if ($user_data_exist) {
            return redirect('admin/practitioner/' . Admin::user()->id . '/edit');
        } else {
            return redirect('admin/practitioner/create');
        }
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Practitioner::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form(Practitioner::class, function (Form $form) {

            $user_profile = DB::select('SELECT prefecture_id,district_id,station_id,st_line_id,pr_text,belong_to,business_hour,regular_holiday,experience_years,credit_card,parking,gender,notes FROM practitioners WHERE id = ?', [Admin::user()->id]);

            $form->hidden('admin_users_id')->default(Admin::user()->id);
            $form->select('prefecture_id', '都道府県')->options(function() use ($user_profile) {
                // default value setting
                if (!empty($user_profile[0]->prefecture_id)) {
                    $result[$user_profile[0]->prefecture_id] = '';
                }

                $prefectures = DB::select('select code,name from prefectures');
                foreach ($prefectures as $prefecture) {
                    $result[$prefecture->code] = $prefecture->name;
                }
                return $result;
            });

            $form->select('district_id', '市区町村')->options(function () use ($user_profile) {
                // default value setting
                if (!empty($user_profile[0]->district_id)) {
                    $result[$user_profile[0]->district_id] = '';
                }

                $districts = DB::select('SELECT code,name FROM districts');
                foreach ($districts as $district) {
                    $result[$district->code] = $district->name;
                }
                return $result;
            })->default(['val' => 'test']);

            $form->select('station_id', '最寄り駅')->options(function () use ($user_profile) {
                // default value setting
                if (!empty($user_profile[0]->station_id)) {
                    $result[$user_profile[0]->station_id] = '';
                }

                $stations = DB::select('SELECT station_cd,station_name FROM stations');
                foreach ($stations as $station) {
                    $result[$station->station_cd] = $station->station_name;
                }
                return $result;
            });

            $form->select('st_line_id', '最寄り駅の路線')->options(function () use ($user_profile) {
                // default value setting
                if (!empty($user_profile[0]->st_line_id)) {
                    $result[$user_profile[0]->st_line_id] = '';
                }

                $st_lines = DB::select('SELECT line_cd,line_name FROM st_lines');
                foreach ($st_lines as $line) {
                    $result[$line->line_cd] = $line->line_name;
                }
                return $result;
            });

            $form->textarea('pr_text', '自己PR')->placeholder('例）プロモーションです')->default($user_profile[0]->pr_text);
            $form->text('belong_to', '所属（サロンなど）')->placeholder('サロン名があればご入力ください')->default($user_profile[0]->belong_to);
            $form->text('business_hour', '営業時間')->placeholder('例）10:00~18:00')->default($user_profile[0]->business_hour);
            $form->text('regular_holiday', '定休日')->placeholder('例）水曜日')->default($user_profile[0]->regular_holiday);
            $form->text('experience_years', '経験年数')->placeholder('例）3年')->default($user_profile[0]->experience_years);
            $form->radio('credit_card', 'クレジットカード対応')->options(['1' => '可', '0'=> '非対応'])->default($user_profile[0]->credit_card);
            $form->radio('parking', '駐車場')->options(['2' => '近隣にコインパーキング', '1' => 'あり', '0'=> '無し'])->default($user_profile[0]->parking);
            $form->radio('gender', '性別')->options(['f' => '女性', 'm' => '男性', 'g' => 'ゲイ', 'l' => 'レズビアン', 'b' => 'バイセクシャル', 'mf' => 'MTF', 'fm' => 'FTM', 'p' => 'パンセクシャル', 'o' => 'その他'])->default($user_profile[0]->gender);
            $form->textarea('notes', '備考')->placeholder('補足内容をご入力ください')->default($user_profile[0]->notes);

            $form->setAction('practitioner');
        });
    }

    /**
     * Make districts from prefecture
     *
     * @return array
     */
    protected function get_districts(Request $request, $prefecture_id = '')
    {

        // foreach (Practitioner::find($request->get('prefecture_id')) as $value) {
        //     $value->districts = $request->get('action');
        //     echo $value->districts;
        // }

        // $districts = DB::select('SELECT code,name FROM districts WHERE prefectures_id = ?', [$prefecture_id]);
        // foreach ($districts as $district) {
        //     $result[$district->code] = $district->name;
        // }
        // return $result;
    }
}
