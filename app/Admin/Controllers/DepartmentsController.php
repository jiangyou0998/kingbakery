<?php

namespace App\Admin\Controllers;

use App\Models\Department;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DepartmentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Department';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Department);

        $grid->model()->where('disabled', '=', '1')->orderBy('sort');

//        $grid->column('id', __('Id'));
        $grid->column('department', __('Department'));
//        $grid->column('disabled', __('Disabled'));
        $grid->column('sort', __('Sort'));


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
//        $show = new Show(Department::findOrFail($id));
//
//        $show->field('id', __('Id'));
//        $show->field('department', __('Department'));
//        $show->field('disabled', __('Disabled'));
//        $show->field('sort', __('Sort'));
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
        $form = new Form(new Department);

        $form->text('department', __('部門'));
        $form->switch('disabled', __('可用'))->default(1);
        $form->number('sort', __('排序'));

        return $form;
    }
}
