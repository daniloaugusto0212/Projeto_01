$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;

        if (windowSize <= 768) {
            open = false;
        }

        $('.menu-btn').click(function(){
            if(open){
                //O meni está aberto, precisamos fechar e adaptar nosso contúdo geral do painel
                $('.menu').animate({'width':'0'});
                $('.header').animate({'left':'0'});
                $('.header').animate({'width':'100%'});
                $('.content').animate({'left':'0'});
                $('.content').animate({'width':'100%'});
            }else{
                // o menu está fechado
            }
        })
})