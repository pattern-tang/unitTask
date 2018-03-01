<?php if (!defined('THINK_PATH')) exit();?>﻿

<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 试卷管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Survey/articleList');?>" data-title="学生试卷表" href="javascript:void(0)">学生试卷表</a></li>
					<li><a data-href="<?php echo U('School/Survey/articlePaper');?>" data-title="试卷列表" href="javascript:void(0)">试卷列表</a></li>
					<li><a data-href="<?php echo U('School/Survey/articleExams');?>" data-title="试题库" href="javascript:void(0)">试题库</a></li>
					<li><a data-href="<?php echo U('School/Survey/articleRelation');?>" data-title="试题关联表" href="javascript:void(0)">试题关联表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 学生在线管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Goods/pictureList');?>" data-title="图片管理" href="javascript:void(0)">图片管理</a></li>
				</ul>
				<ul>
					<li><a data-href="<?php echo U('School/Goods/pictureShow');?>" data-title="图片展示" href="javascript:void(0)">图片展示</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 成绩管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Goods/productBrand');?>" data-title="品牌管理" href="javascript:void(0)">品牌管理</a></li>
					<li><a data-href="<?php echo U('School/Goods/productCategory');?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					<li><a data-href="<?php echo U('School/Goods/productList');?>" data-title="产品管理" href="javascript:void(0)">产品管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 教务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Classroom/registrar');?>" data-title="教师管理" href="javascript:;">教师管理</a></li>
					<li><a data-href="<?php echo U('School/Classroom/feedbackList');?>" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 用户中心<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Member/memberList');?>" data-title="会员列表" href="javascript:;">会员列表</a></li>
					<li><a data-href="<?php echo U('School/Member/memberDel');?>" data-title="删除的会员" href="javascript:;">删除的会员</a></li>

					<li><a data-href="<?php echo U('School/Member/memberRD');?>" data-title="下载记录" href="javascript:void(0)">下载记录</a></li>
					<li><a data-href="<?php echo U('School/Member/memberRS');?>" data-title="分享记录" href="javascript:void(0)">分享记录</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/Charts/charts1');?>" data-title="折线图" href="javascript:void(0)">折线图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts2');?>" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts3');?>" data-title="区域图" href="javascript:void(0)">区域图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts4');?>" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts5');?>" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts6');?>" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>
					<li><a data-href="<?php echo U('School/Charts/charts7');?>" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/System/systemBase');?>" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					<li><a data-href="<?php echo U('School/System/systemCategory');?>" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>
					<li><a data-href="<?php echo U('School/System/systemData');?>" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>
					<li><a data-href="<?php echo U('School/System/systemShielding');?>" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
					<li><a data-href="<?php echo U('School/System/systemLog');?>" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
				</ul>
			</dd>
		</dl>
	</div>

	<!--<div class="menu_dropdown bk_2" style="display:none">
		<dl id="menu-aaaaa">
			<dt><i class="Hui-iconfont">&#xe616;</i> 二级导航1<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('');?>" data-title="资讯管理" href="javascript:void(0)">article-list三级导航</a></li>
				</ul>
			</dd>
		</dl>
	</div>

	<div class="menu_dropdown bk_2" style="display:none">
		<dl id="menu-bbbbb">
			<dt><i class="Hui-iconfont">&#xe616;</i> 二级导航2<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/User/articleList');?>" data-title="资讯管理" href="javascript:void(0)">三级导航</a></li>
				</ul>
			</dd>
		</dl>
	</div>

	<div class="menu_dropdown bk_2" style="display:none">
		<dl id="menu-ccccc">
			<dt><i class="Hui-iconfont">&#xe616;</i> 二级导航3<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('School/User/articleList');?>" data-title="资讯管理" href="javascript:void(0)">三级导航</a></li>
				</ul>
			</dd>
		</dl>
	</div>-->
</aside>