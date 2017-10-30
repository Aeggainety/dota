@extends('demo')
@section('transfer')
    <h1>添加新信息</h1>
    <form method='POST' action='store'>
    	微信：<input type='text' name='wechat' placeholder='请输入微信号'><br><br>
    	游戏ID：<input type='text' name='DOTAID' placeholder='请输入简介'><br><br>
    	游戏昵称：<input type='text' name='DOTAName' placeholder='请输入DOTA昵称'><br><br>
    	天梯分：<input type='text' name='LadderTournament' placeholder='请输入天梯单排分'><br><br>
    	角色：	<select name='role'>
    				<option value='1'>学生</option>
    				<option value='2'>老师</option>
    			</select><br><br>
		班级类型：	<select name='classType'>
						<option value='1'>萌新班</option>
						<option value='2'>提高班</option>
					</select><br><br>
		班级：	<select name='classNo'>
					<option value='1'>一班</option>
					<option value='2'>二班</option>
					<option value='3'>三班</option>
					<option value='4'>四班</option>
					<option value='5'>五班</option>
					<option value='6'>六班</option>
					<option value='7'>七班</option>
				</select><br><br>
		位置：	
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
@endsection