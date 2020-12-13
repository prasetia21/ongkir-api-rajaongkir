$(document).ready(function () {
        $.getJSON("province.php", function (all_province) {
            if (all_province) {
                $(".all_province").html("<option value=''>Pilih Provinsi</option>");
                $.each(all_province['rajaongkir']['results'], function (key, value) {
                    $(".all_province").append(
                        "<option value='" + value.province_id + "'>" + value.province + "</option>"
                    );
                });
            }
        });
    });

    function get_city_origin(sel) {
        $.getJSON("city.php?id=" + sel.value, function (get_city) {
            if (get_city) {
                $("#city_origin").html("<option value=''>Pilih Kota</option>");
                $.each(get_city['rajaongkir']['results'], function (key, value) {
                    $("#city_origin").append(
                        "<option value='" + value.city_id + "'>" + value.type + " - " + value.city_name + "</option>"
                    );
                });
            }
        });
    }

    function get_city_destination(sel) {
        $.getJSON("city.php?id=" + sel.value, function (get_city) {
            if (get_city) {
                $("#city_destination").html("<option value=''>Pilih Kota</option>");
                $.each(get_city['rajaongkir']['results'], function (key, value) {
                    $("#city_destination").append(
                        "<option value='" + value.city_id + "'>" + value.type + " - " + value.city_name + "</option>"
                    );
                });
            }
        });
    }

    function get_cost(city_origin, city_destination, weight, courier) {
        if(city_origin != '' && city_destination != '' && weight != '' && courier != '') {
            $.getJSON("cost.php?city_origin=" + city_origin + "&city_destination=" + city_destination + "&weight=" + weight + "&courier=" + courier, function (cost) {
                if(cost) {
                    $.each(cost['rajaongkir']['results'], function (key, value) {
                        $("#cost").append(
                            "<strong>" + value.name + "</strong>"
                        );
                    });
                    if(cost['rajaongkir']['results'][0]['costs'].length > 0) {
                        $.each(cost['rajaongkir']['results'][0]['costs'], function(key, value) {
                            $("#detail").append(
                                "<tr>" +
                                "<td>" + value.service + "</td>" +
                                "<td>" + value.description + "</td>" +
                                "<td>" + value.cost[0]['value'] + "</td>" +
                                "<td>" + value.cost[0]['etd'] + "</td>" +
                                "<td>" + value.cost[0]['note'] + "</td>" +
                                "</tr>"
                            );
                        });
                    }
                }
            });
        }
    }