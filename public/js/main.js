$(document).ready(function(){
  $(".input-transparent").focus(function(e){
    $(".input-transparent").addClass("border_focus");
  })

  $(".input-transparent").focusout(function(e){
    $(".input-transparent").removeClass("border_focus");
  })

  $("#finish_signup").click(function(){
    $("#register_form").submit();
  })
  set_height();
  function set_height(){
    
    var width = $(window).width();
    var height = $(window).height();
    var boxheight = height / 2 - 258;
    $(".create_company_title").css('margin-top', boxheight + 'px');
    if( width <= 720)
    {
      $(".bg-widget").hide();
      $(".signup_right label").hide();
      var loginwidth = $(".widget.login-widget").width() - 20;
      $(".signup_right").css('left', loginwidth + 'px');
      $("#login").css("margin-left", "0px");
      if(width <= 600)
      {
        loginwidth = $(window).width() - 130;
        $(".signup_right").css('left', loginwidth + 'px');
      }
    }
    else
    {
      $("#login").css("margin-left", "28px");
      $(".signup_right").css('left', 'inherit');
      $(".signup_right label").show();
      $(".bg-widget").show();
    }
    $('body').css('width', width + 'px');
    $('body').css('height', height + 'px');
    $(".widget.login-widget").css('height', (height - 34) + 'px')
    $(".bg-widget").css('height', height + 'px')
  }
  $( window ).resize(function() {
    set_height();
  });
})