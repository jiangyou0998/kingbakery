<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>基于bootstrup的jQuery多级列表树插件|DEMO_jQuery之家-自由分享jQuery、html5、css3的插件库</title>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .htmleaf-header {
            margin-bottom: 15px;
            font-family: "Segoe UI", "Lucida Grande", Helvetica, Arial, "Microsoft YaHei", FreeSans, Arimo, "Droid Sans", "wenquanyi micro hei", "Hiragino Sans GB", "Hiragino Sans GB W3", "FontAwesome", sans-serif;
        }

        .htmleaf-icon {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="row">
    <hr>
    <h2>Selectable Tree</h2>
    <div class="col-sm-4">
        <h2>Input</h2>
        <div class="form-group">
            <label for="input-select-node" class="sr-only">Search Tree:</label>
            <input type="input" class="form-control" id="input-select-node" placeholder="請輸入..." value="">
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" class="checkbox" id="chk-select-silent" value="false">
                Silent (No events)
            </label>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-success select-node" id="btn-select-node">Select Node</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-danger select-node" id="btn-unselect-node">Unselect Node</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary select-node" id="btn-toggle-selected">Toggle Node</button>
        </div>
    </div>
    <div class="col-sm-4">
        <h2>Tree</h2>
        <div id="treeview-selectable" class=""></div>
    </div>
    <div class="col-sm-4">
        <h2>Events</h2>
        <div id="selectable-output"></div>
    </div>
</div>

<script src="/js/jquery-2.1.0.min.js"></script>
<script src="/js/bootstrap-treeview.min.js"></script>
<script type="text/javascript">

    $(function () {

        var defaultData = [
            {
                text: '1',
                href: '#parent1',
                tags: ['4'],
                selectable: false,
                nodes: [
                    {
                        text: '2',
                        href: '#child1',
                        tags: ['2'],
                        selectable: false,
                        nodes: [
                            {
                                text: 'Grandchild 1',
                                href: '#grandchild1',
                                tags: ['0']
                            },
                            {
                                text: 'Grandchild 2',
                                href: '#grandchild2',
                                tags: ['0']
                            }
                        ]
                    },
                    {
                        text: 'Child 2',
                        href: '#child2',
                        tags: ['0']
                    }
                ]
            },
            {
                text: 'Parent 2',
                href: '#parent2',
                tags: ['0']
            },
            {
                text: 'Parent 3',
                href: '#parent3',
                tags: ['0']
            },
            {
                text: 'Parent 4',
                href: '#parent4',
                tags: ['0']
            },
            {
                text: 'Parent 5',
                href: '#parent5',
                tags: ['0']
            }
        ];


        var $searchableTree = $('#treeview-searchable').treeview({
            data: defaultData,
        });

        var search = function (e) {
            var pattern = $('#input-search').val();
            var options = {
                ignoreCase: $('#chk-ignore-case').is(':checked'),
                exactMatch: $('#chk-exact-match').is(':checked'),
                revealResults: $('#chk-reveal-results').is(':checked')
            };
            var results = $searchableTree.treeview('search', [pattern, options]);

            var output = '<p>' + results.length + ' matches found</p>';
            $.each(results, function (index, result) {
                output += '<p>- ' + result.text + '</p>';
            });
            $('#search-output').html(output);
        }

        $('#btn-search').on('click', search);
        $('#input-search').on('keyup', search);

        $('#btn-clear-search').on('click', function (e) {
            $searchableTree.treeview('clearSearch');
            $('#input-search').val('');
            $('#search-output').html('');
        });


        // var json = '[{"text":"麵包部","nodes":[{"text":"生包","nodes":[{"text":"咸麵粒(30)"},{"text":"甜麵粒(30)"},{"text":"提子麥麵粒(30)"},{"text":"豬仔(8)"},{"text":"咸卷(8)"},{"text":"熱狗(8)"},{"text":"芝士條(8)"},{"text":"軟心芝士(8)"},{"text":"黃金芝士(8)"},{"text":"薄餅底(8)"},{"text":"菠蘿(8)"},{"text":"雞尾(8)"},{"text":"叉燒包(8)"},{"text":"吞拿魚(8)"},{"text":"腸仔包(8)"},{"text":"紅豆菠蘿(8)"},{"text":"椰絲菠蘿(8)"},{"text":"大麥(5)"},{"text":"提子菠蘿(5)"},{"text":"提子合桃(5)"},{"text":"丹麥條(8)"},{"text":"牛角酥(30)"},{"text":"迷你咸餐(60)"},{"text":"迷你甜餐(60)"},{"text":"TESTING"},{"text":"ceshi "}]},{"text":"生包-方包/家庭裝","nodes":[{"text":"湯種方包麵"},{"text":"湯芝士方包麵"},{"text":"湯提子方包麵"},{"text":"湯黑芝麻方包麵"},{"text":"湯什糧方包麵"},{"text":"奶油立方麵(4)"},{"text":"焦糖立方麵(4)"},{"text":"朱古力立方麵(4)"},{"text":"紫薯立方麵(4)"},{"text":"雞尾檳(5)"},{"text":"忌廉紅豆檳(5)"},{"text":"湯種麵糰(6)"},{"text":"咸麵糰(水手包)(6)"},{"text":"提子燕麥(6)"},{"text":"紅豆忌廉(6)"},{"text":"黑豆核桃包(6)"},{"text":"裸麥雜糧包(6)"},{"text":"黑糖紅棗茸包(6)"},{"text":"裸麥提子核桃(6)"}]},{"text":"熟包","nodes":[{"text":"咸方包"},{"text":"全麥方包"},{"text":"英式方包"},{"text":"厚切方包"},{"text":"多士方包"},{"text":"湯種方包"},{"text":"湯種芝士方包"},{"text":"湯種葡萄方包"},{"text":"奶油反卷方包(4)"},{"text":"焦糖反卷方包(4)"},{"text":"朱古力反卷方包(4)"},{"text":"長立方(紫薯)(4)"},{"text":"牛油排包(3)"},{"text":"藍莓合桃(3)"},{"text":"麥香芝士(3)"},{"text":"脆脆豬(10)"},{"text":"大脆豬(10)"}]},{"text":"撻/批/什項","nodes":[{"text":"酥皮(240)"},{"text":"牛油皮(110)"},{"text":"雞批(24)"},{"text":"豆沙燒餅(30)"}]},{"text":"包部-餡料","nodes":[{"text":"黃金蛋撻醬(1kg)"},{"text":"菠蘿皮(30p)"},{"text":"蒜茸牛油(3磅)"},{"text":"墨西哥油(12磅)"},{"text":"鮮奶球油(15磅)"},{"text":"牛油粒(3磅)"},{"text":"奶油(3磅)"},{"text":"雞尾餡(7.5磅)"},{"text":"吞拿魚餡(3磅)"},{"text":"吉士餡(3磅)"},{"text":"紫薯餡(3磅)"}]},{"text":"到會","nodes":[{"text":"迷你雞批(24件)"},{"text":"迷你叉燒批(24件)"}]}]},{"text":"西餅部","nodes":[{"text":"鮮蛋糕","nodes":[{"text":"(標準)什果"},{"text":"(標準)黑森林"},{"text":"(標準)芒果"},{"text":"(標準)栗子"},{"text":"(M)什果"},{"text":"(M)黑森林"},{"text":"(M)芒果"},{"text":"(M)栗子"},{"text":"精裝-特濃朱古力"},{"text":"精裝-紅桑莓芝士"},{"text":"精裝-意大利芝士"},{"text":"精裝-百香果芝士"}]},{"text":"凍餅","nodes":[{"text":"蛋味瑞士卷(3)"},{"text":"北海道3.6牛乳卷(2)"},{"text":"抹茶紅豆牛乳卷(2)"},{"text":"青森縣蘋果牛乳卷(2)"},{"text":"朱古力瑞士餅(3)"},{"text":"石板街(3)"},{"text":"意大利芝士凍餅(6)"},{"text":"特濃朱古力凍餅(6)"},{"text":"抹茶芝士凍餅(6)"},{"text":"藍莓芝士凍餅(6)"},{"text":"紐約芝士凍餅(6)"},{"text":"百香果芝士凍餅(6)"},{"text":"紅桑莓芝士凍餅(6)"},{"text":"半熟芝士撻(28)"},{"text":"特濃芒果布甸杯(5)"}]},{"text":"常溫蛋糕","nodes":[{"text":"蛋糕仔"},{"text":"牛奶迷你蛋糕(50)"},{"text":"蜂蜜紙包戚風(10)"},{"text":"湯種蛋糕-原味(10)"},{"text":"湯種蛋糕-朱古力(10)"},{"text":"蜂蜜戚風蛋糕(5)"},{"text":"香蕉戚風蛋糕(5)"},{"text":"藍莓戚風蛋糕(5)"}]},{"text":"訂餅","nodes":[{"text":"訂餅-迷你($118)"},{"text":"訂餅-迷你($108)"},{"text":"訂餅-標準($175)"},{"text":"訂餅-標準($170)"},{"text":"訂餅-2磅 ($170/磅)"},{"text":"訂餅-2磅 ($165/磅)"},{"text":"訂餅-3磅 ($170/磅)"},{"text":"訂餅-3磅 ($165/磅)"},{"text":"訂餅-4磅 ($170/磅)"},{"text":"訂餅-4磅 ($165/磅)"},{"text":"訂餅-5磅 ($170/磅)"},{"text":"訂餅-5磅 ($165/磅)"},{"text":"訂餅 ($170/磅)"},{"text":"訂餅 ($165/磅)"},{"text":"清蛋糕 ($80/磅)"},{"text":"訂餅-美圖蛋糕(2磅)"},{"text":"訂餅-精裝($80)"}]},{"text":"到會","nodes":[{"text":"香芒布甸(3磅)"},{"text":"迷你雜果撻(24件)"},{"text":"意大利芝士餅(24小件)"}]}]},{"text":"廚務部","nodes":[{"text":"汁醬/配料","nodes":[{"text":"辣汁(10磅)"},{"text":"咖喱汁(5磅)"},{"text":"黑椒汁(5磅)"},{"text":"焗飯汁(5磅)"},{"text":"豉油汁(5磅)"},{"text":"泰式海南雞汁(2磅)"},{"text":"皇牌咖喱(5斤)"},{"text":"糖醋(10磅)"},{"text":"扣肉醬(2磅)"},{"text":"鳳爪醬(2磅)"},{"text":"蘿蔔酸菜(5磅)"},{"text":"蒜茸豆豉(5磅)"},{"text":"咸味肉絲(5磅)"},{"text":"熟冬菰(3斤)"},{"text":"炒梅菜(2磅)"},{"text":"台式肉燥(5磅)"},{"text":"肉醬(5磅)"},{"text":"咖喱牛肉餡(5磅)"},{"text":"叉燒包餡(5磅)"},{"text":"紅豆茸餡(5磅)"}]},{"text":"點心","nodes":[{"text":"蘿蔔糕(細)"},{"text":"山竹牛肉球(30粒)"},{"text":"足料糯米雞(6個)"},{"text":"碗仔翅(5磅)"},{"text":"咸肉粥(5磅)"},{"text":"羅宋湯(5磅)"},{"text":"鮮番茄濃湯(5磅)"},{"text":"宇治抹茶紅豆糕(3磅)"}]},{"text":"凍肉","nodes":[{"text":"排骨(10磅)"},{"text":"雞肉(10磅)"},{"text":"原味豬扒(5磅)"},{"text":"香茅豬扒(5磅)"},{"text":"豬柳扒(5磅)"},{"text":"原味雞扒(5磅)"},{"text":"燒汁雞扒(5磅)"},{"text":"牛冧片(5磅)"},{"text":"肉片(5磅)"},{"text":"肉絲(5磅)"},{"text":"蒸肉餅(5磅)"},{"text":"雞粒(5磅)"},{"text":"雞絲(5磅)"},{"text":"雞中翼(5磅)"},{"text":"鳳爪(5磅)"},{"text":"南乳豬手(5磅)"},{"text":"清湯腩(5磅)"},{"text":"爆腩仔(5磅)"}]},{"text":"飲品","nodes":[{"text":"豆漿"},{"text":"豆漿(2kg)"},{"text":"原凍奶茶"},{"text":"原凍咖啡"},{"text":"五花茶"},{"text":"柑桔檸蜜"}]}]},{"text":"轉手貨","nodes":[{"text":"食材","nodes":[{"text":"煙肉(2磅)"},{"text":"蟹棒肉(250g)"},{"text":"法蘭克福腸(8條)"},{"text":"司華力腸(2磅)"},{"text":"芝士片(84片)"},{"text":"芝士碎(2kg)"},{"text":"車打芝士粒(1kg)"},{"text":"三色芝士碎(5磅)"},{"text":"半磅鮮牛油(227g)"},{"text":"咖啡忌廉奶(1L)"},{"text":"淡忌廉(1Ltr)"},{"text":"榴槤(1kg)"},{"text":"腸仔(32包)"},{"text":"火腿片(10磅)"},{"text":"炸魚柳(25)"},{"text":"急凍蛋白(5kg)"},{"text":"砂糖(30kg)"},{"text":"雞蛋(360隻)"},{"text":"北海道牛乳"},{"text":"F&N全脂奶(48x400g)"},{"text":"方罐餐肉(24x340g)"},{"text":"生油(27斤)"},{"text":"椰絲(5磅)"},{"text":"白粉(5磅)"},{"text":"麥粉(5磅)"},{"text":"杏仁片"},{"text":"熟吉士粉(5磅)"},{"text":"烘烤黑芝麻(磅)"},{"text":"朱古力釘(磅)"},{"text":"紅棗乾(500g)"},{"text":"藍梅醬(2磅)"},{"text":"白芝麻(2斤)"},{"text":"果凍粉(200g)"},{"text":"生日糖牌(12個)"},{"text":"檸檬黃粉"},{"text":"久力雲呢油"},{"text":"卡夫芝士粉(85g)"},{"text":"無鋁泡打粉(4oz)"},{"text":"甜奶(390g)"},{"text":"粟米粒(425g)"},{"text":"菠蘿粒(850g)"},{"text":"磨菇片(850g)"},{"text":"原片菠蘿(850g)"},{"text":"洋芫荽(番茜碎)"},{"text":"紅車厘子"},{"text":"高美植脂淡奶(400g)"},{"text":"朱古力粉(500g)"},{"text":"黃梅占(900g)"},{"text":"午餐肉(1588g)"},{"text":"沙律醬"},{"text":"美玉白汁(3kg)"},{"text":"南順馬芝蓮(2.25kg)"},{"text":"車打芝士汁(106oz)"},{"text":"麵包糠(1kg)"},{"text":"黑椒碎(磅)"},{"text":"燕麥片(800g)"},{"text":"鷹粟粉(420g)"},{"text":"紫薯裝飾粉(1kg)"},{"text":"咖喱奇脆片(1kg)"},{"text":"法寶辣味肉松(2kg)"},{"text":"大Rum酒(100cl)"},{"text":"茄汁(3.23kg)"},{"text":"真味高湯"},{"text":"鰻魚汁(1.8L)"},{"text":"天廚味精(彿手)"},{"text":"廚師雞粉"},{"text":"忌廉雞湯粉"},{"text":"意式香草(家樂牌)"}]},{"text":"OEM","nodes":[{"text":"沙琪瑪(OEM)"},{"text":"雞蛋卷(OEM)"},{"text":"龜苓膏(OEM)"},{"text":"茯苓膏(OEM)"},{"text":"鳳凰卷(OEM)"},{"text":"Smucker\'s士多啤梨果醬(OEM)"},{"text":"Smucker\'s藍莓果醬(OEM)"}]},{"text":"包裝用品","nodes":[{"text":"奶茶掛牌(100)"},{"text":"咖啡掛牌(100)"},{"text":"豆漿掛牌(100)"},{"text":"五花茶掛牌(100)"},{"text":"柑桔檸蜜掛牌(100)"},{"text":"掛牌-湯種方包(100)"},{"text":"掛牌-湯種芝士方包(100)"},{"text":"掛牌-湯種葡萄方包(100)"},{"text":"餅店Logo貼紙(50張*15個)"},{"text":"外帶站Logo貼紙(50張*10個)"},{"text":"方包(4片)貼紙(50張*10個)"},{"text":"全麥方包(4片)貼紙(50張*10個)"},{"text":"英式方包(4片)貼紙(50張*10個)"},{"text":"厚切方包(2片)貼紙(50張*10個)"},{"text":"印嘜沙琪瑪貼紙(84張*1個)"},{"text":"芝士撻貼紙(50張*2個)"},{"text":"兩件蛋撻紙袋(100)"},{"text":"迷你包袋(1000)"},{"text":"7x9+1信封袋(500)"},{"text":"6+2X9.5\\"戚風袋(1000)"},{"text":"OPP12+1.25方包袋(1000)"},{"text":"OPP12+2湯種方包袋(1000)"},{"text":"#145光身麵包袋(10000)"},{"text":"#155印嘜麵包袋(6000)"},{"text":"#180印嘜麵包袋(3000)"},{"text":"三磅蛋糕盒"},{"text":"四磅蛋糕盒"},{"text":"五磅蛋糕盒"},{"text":"大圓蛋糕盒"},{"text":"六件芝士撻盒連內格(150)"},{"text":"4件蛋撻手挽盒(200)"},{"text":"6件蛋撻手挽盒(200)"},{"text":"7x7x5手挽盒(100)"},{"text":"9x9x5手挽盒(100)"},{"text":"沙律夾"},{"text":"印嘜餐紙(50包/箱)"},{"text":"7吋到會碟(100隻)"},{"text":"到會盆連蓋"},{"text":"到會鍚盆連蓋"},{"text":"到會箱(小)"},{"text":"到會箱分格咭紙"},{"text":"外賣咭紙(細)"},{"text":"外賣咭紙(中)"},{"text":"外賣咭紙(大)"},{"text":"金線"},{"text":"2 吋橡根"},{"text":"珍珠繩"},{"text":"數字腊燭(50)"},{"text":"餅刀+蠟燭(100)"},{"text":"獨立膠紙(5)"},{"text":"印嘜包底腊紙(1000)"},{"text":"5 \\"風車紙托(300個)"},{"text":"6.5\\"Pizza紙托(300)"},{"text":"風車船型紙杯(長)"},{"text":"9寸飲筒"},{"text":"5\\"透明茶更(100)"},{"text":"黑色膠刀(100)"},{"text":"盒裝保鮮紙(18吋)"},{"text":"1oz醬油杯連蓋(500套)"},{"text":"蒸飯錫兜(125)"},{"text":"#7650錫兜(250套)"},{"text":"370ml茶啡樽連蓋(216)"},{"text":"三文治吸塑(200)  "},{"text":"瑞士卷吸塑底連蓋(167)"},{"text":"個裝芝士蛋糕吸塑(100)"}]},{"text":"清潔用品","nodes":[{"text":"抹手紙"},{"text":"爽潔布(黃色)"},{"text":"爽潔布(桃紅色)"},{"text":"白毛巾(祝君早安)"},{"text":"藍色醫生手套(100)"},{"text":"紅色膠手套"},{"text":"黑色膠手套"},{"text":"爐灶除油劑(5Ltr)"},{"text":"餐具手洗液(5Ltr)"},{"text":"啡色百潔磚(5)"},{"text":"黑色垃圾袋(25)"}]},{"text":"消耗用品","nodes":[{"text":"白布紙(20)"},{"text":"入爐紙(20)"},{"text":"唧袋(72)"},{"text":"Release Spray噴油 600ml"},{"text":"口罩(50)"},{"text":"衛生浴帽(100)"},{"text":"廁紙(10卷)"},{"text":"計時器"},{"text":"雪櫃溫濕度計"},{"text":"溫度/濕度計(有記憶)"},{"text":"滅蚊紙"},{"text":"蠅蟑寧"},{"text":"滅蚊燈燈膽"},{"text":"麵粉袋"}]},{"text":"廚/餅房用品","nodes":[{"text":"茶圈"},{"text":"啡圈"},{"text":"茶袋"},{"text":"啡袋"},{"text":"27\\"x29\\"長飯袋"},{"text":"羊毛蛋掃"},{"text":"10\\"牙刀(膠柄)"},{"text":"安全罐頭刀"},{"text":"14cm蛋水壺"},{"text":"#695A量蛋桶"},{"text":"電餅爐(2000w)"}]},{"text":"器皿用具","nodes":[{"text":"麵飽夾"},{"text":"Logo 四方托盆"},{"text":"大五常盒(#2001A)"},{"text":"中五常盒(#2003A)"},{"text":"細五常盒(#2004A)"},{"text":"#1817-矮箱蓋"},{"text":"#1818-高箱蓋"}]},{"text":"印刷文具","nodes":[{"text":"訂餅簿"},{"text":"外賣簿(飯堂)"},{"text":"外賣簿(混合型)"},{"text":"價錢咭膠牌( 掛 )"},{"text":"價錢咭膠牌(L型)"},{"text":"價錢咭掛牌"},{"text":"Estape 獨立膠紙座"},{"text":"公司禮券封套(100)"},{"text":"印嘜日期機紙(10)"},{"text":"電腦收銀機紙(2)"},{"text":"FAX紙(熱感紙)"},{"text":"A4(Fax紙)"},{"text":"影印機碳粉(TN2380)"}]},{"text":"醫藥","nodes":[{"text":"3M膠布"}]},{"text":"服裝","nodes":[{"text":"Logo單襟短袖廚衣(白鈕)"},{"text":"Logo孖襟短袖廚衣(白鈕)"},{"text":"黑色廚帽"},{"text":"格仔廚褲"},{"text":"橙/黑風褸"},{"text":"黑色貝雷帽"},{"text":"黑色鴨舌帽"},{"text":"黑色半截圍裙"},{"text":"Logo黑色半截圍裙"},{"text":"Logo黑色連身圍裙"},{"text":"黑色半截圍裙(麵包工房)"},{"text":"Logo拼領橙色短袖Polo"},{"text":"橙色圓領短袖T恤"},{"text":"橙色圓領棉質短袖T恤"}]}]}]';
        var json = {!! $data !!};

        console.log(json);

        var initSelectableTree = function () {
            return $('#treeview-selectable').treeview({
                data: json,
                levels: 1,
                showTags: true,
                enableLinks: true,
                multiSelect: true,
                onNodeSelected: function (event, node) {
                    $prependStr =
                        '<tr class="add_item">' +
                        '<td><b class="count">1.</b></td>' +
                        '<td class="item_list_td">' + node.text + ', ' + node.no + '</td>' +
                        '<td class="item_list_td_1">' +
                        '<input type="text" style="width:50px;" id="sort_item_398" value="1">' +
                        '</td>' +
                        '<td class="item_delete">' +
                        '<img src="images/delete.png" style="cursor:pointer;" onclick="_deleteRow(this)" name="item_398"></td></tr>';

                    $('#selectable-output').append($prependStr);
                },
                onNodeUnselected: function (event, node) {
                    $('#selectable-output').append('<p>' + node.text + ' was unselected</p>');
                }
            });
        };
        var $selectableTree = initSelectableTree();

        var findSelectableNodes = function () {
            return $selectableTree.treeview('search', [$('#input-select-node').val(), {
                ignoreCase: false,
                exactMatch: false
            }]);
        };
        var selectableNodes = findSelectableNodes();

        // Select/unselect/toggle nodes
        $('#input-select-node').on('keyup', function (e) {
            selectableNodes = findSelectableNodes();
            $('.select-node').prop('disabled', !(selectableNodes.length >= 1));
        });

        $('#btn-select-node.select-node').on('click', function (e) {
            $selectableTree.treeview('selectNode', [selectableNodes, {silent: $('#chk-select-silent').is(':checked')}]);
        });

        $('#btn-unselect-node.select-node').on('click', function (e) {
            $selectableTree.treeview('unselectNode', [selectableNodes, {silent: $('#chk-select-silent').is(':checked')}]);
        });

        $('#btn-toggle-selected.select-node').on('click', function (e) {
            $selectableTree.treeview('toggleNodeSelected', [selectableNodes, {silent: $('#chk-select-silent').is(':checked')}]);
        });


    });
</script>
</body>
</html>
