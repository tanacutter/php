<?php

namespace App\Admin\Controllers;

use App\PractitionerMenu;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PractitionerMenuController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('メニュー管理');
            $content->description('');

            $content->body($this->grid());
        });
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

            $content->header('メニュー管理');
            $content->description('');

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

            $content->header('メニュー管理');
            // $content->description('');

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
        return Admin::grid(PractitionerMenu::class, function (Grid $grid) {

            $grid->column('name', 'メニュー名');
            $grid->menu_categories('カテゴリ')->display(function ($category) {
                return "{$category['name']}";
            });
            $grid->column('time', '時間');
            $grid->column('price', '料金');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PractitionerMenu::class, function (Form $form) {

            $form->hidden('practitioners_id')->default('1');
            $form->text('menu_categories_id', 'メニューカテゴリ');
            $form->text('name', 'メニュー名');
            $form->textarea('description', 'メニュー説明');
            $form->text('time', '所要時間(分)');
            $form->text('price', '料金');
            $form->image('img', 'イメージ画像');

        });
    }
}
