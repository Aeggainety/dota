@extends('demo')
@section('transfer')

<!-- 模板中的foreach begin-->
管理员信息

<div class='table-a'>
<table align='center' width="40%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<!-- <td>ID</td> -->
		<td>ID</td>
		<td>用户名</td>
		<td>角色</td>
		<td>更新时间</td>
		<!-- <td>内容</td> -->
	</tr>
	
	@foreach($adminusers as $v)
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
		<!-- <td>{{$v->id}}</td> -->
		<td>{{$v->id}}</td>
		<td>{{$v->username}}</td>
		<td>{{$v->role}}</td>
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