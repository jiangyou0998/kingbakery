<?php

namespace App\Http\Controllers;

use App\Models\GoodsGroup;
use App\Models\GoodsMenu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        return view('order.index');
    }

    public function cart(Request $request)
    {
        $dept = trim($request->input('dept'));
        $advance = trim($request->input('advance'));

        session(['dept' => $dept,
            'advance' => $advance]);

        return view('order.cart');
    }

    public function edit(Request $request)
    {
        $dept = trim($request->input('dept'));
        $advance = trim($request->input('advance'));

        session(['dept' => $dept,
            'advance' => $advance]);

        return view('order.edit');
    }

    public function left(Order $order)
    {
//        dump(Auth::User()->toArray());
//        dump($order->select('id','user')->toArray());

        $dept = session('dept');
        $advance = session('advance');
//        dump($dept);
//        dump($advance);

        $order = $order
            ->select('orders.id AS orderID', 'orders.qty', 'orders.status', 'orders.order_date',
                'goods_menus.name', 'goods_menus.no', 'goods_menus.base', 'goods_menus.min', 'goods_menus.cuttime', 'goods_menus.phase', 'goods_menus.id AS itemID',
                'goods_cates.cate_name', 'units.name AS UoM')
            //還沒有寫user
            ->where('orders.user', 6)
            ->where('orders.qty', '>', 0)
            ->where('orders.dept', $dept)
            ->whereIn('orders.status', [0, 1])
            //還沒篩選時間

            ->join('goods_menus', 'product', '=', 'goods_menus.id')
            ->join('goods_groups', 'goods_menus.group_id', '=', 'goods_groups.id')
            ->join('goods_cates', 'goods_groups.cate_id', '=', 'goods_cates.id')
            ->join('units', 'goods_menus.unit', '=', 'units.id')
            ->orderBy('goods_menus.no')
            ->get();

        $curtime = date('Hi');
//        dd($curtime);

        foreach ($order as $o) {
            if ($o['cuttime'] < $curtime && $advance - 1 < $o['phase']) {
                $o['haveoutdate'] = 1;
            }

            if ($o['cuttime'] > $curtime && $advance < $o['phase']) {
                $o['haveoutdate'] = 1;
            }

        }

//        dump($order->toArray());

        return view('order.left')->with('order', $order);
    }

    public function rightTop()
    {
        return view('order.righttop');
    }

    public function rightMiddle(Request $request)
    {
        $goodsGroup = new GoodsGroup;
        $goodsMenu = new GoodsMenu;

        $cateID = $request->input('cateid');
        $pageData = [
            'group' => []
        ];

        if ($cateID) {
            $advance = session('advance');
            $date = date('Hi');

            //創建子查詢,查詢沒截單數據的數量
            $joinSub = $goodsMenu->select('goods_menus.group_id', DB::raw('COUNT(*) as item_count'))
                ->where(function ($query) use ($advance, $date) {
                    $query->where(DB::raw('goods_menus.phase'), '<=', $advance)
                        ->where('goods_menus.cuttime', '>=', $date)
                        ->orWhere(function ($queryOr) use ($advance, $date) {
                            $queryOr->where(DB::raw('goods_menus.phase+1'), '<=', $advance)
                                ->where('goods_menus.cuttime', '<', $date);
                        });
                })->where('goods_menus.status', 1)->groupBy('goods_menus.group_id')->getQuery();

//        dd($joinSub->get()->toArray());

            $goodsGroup = $goodsGroup->select('goods_groups.id', 'goods_groups.group_name')
                //用joinSub方法連接子查詢
                ->joinSub($joinSub, 'T2', 'goods_groups.id', '=', 'T2.group_id')
                ->where('goods_groups.status', '<>', 4)
                ->where('goods_groups.cate_id', $cateID)
                ->where('T2.item_count', '>', 0)
                ->whereNotNull('T2.item_count')
                ->groupBy('goods_groups.id')
                ->groupBy('goods_groups.sort');


//            dump($goodsGroup->get()->toArray());
            $pageData = [
                'group' => $goodsGroup->get()->toArray()
            ];
        }

        return view('order.rightmiddle')->with('pagedata', $pageData);
    }

    public function rightBottom(Request $request)
    {
        $groupID = $request->input('groupid');

        $goodsMenu = new GoodsMenu;
        $goodsMenu = $goodsMenu
            ->select(DB::raw('goods_menus.id AS itemID'), DB::raw('goods_menus.name AS itemName'),
                'goods_menus.no', 'goods_menus.status', 'goods_menus.cuttime',
                'goods_menus.phase', 'goods_menus.base', 'goods_menus.min',
                DB::raw('units.name AS UoM'),
                DB::raw('LEFT(goods_cates.cate_name, 2) AS suppName'))
            ->join('units', 'units.id', '=', 'goods_menus.unit')
            ->join('goods_groups', 'goods_menus.group_id', '=', 'goods_groups.id')
            ->join('goods_cates', 'goods_groups.cate_id', '=', 'goods_cates.id')
            ->where('goods_menus.group_id', $groupID)
            ->whereNotIn('goods_menus.status', [2, 4]);

        //判斷用戶是普通用戶,這裡需要改
        //管理員可以查看全部,不需要增加where條件

        if (Auth::User()->id) {

            $advance = session('advance');
            $date = date('Hi');

//            dump($advance);dd($date);
            $goodsMenu = $goodsMenu
                ->where(function ($query) use ($advance, $date) {
                    $query->where(DB::raw('goods_menus.phase'), '<=', $advance)
                        ->where('goods_menus.cuttime', '>=', $date)
                        ->orWhere(function ($queryOr) use ($advance, $date) {
                            $queryOr->where(DB::raw('goods_menus.phase+1'), '<=', $advance)
                                ->where('goods_menus.cuttime', '<', $date);
                        });
                });
        }

        $goodsMenu = $goodsMenu
            ->groupBy('goods_menus.id')
            ->orderBy('goods_menus.sort')
            ->orderBy('goods_menus.id');

        $pageData = [
            'menu' => $goodsMenu->get()
        ];

//        dump($goodsMenu->get()->toArray());

        return view('order.rightbottom')->with('pagedata', $pageData);
    }

    //
    public function selectDay($advDays=14)
    {

        $isSun = $this->isSunday();
        $pageData['isSun'] = $isSun;

        $dayArray = Order::getDayArray($advDays);

//        dump($dayArray);

        $pageData = [
            'dayArray' => $dayArray
        ];

        return view('order.selectday', $pageData);
    }

    //週日有些不能下單
    function isSunday()
    {
        $isSun = false;

        if (date("D") == "Sun")
            $isSun = true;

        return $isSun;
    }
}
