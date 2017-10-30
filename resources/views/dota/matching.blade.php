@extends('demo')
@section('transfer')

<!-- 模板中的foreach begin-->
匹配条件

<div class='table-a'>
<form method='POST' action='matching'>
期望天梯分：<input type='text' name='LadderTournament' placeholder='请输入最低天梯单排分'><br><br>
目的：	<select name='role'>
			<option value='0'>找队友</option>
			<option value='1'>找学生</option>
			<option value='2'>找老师</option>
		</select><br><br>
所属班级类型：	<select name='classType'>
				<option value='0'>选择班级类型</option>
				<option value='1'>萌新班</option>
				<option value='2'>提高班</option>
			</select><br><br>
你所在的班级：	<select name='classNo'>
			<option value='0'>选择班号</option>
			<option value='1'>一班</option>
			<option value='2'>二班</option>
			<option value='3'>三班</option>
			<option value='4'>四班</option>
			<option value='5'>五班</option>
			<option value='6'>六班</option>
			<option value='7'>七班</option>
		</select><br><br>
期望学习内容：	
		<input name='position[]' type='checkbox' value='1'>对线补刀
		<input name='position[]' type='checkbox' value='2'>基础知识
		<input name='position[]' type='checkbox' value='3'>1号位
		<input name='position[]' type='checkbox' value='4'>2号位
		<input name='position[]' type='checkbox' value='5'>3号位
		<input name='position[]' type='checkbox' value='6'>4号位
		<input name='position[]' type='checkbox' value='7'>5号位
		<br><br>
		<input type='submit'>
</form>
<br>
<!-- =====================================结果显示begin========================================= -->
<table width="90%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>ID</td>
		<td>微信</td>
		<td>游戏ID</td>
		<td>游戏昵称</td>
		<td>天梯分</td>
		<td>角色</td>
		<td>班级类型</td>
		<td>班级</td>
		<td>位置</td>
		<!-- <td>内容</td> -->
	</tr>
	<!-- 模板中的foreach begin -->
	@foreach($dotausers as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->wechat}}</td>
		<td>{{$v->DOTAID}}</td>
		<td>{{$v->DOTAName}}</td>
		<td>{{$v->LadderTournament}}</td>
		<td>{{$v->role}}</td>
		<td>{{$v->classType}}</td>
		<td>{{$v->classNo}}</td>
		<td>{{$v->position}}</td>
	</tr>
	@endforeach
	<!-- 模板中的foreach end -->
</table>
<!-- =====================================结果显示end========================================= -->
<hr>
<a href="{{action('DotaUserController@index')}}">返回</a>
</div>



@endsection