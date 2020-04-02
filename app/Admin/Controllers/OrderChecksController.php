<?php

namespace App\Admin\Controllers;

use App\Models\OrderCheck;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrderChecksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\OrderCheck';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderCheck);
        $grid->model()->where('disabled', '=', '1')->orderBy('sort');

        $grid->column('report_name', __('報告名稱'));
        $grid->column('num_of_day', __('相隔日數'));
        $grid->column('sort', __('排序'));


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
        $show = new Show(OrderCheck::findOrFail($id));




        return $show;
    }

//    protected function form()
//    {
//        $form = new Form(new OrderCheck);
//
//        $form->text('report_name', __('報告名稱'));
////
//        $form->number('sort', __('排序'));
//
//        // 直接添加一对多的关联模型
//        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
//            $form->text('title', 'SKU 名称')->rules('required');
//            $form->text('description', 'SKU 描述')->rules('required');
//            $form->text('price', '单价')->rules('required|numeric|min:0.01');
//            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
//        });
//
//        return $form;
//    }

    public function create(Content $content)
    {
        return view('admin.orderchecks.create');
    }
}
