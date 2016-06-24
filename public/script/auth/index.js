/**
 * Created by Gavin on 16/2/15.
 */
var deps = [
    "jqueryExt",
    "bootstrap",
    "particlesJS"
];

seajs.use(deps, function() {
    // 切换登录,注册标签时,修改下方滑动块的样式
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if($(e.target).text() === '登录'){
            $('.tab-slider-line').css('left',0);
            $('#id-but-signUp').removeClass('tab_select_add_color');
            $('#id-but-signIn').addClass('tab_select_add_color');
        }else if($(e.target).text() === '注册'){
            $('.tab-slider-line').css('left','6.4rem');
            $('#id-but-signIn').removeClass('tab_select_add_color');
            $('#id-but-signUp').addClass('tab_select_add_color');
        }
    });

    // 点击验证码切换
    $('.group-inputs > .captcha').on('click',function(){
        var url = '/captcha/blog_signUp?' + new Date().getTime();
        $(this).attr('src',url);
    });

    // 登录表单验证与提交
    $('#btn-sign-in').on('click',function(){
        $.ajax({
            url:'/auth/login',
            method:'post',
            cache:false,
            data:$('#form-sign-in').serializeJson(),
            dataType:'json',
            success:function(data){
                window.location.href = data.redirectPath;
            },
            error: function(xhr,testStatus,errorThrown){
                console.log(xhr.responseJSON);
            }
        });

    });

    // 注册表单验证与提交
    $('#btn-sign-up').on('click',function(){
        $.ajax({
            url:'/auth/register',
            method:'post',
            cache:false,
            data:$('#form-sign-up').serializeJson(),
            dataType:'json',
            success:function(data){
                window.location.href = data.redirectPath;
            },
            error:function(xhr,testStatus,errorThrown){
                console.log(xhr.responseJSON);
            }
        });
    });

    // 粒子初始化,加载json文件
    //particlesJS.load('particles-js', '/script/config/particlesJS-signInUp.json', function() {});

    // 粒子初始化,直接填写参数
    particlesJS(
        'particles-js',
        {
            "particles": {
                "number": {
                    "value": 2,
                    "density": {
                        "enable": true,
                        "value_area": 100
                    }
                },
                "color": {
                    "value": "#CCCCCC"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 18,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 80,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 600,
                    "color": "#CCCCCC",
                    "opacity": 0.5,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 400,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 400,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        }
    );
});