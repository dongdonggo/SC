


var allFunction = function(){
    var self =  this;
    self.searchHover =  function(event,iObj){
        event.addClass('search_input_hover');
        iObj.addClass('iconSearch_hover');
    };
    self.searchNoHover =  function(event,iObj){
        event.removeClass('search_input_hover');
        iObj.removeClass('iconSearch_hover');
    };
    self.gotoTop = function(min_height){
        var gotoTop_html = '<a href="javascript:void(0)" title="回到顶部" id="backTop"><i class="backTopIcon"></i></a>';
        $("#content").append(gotoTop_html);
        $("#backTop").click(
            function(){$('html,body').animate({scrollTop:0},400);
        }).hover(
            function(){$(this).addClass("hover");},
            function(){$(this).removeClass("hover");
        });
        min_height ? min_height = min_height : min_height = 20;
        $(window).scroll(function(){
            var s = $(window).scrollTop();
            if( s > min_height){
                $("#backTop").fadeIn(100);
            }else{
                $("#backTop").fadeOut(200);
            };
        });        
    };



    // 选项卡切换
    self.tab = function(event){
      event.on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
        var index = event.index(this);
        $('div.tab_content > div').eq(index).show(100).siblings().hide();
      }).hover(function(){
        $(this).addClass('hover');
      },function(){
        $(this).removeClass('hover');
      });
    };
    // 爱心点击
    self.clickLove = function(event){
        event.hasClass('dontLike')?event.removeClass('dontLike').addClass('like'):event.removeClass('like').addClass('dontLike');
    };
    // 翻页效果
    self.page = function(index){
        index = index || 1;
        index > 1?$('.prePage').addClass('prePage_next') : $('.prePage').removeClass('prePage_next');
    };
    // 搜素小图标 变换
    self.search_icon_style =  function(obj){
        if(obj.val().length > 0){
            obj.addClass('search_input_hover');
            obj.parent().find('.iconSearch').addClass('iconSearch_hover');
        }else{
            obj.parent().find('.iconSearch').removeClass('iconSearch_hover');
        }
    }
    return self;
}

var v = allFunction();
var iObj;

// function popup(popupName){ 
// _windowHeight = $("#wrap").height(),//获取当前窗口高度 
// _windowWidth = $("#wrap").width(),//获取当前窗口宽度 
// _popupHeight = popupName.height(),//获取弹出层高度 
// _popupWeight = popupName.width();//获取弹出层宽度 
// _posiTop = (_windowHeight - _popupHeight)/2; 
// _posiLeft = (_windowWidth - _popupWeight)/2; 
// popupName.css({"left": _posiLeft + "px","top":_posiTop + "px","display":"block"});//设置position 
// } 
// $(function(){ 
// popup($(".alertWindow")); 



$(document).ready(function(){
    $("#backTop").css('display','none');
    // 第二个一级菜单
    $('.sideBar_Menu2 ul li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


    //带文字描述的input框
    function inputval(){
        $(".search_input").each(function(){
            triggerPlaceHolder(this);
            v.search_icon_style($(this));
        }).live('keyup', function(){
            triggerPlaceHolder(this);
            $(this).addClass('search_input_hover');
            v.search_icon_style($(this));
            
        }).live('blur', function(){
            triggerPlaceHolder(this);
            $(this).removeClass('search_input_hover');
            v.search_icon_style($(this));

        }).live('focus', function(){
            $(this).addClass('search_input_hover');
            v.search_icon_style($(this));
        }).live('mouseover',function(){
            // $(this).next("span").css('color','#fff');
        }).live('mouseout',function(){
            $(this).next("span").css('color','#808080');
        });

        $(".input_span").live("click", function(){
            $(this).prev(".search_input").focus();
        });  
    }

    function triggerPlaceHolder(obj){
        if($(obj).val() !== ""){
            $(obj).next("span").hide();
        }else{
            $(obj).next("span").show();
        }
    }
    inputval();

    // 返回顶部
    v.gotoTop(30);
    // input进入焦点
    $("input").focus(function(){
        $(this).val('');
    });

    // 大图标Hover效果
    var sonObj,sonClass;
    $('.no_link').click(function(eve){
        eve.preventDefault();
    });


    // $('.share_click').hover(function(){
    //     $(this).find('.share_channel').show().stop().animate({left:'80'},80);
    // },function(){
    //     // $(this).closest('.bzOrStepIcon').find('.share_channel').hide().stop().animate({left:'240'},80);
    // });
    

    // 通用点赞
    $('.like_item').click(function(){
        var id = $(this).data('id');
        var self = $(this);
        $.ajax({
            type:'post',
            url: '/like',
            data: 'id='+id,
            success:function(data){
                if(data.type == 'like'){

                    if($('.hand_icon').length > 0){
                        self.addClass('active').attr('title','取消点赞！');
                    }else{
                        $('.like_item').attr('title','取消点赞！').addClass('active');
                    }

                    }else{
                        if($('.hand_icon').length > 0){
                            self.removeClass('active').attr('title','点赞！');
                        }else{
                            $('.like_item').attr('title','点赞！').removeClass('active');
                        }
                    }

                if($('.likeText').length > 0){
                    $('.likeNum,.likeCount',self).html(data.count);
                }else{
                    $('.likeNum,.likeCount').html(data.count);
                }
            },
            dataType:'json'
        });
    });
});


    function getClientHeight(){  
        var clientHeight=0;  
        if(document.body.clientHeight&&document.documentElement.clientHeight){  
            var clientHeight=(document.body.clientHeight<document.documentElement.clientHeight)?document.body.clientHeight:document.documentElement.clientHeight;          
        }else{  
            var clientHeight=(document.body.clientHeight>document.documentElement.clientHeight)?document.body.clientHeight:document.documentElement.clientHeight;      
        }  
        return clientHeight;  
    }



    //取窗口滚动条高度
    function getScrollTop(){  
        var scrollTop=0;  
        if(document.documentElement&&document.documentElement.scrollTop){  

            scrollTop=document.documentElement.scrollTop;  

        }else if(document.body){  

            scrollTop=document.body.scrollTop;  
        }  
        return scrollTop;  

    }

    // 取文档内容实际高度

    function getScrollHeight(){  
        return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight);  

    }
    $(window).bind("scroll",function() {  
        var height=getClientHeight();

        var theight=getScrollTop();

        var rheight=getScrollHeight();

        var bheight=rheight-theight-height;

        if((height+bheight) > 993){
            var endHeight = 20;
            $('#sideBar').css('position','fixed'); 
            $('#sideBar').css('top',endHeight+'px');             
        }else{
            var endHeight = (height+bheight)-925;
            $('#sideBar').css('position','fixed'); 
            $('#sideBar').css('top',endHeight+'px'); 
        }            

        // document.getElementById('show').innerHTML='此时浏览器可见区域高度为：'+height+'<br />此时文档内容实际高度为：'+rheight+'<br />此时滚动条距离顶部的高度为：'+theight+'<br />此时滚动条距离底部的高度为：'+bheight;
        // 
    });
