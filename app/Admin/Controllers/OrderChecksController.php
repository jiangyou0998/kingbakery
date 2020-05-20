<?php

namespace App\Admin\Controllers;

use App\Models\GoodsMenu;
use App\Models\OrderCheck;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

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

    protected function form()
    {
        $form = new Form(new OrderCheck);

        $form->text('report_name', __('報告名稱'));
//
        $form->number('sort', __('排序'));


        $form->listbox('report_name', trans('admin.permissions'));


        return $form;
    }

    public function create(Content $content)
    {
        // 直接渲染视图输出，Since v1.6.12


        $datas = GoodsMenu::all();
//        foreach ($datas as $data ){
//            dump($data->goodsgroup->group_name);
//        }
////        $group = GoodsMenu::find(1)->goodsgroup->group_name;
////        $cate = GoodsMenu::find(1)->goodscate->cate_name;
////        dump($cate);dd($group);
//        die();

        $res = array();
        $cateName = '';
        $groupName = '';
        foreach ($datas as $data){
            if($cateName != $data->goodscate->cate_name){
                $cateName = $data->goodscate->cate_name;
            }

            if($groupName != $data->goodsgroup->group_name){
                $groupName = $data->goodsgroup->group_name;
            }

            $res[$cateName][$groupName][$data->name] = $data;
        }

        $jsonArr = array();
        foreach ($res as $cateName => $groups){
            $cateArr = array();
            $cateArr['text'] = $cateName;
            $cateArr['selectable'] = false;
            foreach ($groups as $groupName => $group){
                $groupArr = array();
                $groupArr['text'] = $groupName;
                $groupArr['selectable'] = false;
                foreach ($group as $menuName => $menu){
                    $menuArr = array();
                    $menuArr['text'] = $menuName;
                    $menuArr['id'] = $menu->id;
                    $menuArr['no'] = $menu->no;
                    if($menu->cuttime != '0000'){
                        $menuArr['tags'] = [substr_replace($menu->cuttime, ":", 2, 0)];
                    }

                    $groupArr['nodes'][] = $menuArr;
                }
                $cateArr['nodes'][] = $groupArr;
            }

            $jsonArr[] = $cateArr;
        }

        $json = json_encode($jsonArr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);


//        $json = '[{"text": "Parent 1","nodes": [{"text": "Child 1","nodes": [{"text": "Grandchild 1"},{"text": "Grandchild 2"}]},{"text": "Child 2"}]},{"text": "Parent 2"},{"text": "Parent 3"},{"text": "Parent 4"},{"text": "Parent 5"}]';

//        dump($jsonArr);dump($json);die();
//        dd(json_decode($json, true));

//        dd($res);
        $articleView = view('admin.orderchecks.create',['data' => $json ])
            ->render();
        $content->row($articleView);

    //        $content->view('admin.orderchecks.create', ['data' => 'foo']);

        return $content;
    }
}
