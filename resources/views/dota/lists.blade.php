@extends('demo')
@section('transfer')

<!-- 模板中的foreach begin-->
用户信息

<div class='table-a'>
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
		<td>提交时间</td>
		<td>更新时间</td>
		<!-- <td>内容</td> -->
	</tr>
	
	@foreach($dotausers as $v)
	<tr>
		<!-- <td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->id}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->wechat}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->DOTAID}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->DOTAName}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->LadderTournament}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->role}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->classType}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->classNo}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->position}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->created_at}}</a></td>
		<td><a href="{{action('DotaUserController@show',[$v->id])}}">{{$v->updated_at}}</a></td> -->
		<td>{{$v->id}}</td>
		<td>{{$v->wechat}}</td>
		<td>{{$v->DOTAID}}</td>
		<td>{{$v->DOTAName}}</td>
		<td>{{$v->LadderTournament}}</td>
		<td>{{$v->role}}</td>
		<td>{{$v->classType}}</td>
		<td>{{$v->classNo}}</td>
		<td>{{$v->position}}</td>
		<td>{{$v->created_at}}</td>
		<td>{{$v->updated_at}}</td>
	</tr>
	@endforeach
</table>
<br>
<a href="{{action('DotaUserController@create')}}">添加新信息</a>
<a href="{{action('DotaUserController@matching')}}">找队友</a>
</div>

	
	
 <!-- 模板中的foreach end -->

<hr>
@endsection