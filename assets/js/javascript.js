$(document).ready(function () {





    var idleTime = 0;


    // var idleInterval = setInterval(timerIncrement, 1000); 


    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });


    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 120) {

            $(this).mousemove(function (e) {
                window.location.reload();
            });
            $(this).keypress(function (e) {
                window.location.reload();
            });
            $(this).click(function (e) {
                window.location.reload();
            });
        }
    }








    $('.table-cell').each(function () {

        if ($(this).find('.pp').text() == '/') {
            $(this).find('.pp').css('font-size', '0px')
            //$(this).css('background-color','white')

        }

    });
















    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }




    $('.dropbtn').mouseover(function () {
        if (getCookie('mode') == 'light') {

            $(this).find('svg').attr('fill', 'white')

        }

    });



    $('.dropbtn').mouseout(function () {
        if (getCookie('mode') == 'light') {

            $(this).find('svg').attr('fill', 'black')

        }

    });



    if (typeof er !== 'undefined') {
        if (er == 'pass') { document.getElementById("err1").style.display = "block"; }
        if (er == 'unactive') { document.getElementById("err2").style.display = "block"; }
        if (er == 'no_pass') { document.getElementById("err3").style.setProperty('display', 'block'); }
    }

    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("myModal3");
    var modal4 = document.getElementById("myModal4");
    var modal_demand = document.getElementById("myModal_demand");
    var modal5 = document.getElementById("suc");
    var modal6 = document.getElementById("suc2");
    var modal7 = document.getElementById("suc3");


    $('.the_special').click(function () {
        window.location.reload();
    });


    $('.close').click(function () {
        $('#myModal').fadeOut('');
        $('#myModal2').fadeOut('');
        $('#myModal3').fadeOut('');
        $('#myModal4').fadeOut('');
        $('#modal').fadeOut('');
        $('#myModal_demand').fadeOut('');
        $('#suc').fadeOut('');
        $('#suc2').fadeOut('');
        $('#suc3').fadeOut('');


    });







    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";

            $('.modal.fade').hide();

            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
            //window.location.reload();
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
            //window.location.reload();
        }
        if (event.target == modal3) {
            modal3.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }
        if (event.target == modal4) {
            modal4.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }
        if (event.target == modal_demand) {
            modal_demand.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }
        if (event.target == modal5) {
            modal5.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }
        if (event.target == modal6) {
            modal6.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }
        if (event.target == modal7) {
            modal7.style.display = "none";
            //window.location.reload();
            $('#reserve').off();
            $('#reserve2').off();
            $('#reserve3').off();
            $('#send_demand').off();
        }



    }





    var ffzzffzzffzz = $('.date-input').val();
    $('.date-input').change(function () {
        var day = new Date(this.value).getUTCDay();

        /*  const picker = document.getElementById('pure-date');
          picker.addEventListener('input', function(e){*/
        var day = new Date(this.value).getUTCDay();
        if ([5, 6].includes(day)) {
            //e.preventDefault();

            // this.value = '';
            this.value = ffzzffzzffzz;
            alert('Weekends not allowed');

        } else {
            this.form.submit();

        }/*
        });*/


    });

    $('.date-input').keypress(function (e) {
        $(this).off('change blur');

        $(this).blur(function () {
            this.form.submit();
        });

        if (e.keyCode === 13) {





            var day = new Date(this.value).getUTCDay();
            if ([5, 6].includes(day)) {
                e.preventDefault();
                this.value = ffzzffzzffzz;
                alert('Weekends not allowed');
            } else {
                this.form.submit();

            }



        }
    });











    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }




    $("#change_the_mode").click(function () {


        $("#some_some").value = 'ff';
        $("#mode_hidden_form").submit()
    });



    var colors = colors_array.split('|');

    for (let i = 1; i <= 80; i++) {

        if (document.getElementById("cell" + i) !== null) {

            for (let j = 0; j < colors.length; j++) {

                if (document.getElementById("cell" + i).innerText == colors[j]) {

                    document.getElementById("cell" + i).parentElement.style.setProperty('background-color', '#' + colors[j + 1] + '60', 'important');
                    document.getElementById("cell" + i).parentElement.style.setProperty('opacity', '1', 'important');
                    document.getElementById("cell" + i).parentElement.style.setProperty('border-left', '5px solid #' + colors[j + 1], 'important');

                }

            }
        }
    }





    for (let i = 1; i <= 480; i++) {
        if (document.getElementById("box" + i) !== null) {

            for (let j = 0; j < colors.length; j++) {

                if (document.getElementById("box" + i).innerText == colors[j]) {

                    document.getElementById("box" + i).parentElement.style.setProperty('background-color', '#' + colors[j + 1] + '60', 'important');
                    document.getElementById("box" + i).parentElement.style.setProperty('opacity', '1', 'important');
                    document.getElementById("box" + i).parentElement.style.setProperty('border-left', '5px solid #' + colors[j + 1], 'important');
                }


            }
        }
    }
    for (let i = 1; i <= 480; i++) {
        if (document.getElementById("square" + i) !== null) {

            for (let j = 0; j < colors.length; j++) {

                if (document.getElementById("square" + i).innerText == colors[j]) {

                    document.getElementById("square" + i).parentElement.style.setProperty('background-color', '#' + colors[j + 1] + '60', 'important');
                    document.getElementById("square" + i).parentElement.style.setProperty('opacity', '1', 'important');
                    document.getElementById("square" + i).parentElement.style.setProperty('border-left', '5px solid #' + colors[j + 1], 'important');

                }

            }
        }
    }


    if (typeof localStorage.getItem("table_display") !== 'undefined') {





        $('#the_display').val(localStorage.getItem("table_display"));



        if (document.getElementById('the_display').value == 'amphi') {
            //  document.getElementById("dis_amphi1").style.display='';
            document.getElementById("dis_amphi").style.display = '';

            document.getElementById("dis_td").style.display = 'none';
            document.getElementById("dis_tp").style.display = 'none';



        } else if (document.getElementById('the_display').value == 'td') {


            document.getElementById("dis_td").style.display = '';
            //  document.getElementById("dis_amphi1").style.display='none';
            document.getElementById("dis_amphi").style.display = 'none';
            document.getElementById("dis_tp").style.display = 'none';


        } else if (document.getElementById('the_display').value == 'tp') {

            document.getElementById("dis_tp").style.display = '';
            // document.getElementById("dis_amphi1").style.display='none';
            document.getElementById("dis_amphi").style.display = 'none';
            document.getElementById("dis_td").style.display = 'none';


        } else if (document.getElementById('the_display').value == 'all') {

            document.getElementById("dis_tp").style.display = '';
            // document.getElementById("dis_amphi1").style.display='';
            document.getElementById("dis_amphi").style.display = '';
            document.getElementById("dis_td").style.display = '';

        }

    }



    $('#the_display').on('change', function () {
        localStorage.setItem("table_display", document.getElementById('the_display').value);


        if (document.getElementById('the_display').value == 'amphi') {
            // document.getElementById("dis_amphi1").style.display='';
            document.getElementById("dis_amphi").style.display = '';

            document.getElementById("dis_td").style.display = 'none';
            document.getElementById("dis_tp").style.display = 'none';



        } else if (document.getElementById('the_display').value == 'td') {


            document.getElementById("dis_td").style.display = '';
            // document.getElementById("dis_amphi1").style.display='none';
            document.getElementById("dis_amphi").style.display = 'none';
            document.getElementById("dis_tp").style.display = 'none';


        } else if (document.getElementById('the_display').value == 'tp') {

            document.getElementById("dis_tp").style.display = '';
            //  document.getElementById("dis_amphi1").style.display='none';
            document.getElementById("dis_amphi").style.display = 'none';
            document.getElementById("dis_td").style.display = 'none';


        } else if (document.getElementById('the_display').value == 'all') {

            document.getElementById("dis_tp").style.display = '';
            // document.getElementById("dis_amphi1").style.display='';
            document.getElementById("dis_amphi").style.display = '';
            document.getElementById("dis_td").style.display = '';

        }


    });


    $(".trash").click(function () {
        $(this).remove();
    });



    var the_border;
    var the_text;
    if (new Date($('.form-control.date-input').val()).setHours(0, 0, 0, 0) >= new Date().setHours(0, 0, 0, 0)) {

        if (typeof user1 !== 'undefined') {
            $(".table-cell").mouseover(function () {


                var tt = $(this).find(".pp").text();

                if (($(this).find(".pp").attr('class').split(' ')[1]) == 'special') {

                    if (tt == '/') {
                        $(this).find(".demand").css("opacity", "100");
                    } else {

                        $(this).find(".contact").css("opacity", "100");
                    }

                } else {



                    if (tt == '/') {
                        $(this).find(".reservation").css("opacity", "100");
                    } else {
                        $(this).find(".contact").css("opacity", "100");

                        the_border = $(this).css("border-left");
                        the_text = $(this).find(".pp").text();
                        $(this).css("border-left", "");


                    }



                }



            });
        }

    }






    $(".table-cell").mouseout(function () {
        var tt = $(this).find(".pp").text();
        $(this).find(".reservation").css("opacity", "0");
        $(this).find(".contact").css("opacity", "0");

        $(this).find(".demand").css("opacity", "0");
        if (tt == the_text) {
            $(this).css("border-left", the_border);
        }
    });






    $(".sub1").click(function () {
        $('#ff1').submit();

    });



    $(".trash").click(function () {
        $(this).remove();
    });


    var aff = []


    $('.table-cell').each(function () {

        if ($(this).find('.pp').text() == user1) {

            //alert(($(this).find('.pp').attr('id').match(/(\d+)/)[0])%times);
            aff.push(($(this).find('.pp').attr('id').match(/(\d+)/)[0]) % times);

        }

    });

    if (new Date($('.form-control.date-input').val()).setHours(0, 0, 0, 0) >= new Date().setHours(0, 0, 0, 0)) {
        if (typeof user1 !== 'undefined') {



            $(".table-cell").click(function () {
                var the_getter = $(this).find('.pp').text();
                var hhll = $(this).find('.pp').attr("id");

                $('#some_reciever').val(the_getter);
                $('#some_cell').val(hhll);

                //here to disallow 2res on same time
                if (!aff.includes(($(this).find('.pp').attr('id').match(/(\d+)/)[0]) % times)) {



                    var date = new Date($('.form-control.date-input').val());
                    var date_txt = (date.getFullYear() + '-'
                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                        + ('0' + date.getDate()).slice(-2));
                    $('#some_date').val(date_txt);

                    var tt = $(this).find(".pp").text();
                    var id = $(this).find('.pp').attr('id');

                    if (($(this).find(".pp").attr('class').split(' ')[1]) == 'special') {

                        if (tt == '/') {
                            $(".modal_demand").css("display", "block");




                            $('#send_demand').click(function () {



                                if ($('#mp1').is(":checked")) { var ffg1 = ($('#dev_cell1').val()); } else { var ffg1 = 'none'; }
                                if ($('#mp2').is(":checked")) { var ffg2 = ($('#dev_cell2').val()); } else { var ffg2 = 'none'; }
                                if ($('#mp3').is(":checked")) { var ffg3 = ($('#dev_cell3').val()); } else { var ffg3 = 'none'; }
                                if ($('#mp4').is(":checked")) { var ffg4 = ($('#dev_cell4').val()); } else { var ffg4 = 'none'; }



                                $('#mp1').prop('checked', false);
                                $('#mp2').prop('checked', false);
                                $('#mp3').prop('checked', false);
                                $('#mp4').prop('checked', false);





                                $.ajax({
                                    type: "POST",
                                    url: "../controllers/send_demand",
                                    data: {

                                        'cell': id,
                                        'date': date_txt,
                                        'de1': ffg1,
                                        'de2': ffg2,
                                        'de3': ffg3,
                                        'de4': ffg4,






                                    },
                                    success: function (msg) {
                                        // $('.fzefzef').html(msg);
                                        $(".modal_demand").hide();
                                        $(".suc3").fadeIn();
                                        setTimeout(function () {

                                            $(".suc3").fadeOut();

                                        }, 2500);
                                    }

                                });
                                $(this).unbind('click');


                            });



                        } else {
                            var date = new Date($('.form-control.date-input').val());
                            var date_txt = (date.getFullYear() + '-'
                                + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                + ('0' + date.getDate()).slice(-2));
                            $('#some_date').val(date_txt);




                            $.ajax({
                                type: "POST",
                                url: "../controllers/msg_modal",
                                data: {

                                    'name2': $(this).find('.pp').text(),







                                },
                                success: function (msg) {
                                    $('.herehere').html(msg);
                                    $(".suc").fadeIn();
                                    setTimeout(function () {

                                        $(".suc").fadeOut();

                                    }, 2500);
                                }
                            });




                            $(".modal2").css("display", "block");



                        }
                    } else {








                        if (id.charAt(0) == 'c') {
                            if (tt == '/') {
                                //  $(this).find('.pp').text(user1);

                                $(".modal").css("display", "block");


                                var tts = $(this);
                                $("#reserve").click(function () {



                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));

                                    $('#some_date').val(date_txt);


                                    if ($('#dev_cell1').is(":checked")) { var fg1 = ($('#dev_cell1').val()); } else { var fg1 = 'none'; }
                                    if ($('#dev_cell2').is(":checked")) { var fg2 = ($('#dev_cell2').val()); } else { var fg2 = 'none'; }
                                    if ($('#dev_cell3').is(":checked")) { var fg3 = ($('#dev_cell3').val()); } else { var fg3 = 'none'; }
                                    if ($('#dev_cell4').is(":checked")) { var fg4 = ($('#dev_cell4').val()); } else { var fg4 = 'none'; }



                                    $('#dev_cell1').prop('checked', false);
                                    $('#dev_cell2').prop('checked', false);
                                    $('#dev_cell3').prop('checked', false);
                                    $('#dev_cell4').prop('checked', false);


                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/make_res",
                                        data: {
                                            'name': user1,
                                            'date': date_txt,
                                            'id': id,
                                            'de1': fg1,
                                            'de2': fg2,
                                            'de3': fg3,
                                            'de4': fg4,




                                        },
                                        success: function (msg) {
                                            $(".suc2").fadeIn();
                                            setTimeout(function () {

                                                $(".suc2").fadeOut();

                                            }, 2500);
                                        }
                                    });



                                    tts.find('.pp').text(user1);
                                    $(this).unbind('click');
                                    var ins = colors.indexOf(user1);
                                    document.getElementById(id).parentElement.style.setProperty('background-color', '#' + colors[ins + 1] + '60', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('opacity', '1', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('border-left', '5px solid #' + colors[ins + 1], 'important');


                                    $(".modal").css("display", "");

                                    aff.push((tts.find('.pp').attr('id').match(/(\d+)/)[0]) % times);


                                    document.getElementById(id).style.setProperty('font-size', '12px', 'important');




                                    $('.table-row').not('table-head').each(function () {
                                        $(this).find('.table-cell').each(function () {

                                            if (!$(this).find('.pp').text() == '') {


                                                if (($(this).find('.pp').text()) == ($(this).next().find('.pp').text()) && ($(this).find('.pp').text()) != '/') {









                                                    // $(this).find('.pp').css('white-space', 'nowrap ');


                                                    $(this).css('border-right', ' red  ');


                                                    $(this).next().find('.pp').css({ "font-size": "0px" });
                                                    $(this).next().css('border-left', '');

                                                }

                                            }
                                        });

                                    });


                                });


                            } else {
                                if ($(this).hasClass("first-cell")) {
                                    console.log("sd");
                                } else {
                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));
                                    $('#some_date').val(date_txt);





                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/msg_modal",
                                        data: {

                                            'name2': $(this).find('.pp').text(),
                                            // 'id': $(this).find('.pp').attr("id")








                                        },
                                        success: function (msg) {
                                            $('.herehere').html(msg).load('.herehere');

                                        }
                                    });


                                    $(".modal2").css("display", "block");
                                    //document.getElementById("oko").focus(); 











                                }
                            }
                        } else if (id.charAt(0) == 'b') {

                            if (tt == '/') {
                                //$(this).find('.pp').text(user1);

                                $(".modal3").css("display", "block");
                                var tts = $(this);
                                $("#reserve2").click(function () {
                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));
                                    $('#some_date').val(date_txt);



                                    if ($('#dev_box1').is(":checked")) { var fg1 = ($('#dev_box1').val()); } else { var fg1 = 'none'; }
                                    if ($('#dev_box2').is(":checked")) { var fg2 = ($('#dev_box2').val()); } else { var fg2 = 'none'; }
                                    if ($('#dev_box3').is(":checked")) { var fg3 = ($('#dev_box3').val()); } else { var fg3 = 'none'; }
                                    if ($('#dev_box4').is(":checked")) { var fg4 = ($('#dev_box4').val()); } else { var fg4 = 'none'; }

                                    $('#dev_box1').prop('checked', false);
                                    $('#dev_box2').prop('checked', false);
                                    $('#dev_box3').prop('checked', false);
                                    $('#dev_box4').prop('checked', false);




                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/make_res",
                                        data: {
                                            'name': user1,
                                            'date': date_txt,
                                            'id': id,
                                            'de1': fg1,
                                            'de2': fg2,
                                            'de3': fg3,
                                            'de4': fg4,




                                        },
                                        success: function (msg) {
                                            $(".suc2").fadeIn();
                                            setTimeout(function () {

                                                $(".suc2").fadeOut();

                                            }, 2500);
                                        }
                                    });

                                    tts.find('.pp').text(user1);
                                    $(this).unbind('click');
                                    var ins = colors.indexOf(user1);
                                    document.getElementById(id).parentElement.style.setProperty('background-color', '#' + colors[ins + 1] + '60', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('opacity', '1', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('border-left', '5px solid #' + colors[ins + 1], 'important');

                                    document.getElementById(id).style.setProperty('font-size', '12px', 'important');



                                    $(".modal3").css("display", "");

                                    aff.push((tts.find('.pp').attr('id').match(/(\d+)/)[0]) % times);



                                    $('.table-row').not('table-head').each(function () {
                                        $(this).find('.table-cell').each(function () {

                                            if (!$(this).find('.pp').text() == '') {


                                                if (($(this).find('.pp').text()) == ($(this).next().find('.pp').text()) && ($(this).find('.pp').text()) != '/') {
                                                    $(this).css('border-right', ' red  ');
                                                    $(this).next().find('.pp').css({ "font-size": "0px" });
                                                    $(this).next().css('border-left', '');
                                                }
                                            }
                                        });
                                    });
                                });
                            } else {
                                if ($(this).hasClass("first-cell")) {
                                    console.log("sd");
                                } else {
                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));
                                    $('#some_date').val(date_txt);

                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/msg_modal",
                                        data: {
                                            'name2': $(this).find('.pp').text()
                                        },
                                        success: function (msg) {
                                            $('.herehere').html(msg);
                                        }
                                    });
                                    $(".modal2").css("display", "block");
                                }
                            }
                        } else if (id.charAt(0) == 's') {
                            if (tt == '/') {
                                $(".modal4").css("display", "block");
                                var tts = $(this);
                                $("#reserve3").click(function () {
                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));
                                    $('#some_date').val(date_txt);

                                    if ($('#dev_square1').is(":checked")) { var fg1 = ($('#dev_square1').val()); } else { var fg1 = 'none'; }
                                    if ($('#dev_square2').is(":checked")) { var fg2 = ($('#dev_square2').val()); } else { var fg2 = 'none'; }
                                    if ($('#dev_square3').is(":checked")) { var fg3 = ($('#dev_square3').val()); } else { var fg3 = 'none'; }
                                    if ($('#dev_square4').is(":checked")) { var fg4 = ($('#dev_square4').val()); } else { var fg4 = 'none'; }

                                    $('#dev_square1').prop('checked', false);
                                    $('#dev_square2').prop('checked', false);
                                    $('#dev_square3').prop('checked', false);
                                    $('#dev_square4').prop('checked', false);

                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/make_res",
                                        data: {
                                            'name': user1,
                                            'date': date_txt,
                                            'id': id,
                                            'de1': fg1,
                                            'de2': fg2,
                                            'de3': fg3,
                                            'de4': fg4,
                                        },
                                        success: function (msg) {
                                            $(".suc2").fadeIn();
                                            setTimeout(function () {

                                                $(".suc2").fadeOut();

                                            }, 2500);
                                        }
                                    });

                                    tts.find('.pp').text(user1);
                                    $(this).unbind('click');
                                    var ins = colors.indexOf(user1);
                                    document.getElementById(id).parentElement.style.setProperty('background-color', '#' + colors[ins + 1] + '60', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('opacity', '1', 'important');
                                    document.getElementById(id).parentElement.style.setProperty('border-left', '5px solid #' + colors[ins + 1], 'important');
                                    document.getElementById(id).style.setProperty('font-size', '12px', 'important');
                                    $(".modal4").css("display", "");
                                    aff.push((tts.find('.pp').attr('id').match(/(\d+)/)[0]) % times);
                                    $('.table-row').not('table-head').each(function () {
                                        $(this).find('.table-cell').each(function () {
                                            if (!$(this).find('.pp').text() == '') {
                                                if (($(this).find('.pp').text()) == ($(this).next().find('.pp').text()) && ($(this).find('.pp').text()) != '/') {
                                                    $(this).css('border-right', ' red  ');
                                                    $(this).next().find('.pp').css({ "font-size": "0px" });
                                                    $(this).next().css('border-left', '');

                                                }
                                            }
                                        });
                                    });
                                });
                            } else {
                                if ($(this).hasClass("first-cell")) {
                                    console.log("sd");
                                } else {
                                    var date = new Date($('.form-control.date-input').val());
                                    var date_txt = (date.getFullYear() + '-'
                                        + ('0' + (date.getMonth() + 1)).slice(-2) + '-'
                                        + ('0' + date.getDate()).slice(-2));
                                    $('#some_date').val(date_txt);
                                    $.ajax({
                                        type: "POST",
                                        url: "../controllers/msg_modal",
                                        data: {
                                            'name2': $(this).find('.pp').text(),
                                        },
                                        success: function (msg) {
                                            $('.herehere').html(msg);
                                        }
                                    });
                                    $(".modal2").css("display", "block");
                                }
                            }
                        }
                    }
                } else {
                    alert('you cant reserve 2 classes at the same time');
                }
            });
        }
    }


















    $("#send").click(function () {
        document.getElementById('send_msg').submit()
    });






















    $('.table-row').not('table-head').each(function () {
        var co = 0;
        $(this).find('.table-cell').each(function () {
            if (!$(this).find('.pp').text() == '') {
                if (($(this).find('.pp').text()) == ($(this).next().find('.pp').text()) && ($(this).find('.pp').text()) != '/') {
                    co++;
                    $(this).css('border-right', ' red  ');
                    $(this).next().find('.pp').css({ "font-size": "0px" });
                    $(this).next().css('border-left', '');

                }

            }
        });
    });


    $('.herehere').on('click', '#send_the_mesg', function () {

        $.ajax({
            type: "POST",
            url: "../controllers/send_msg",
            data: {
                'sender': user1,
                'reciever': $('#some_reciever').val(),
                'msg': $('.msg_box').val(),
                'date': $('#some_date').val(),
                'cell': $('#some_cell').val(),





            },
            success: function (msg) {
                $(".modal2").hide();

                $(".suc").fadeIn();
                setTimeout(function () {

                    $(".suc").fadeOut();

                }, 2500);

            }
        });


        $(this).unbind('click');
    });

});