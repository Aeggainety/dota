@extends('demo')
@section('transfer')

<!-- 模板中的foreach begin-->


<div class='table-a'>
<table align='center' width="90%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<!-- <td>ID</td> -->
		<td>微信</td>
		<td>游戏ID</td>
		<td>游戏昵称</td>
		<td>天梯分</td>
		<!-- <td>身份</td>
		<td>班级类型</td>
		<td>班级</td>
		<td>学习内容</td> -->
		<!-- <td>更新时间</td> -->
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
		<!-- <td>{{$v->id}}</td> -->
		<input type='hidden' name='userid' value='{{$v->id}}'>
		<td>{{substr($v->wechat,0,3).'******'}}</td>
		<td>{{$v->DOTAID}}</td>
		<td class='DOTAName' userid='{{$v->id}}'>{{$v->DOTAName}}</td>
		<td>{{$v->LadderTournament}}</td>
		<!-- <td>{{$v->role}}</td>
		<td>{{$v->classType}}</td>
		<td>{{$v->classNo}}</td>
		<td>{{$v->position}}</td> -->
		<!-- <td>{{$v->updated_at}}</td> -->
	</tr>

	@endforeach

</table>
<br>
共{{count($dotausers)}}人<br>
<a href="{{action('DotaUserController@create')}}">登记</a>

<!-- <a href="{{action('DotaUserController@matching')}}">找队友</a> -->
</div>
<script type="text/javascript" src="/dota/public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(".DOTAName").click(function(){
			var td = $(this);
			var txt = td.text();
			var userid = td.attr('userid');
			var input = $("<input type='text' value='"+txt+"'/>");
			td.html(input);
			input.click(function () { return false; });
			input.trigger("focus");
			input.blur(function() {
				var newtxt = $(this).val();
				if (newtxt != txt) {
					td.html(newtxt);
					//ajax异步修改数据库数据
					$.ajax({
						type : "post",
						url : "{{action('DotaUserController@editDotaName')}}",
						data : {
							"userid" : userid,
							"DOTAName" : newtxt
						},
						datatype : "json",
						success : function(data){
							console.log(data);
							if (data == true) {
								alert('修改成功');
							}else{
								alert('修改失败');
							}
						}
					});
				}else {
					td.html(newtxt);
				}
				
			});
		});
	});
</script>
	
<!-- 模板中的foreach end -->

<hr>
@endsection