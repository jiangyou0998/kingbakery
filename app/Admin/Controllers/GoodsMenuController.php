<?php

namespace App\Admin\Controllers;

use App\Models\GoodsCate;
use App\Models\GoodsMenu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsMenuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '貨品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $gc = 11;



        $grid = new Grid(new GoodsMenu);

        $grid->header(function ($query) {



//            return 12121212;
        });
        $grid->column('id', __('ID'));
        $grid->column('sort', __('排序'))->editable();
        $grid->column('no', __('編號'));
        $grid->column('name', __('名稱'));
        $grid->column('status')->using(['1' => '現貨', '2' => '暫停', '3' => '新貨', '5' => '季節貨']);

        $grid->column('goodscate.cate_name','部門');
//        $grid->column('cate_name','細類')->display(function ($title) {
//
//            return GoodsCate::getCateName();
//
//        });
        $grid->column('goodsgroup.group_name','細類');

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('name', '名稱');
            $filter->in('id','編號')->select(GoodsMenu::all()->pluck('no','id'));

            $filter->equal('goodscate.cate_name', '部門')
                ->select(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'))->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);;
//            $filter->equal('goodscate.cate_name', '部門')->select(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'));
            $filter->equal('group', '細類')->select(GoodsMenu::all()->pluck('goodsgroup.group_name','goodsgroup.group_name'));



        });

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
        $show = new Show(GoodsMenu::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsMenu);
//        $form->select('bind_store', '绑定门店')
//            ->options(function ($id) {
//        $store = Store::find($id);
//        if ($store)
//        {
//            return [$store->id => $store->name];
//      }
//    });


        return $form;
    }
}
