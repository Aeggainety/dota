@extends('create')
@section('container')

    <div class="container">
        <div class="row">
            <!-- form: -->
            <section>
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <h2>添加信息</h2>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" action="store">
                        

                        <div class="form-group">
                            <label class="col-lg-3 control-label">微信：</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="wechat" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">游戏ID：</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="DOTAID" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">游戏昵称：</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="DOTAName" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">天梯分：</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="LadderTournament" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">角色：</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="role" data-bv-notempty data-bv-notempty-message="The role is required">
                                    <option value="">-- Select a role --</option>
                                    <option value="1">学生</option>
                                    <option value="2">老师</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-lg-3 control-label">班级类型：</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="classType" data-bv-notempty data-bv-notempty-message="The classType is required">
                                    <option value="">-- Select a classType --</option>
                                    <option value="1">萌新班</option>
                                    <option value="2">提高班</option>
                                </select>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label class="col-lg-3 control-label">班级：</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="classNo" data-bv-notempty data-bv-notempty-message="The classNo is required">
                                    <option value="">-- Select a class --</option>
                                    <option value="1">一班</option>
                                    <option value="2">二班</option>
                                    <option value="3">三班</option>
                                    <option value="4">四班</option>
                                    <option value="5">五班</option>
                                    <option value="6">六班</option>
                                    <option value="7">七班</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">位置：</label>
                            <div class="col-lg-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="1" /> 对线补刀
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="2" /> 基础知识
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="3" /> 1号位
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="4" /> 2号位
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="5" /> 3号位
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="6" /> 4号位
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="position[]" value="7" /> 5号位
                                    </label>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-3 control-label" id="captchaOperation"></label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="captcha" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
                                <a href="{{action('DotaUserController@index')}}"><button type="button" class="btn btn-info">return</button></a>
                                <button type="button" class="btn btn-info" id="validateBtn">Manual validate</button>
                                <button type="button" class="btn btn-info" id="resetBtn">Reset form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- :form -->
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            wechat: {
                message: 'The wechat is not valid',
                validators: {
                    notEmpty: {
                        message: 'The wechat is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'The wechat must be more than 6 and less than 20 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_-]+$/,
                        message: 'The wechat can only consist of alphabetical, number, dot and underscore'
                    },
                    
                }
            },
            DOTAID: {
                message: 'The DOTAID is not valid',
                validators: {
                    notEmpty: {
                        message: 'The DOTAID is required and cannot be empty'
                    },
                    stringLength: {
                        min: 9,
                        max: 9,
                        message: 'The DOTAID must be 9 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The wechat can only consist of number'
                    },
                    
                }
            },
            DOTAName: {
                message: 'The DOTAName is not valid',
                validators: {
                    notEmpty: {
                        message: 'The DOTAName is required and cannot be empty'
                    },
                    // stringLength: {
                    //     min: 6,
                    //     max: 30,
                    //     message: 'The DOTAName must be more than 6 and less than 30 characters long'
                    // },
                    // regexp: {
                    //     regexp: /^[a-zA-Z0-9_\.]+$/,
                    //     message: 'The DOTAName can only consist of alphabetical, number, dot and underscore'
                    // },
                    
                }
            },
            LadderTournament: {
                message: 'The LadderTournament is not valid',
                validators: {
                    notEmpty: {
                        message: 'The LadderTournament is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'The LadderTournament must be more than 1 and less than 5 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]{1,5}$/,
                        message: 'The wechat can only consist of number'
                    },
                    
                }
            },
            classType: {
                message: 'The classType is not valid',
                validators: {
                    choice: {
                        message: 'Please choose you classType'
                    }
                }
            },
            
            role: {
                message: 'The role is not valid',
                validators: {
                    choice: {
                        message: 'Please choose you role'
                    }
                }
            },
            
            'position[]': {
                validators: {
                    choice: {
                        min: 1,
                        max: 7,
                        message: 'Please choose at least 1 position you want to learn'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>

@endsection