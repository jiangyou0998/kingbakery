<?php

namespace App\Admin\Controllers;

use App\Models\Notice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;

class NoticesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Notice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Notice);

        $grid->column('id', __('ID'));
        $grid->column('name', __('主旨'));
//        $grid->column('dept', __('Dept'));
        $grid->column('filepath', __('Filepath'))->display(function($filepath) {
            return "<a href=\"/storage/$filepath\" target=\"_blank\">$filepath</a>";
        });
        $grid->column('user', __('User'));
        $grid->column('date_create', __('取號時間'));
//        $grid->column('date_modify', __('Date modify'));
//        $grid->column('date_delete', __('Date delete'));
        $grid->column('notice_no', __('編號'));
        $grid->column('date_until', __('到期時間'));
        $grid->column('first_path', __('First path'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
//    protected function detail($id)
//    {
//        $show = new Show(Notice::findOrFail($id));
//
//        $show->field('id', __('Id'));
//        $show->field('name', __('Name'));
//        $show->field('dept', __('Dept'));
//        $show->field('filepath', __('Filepath'));
//        $show->field('user', __('User'));
//        $show->field('date_create', __('Date create'));
//        $show->field('date_modify', __('Date modify'));
//        $show->field('date_delete', __('Date delete'));
//        $show->field('notice_no', __('Notice no'));
//        $show->field('date_until', __('Date until'));
//        $show->field('first_path', __('First path'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));
//
//        return $show;
//    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Notice);
//        $form->file('file_column');
        $form->text('name', __('Name'));
        $form->number('dept', __('Dept'));
        $form->file('filepath', __('Filepath'));

//        $form->number('user', __('User'));
        $form->number('notice_no', __('Notice no'));
        $form->date('date_until', __('Date until'))->default(date('Y-m-d'));
//        $form->text('first_path', __('First path'));

        // 定义事件回调，当模型即将保存时会触发这个回调
        $form->saving(function (Form $form) {
            $form->model()->user = Auth::guard('admin')->user()->id;
            $form->model()->date_create = date('Y-m-d');
            $form->model()->first_path = '/dasdada';
        });

        return $form;
    }
}
