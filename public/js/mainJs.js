
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    var local = (returnCitySN["cip"]+','+returnCitySN["cname"])
    /*console.log('\n' +
        '/**\n' +
        ' * ┌───┐   ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┬───┐ ┌───┬───┬───┐\n' +
        ' * │Esc│   │ F1│ F2│ F3│ F4│ │ F5│ F6│ F7│ F8│ │ F9│F10│F11│F12│ │P/S│S L│P/B│  ┌┐    ┌┐    ┌┐\n' +
        ' * └───┘   └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┴───┘ └───┴───┴───┘  └┘    └┘    └┘\n' +
        ' * ┌───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───────┐ ┌───┬───┬───┐ ┌───┬───┬───┬───┐\n' +
        ' * │~ `│! 1│@ 2│# 3│$ 4│% 5│^ 6│& 7│* 8│( 9│) 0│_ -│+ =│ BacSp │ │Ins│Hom│PUp│ │N L│ / │ * │ - │\n' +
        ' * ├───┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─────┤ ├───┼───┼───┤ ├───┼───┼───┼───┤\n' +
        ' * │ Tab │ Q │ W │ E │ R │ T │ Y │ U │ I │ O │ P │{ [│} ]│ | \\ │ │Del│End│PDn│ │ 7 │ 8 │ 9 │   │\n' +
        ' * ├─────┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴─────┤ └───┴───┴───┘ ├───┼───┼───┤ + │\n' +
        ' * │ Caps │ A │ S │ D │ F │ G │ H │ J │ K │ L │: ;│" \'│ Enter  │               │ 4 │ 5 │ 6 │   │\n' +
        ' * ├──────┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴────────┤     ┌───┐     ├───┼───┼───┼───┤\n' +
        ' * │ Shift  │ Z │ X │ C │ V │ B │ N │ M │< ,│> .│? /│  Shift   │     │ ↑ │     │ 1 │ 2 │ 3 │   │\n' +
        ' * ├─────┬──┴─┬─┴──┬┴───┴───┴───┴───┴───┴──┬┴───┼───┴┬────┬────┤ ┌───┼───┼───┐ ├───┴───┼───┤ E││\n' +
        ' * │ Ctrl│    │Alt │         Space         │ Alt│    │    │Ctrl│ │ ← │ ↓ │ → │ │   0   │ . │←─┘│\n' +
        ' * └─────┴────┴────┴───────────────────────┴────┴────┴────┴────┘ └───┴───┴───┘ └───────┴───┴───┘\n' +
        ' \n')*/
    const id = $('#id1')
    const idCon = id.val()
    const cookieName = id.attr('class') + 'add' + idCon
    var reLocal = ''
    console.log(cookieName)
    var date = new Date();
    date.setTime(date.getTime()+30*60*1000);
    if ($.cookie('cookieName') == null){
        $.ajax({
            type: "POST",
            url: "/",
            dataType: 'json',
            data: {
                "cookieName":"cookieName",
                'time':date,
                'local':local,
            },
            success: function (data) {
                if (data.code === 'success'){
                    console.log('success');
                    console.log(data.aData,',',data.local);
                    $("#Welcome").html('欢迎访问,',data.local);
                }
                else {
                    alert('register fail');
                }
            },
            error: function(request, status, error){
                alert(error);
            },
        })
        $.cookie('cookieName',cookieName,{expires:date})
    }
    $.cookie('cookieName',cookieName,{expires:date})
    console.log('s+1',)
    console.log(reLocal)

})
