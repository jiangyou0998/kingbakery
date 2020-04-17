<?php

namespace App\Admin\Controllers;

use App\Models\GoodsGroup;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsGroupsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '細類';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsGroup);

        $grid->column('int_id', __('Int id'));
        $grid->column('chr_name', __('Chr name'));
        $grid->column('int_sort', __('Int sort'));
        $grid->column('status', __('Status'));
        $grid->column('int_cat', __('Int cat'));
        $grid->column('chr_name_long', __('Chr name long'));
        $grid->column('last_modify', __('Last modify'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsGroup::findOrFail($id));

        $show->field('int_id', __('Int id'));
        $show->field('chr_name', __('Chr name'));
        $show->field('int_sort', __('Int sort'));
        $show->field('status', __('Status'));
        $show->field('int_cat', __('Int cat'));
        $show->field('chr_name_long', __('Chr name long'));
        $show->field('last_modify', __('Last modify'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsGroup);

        $form->number('int_id', __('Int id'));
        $form->text('chr_name', __('Chr name'));
        $form->number('int_sort', __('Int sort'));
        $form->number('status', __('Status'))->default(1);
        $form->number('int_cat', __('Int cat'));
        $form->text('chr_name_long', __('Chr name long'));
        $form->text('last_modify', __('Last modify'));

        return $form;
    }
}
