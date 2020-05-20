<?php

namespace App\Admin\Controllers;

use App\Models\GoodsCate;
use App\Models\GoodsMenu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use http\Client\Request;
use Illuminate\Support\Facades\DB;

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

        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('goodscate.cate_name', '部門', GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'));

        });

        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->selectOne('goodsgroup.group_name', '細類',  GoodsMenu::all()->where('goodsgroup.cate_id',3)->pluck('goodsgroup.group_name','goodsgroup.group_name'), function ($query, $value) {

                $query->where('goodsgroup.group_name', $value);
            });


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
                ->select(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'))->load('goodsgroup.group_name', '/api/group');
//            $filter->equal('goodscate.cate_name', '部門')->select(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'));
            $filter->equal('group', '細類')->select('group');



        });

        // dump(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'));

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



        $form->select('group');

        $form->number('sort', __('排序'));
        $form->number('no', __('編號'));
        $form->text('name', __('名稱'));
        // $form->column('status')->using(['1' => '現貨', '2' => '暫停', '3' => '新貨', '5' => '季節貨']);

        $form->select('status', '狀態')->options(['1' => '現貨', '2' => '暫停', '3' => '新貨', '5' => '季節貨']);

        $form->select('goodsgroup.cate_name','細類')->options(GoodsMenu::all()->pluck('goodscate.cate_name','goodscate.cate_name'));
//        $grid->column('cate_name','細類')->display(function ($title) {
//
//            return GoodsCate::getCateName();
//
//        });
        // $form->select('goodsgroup.group_name','細類');

        // dump(GoodsMenu::all()->get(['id', DB::raw('name as text')]));
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

    public function group(Request $request)
    {
        $provinceId = $request->get('q');

$json = "[
    {
        \"id\": 9,
        \"text\": \"xxx\"
    },
    {
        \"id\": 21,
        \"text\": \"xxx\"
    }
]";

        return GoodsMenu::goodsgroup()->get(['id', DB::raw('name as text')]);

    }
}
