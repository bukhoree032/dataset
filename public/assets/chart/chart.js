Chart.plugins.register({
    afterDatasetsDraw: function(chart, easing) {
        var ctx = chart.ctx;

        chart.data.datasets.forEach(function(dataset, i) {
            var meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function(element, index) {
                    // 値の表示
                    ctx.fillStyle = 'rgb(0, 0, 0,0.8)'; //文字の色
                    var fontSize = 12; //フォントサイズ
                    var fontStyle = 'normal'; //フォントスタイル
                    var fontFamily = 'Arial'; //フォントファミリー
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                    var dataString = dataset.data[index].toString();

                    // 値の位置
                    ctx.textAlign = 'center'; //テキストを中央寄せ
                    ctx.textBaseline = 'middle'; //テキストベースラインの位置を中央揃え

                    var padding = 5; //余白
                    var position = element.tooltipPosition();
                    ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);

                });
            }
        });
    }
});


//=========== อำเภอ ============//
$('#chartAmpher').on('inview', function(event, isInView) { //画面上に入ったらグラフを描画
    if (isInView) {
        var ctx = document.getElementById("chartAmpher"); //グラフを描画したい場所のid
        var AMPHURESum = $("#AMPHURESum").attr("value");
        var AMPHUREYala = $("#AMPHUREYala").attr("value");
        var AMPHURENara = $("#AMPHURENara").attr("value");
        var AMPHUREPat = $("#AMPHUREPat").attr("value");
        var AMPHUREOther = $("#AMPHUREOther").attr("value");
        var AMPHUREYala_percent = (AMPHUREYala * 100 / AMPHURESum).toFixed(2);
        var AMPHURENara_percent = (AMPHURENara * 100 / AMPHURESum).toFixed(2);
        var AMPHUREPat_percent = (AMPHUREPat * 100 / AMPHURESum).toFixed(2);
        var AMPHUREOther_percent = (AMPHUREOther * 100 / AMPHURESum).toFixed(2);
        var chart = new Chart(ctx, {
            type: 'doughnut', //グラフのタイプ
            data: { //グラフのデータ
                labels: ["ยะลา (" + AMPHUREYala + " อำเภอ)", "ปัตตานี (" + AMPHUREPat + " อำเภอ)", "นราธิวาส (" + AMPHURENara + " อำเภอ)", "จังหวัดอื่น ๆ (" + AMPHUREOther + " อำเภอ)", ], //データの名前
                datasets: [{
                    label: "อำเภอ", //グラフのタイトル
                    backgroundColor: ["#fe0000", "#00af50", "#febf00", "#599ad4"], //グラフの背景色
                    data: [AMPHUREYala_percent, AMPHUREPat_percent, AMPHURENara_percent, AMPHUREOther_percent, ] //データ
                }]
            },

            options: { //グラフのオプション
                maintainAspectRatio: false, //CSSで大きさを調整するため、自動縮小をさせない
                cutoutPercentage: 55, //中央からの空円の太さ。グラフの太さ変更
                legend: {
                    display: true //グラフの説明を表示
                },
                tooltips: { //グラフへカーソルを合わせた際の詳細表示の設定
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.labels[tooltipItem.index] + ": " + data.datasets[0].data[tooltipItem.index] + "%"; //%を最後につける
                        }
                    },
                },
                title: { //上部タイトル表示の設定
                    // display: true,
                    // fontSize:10,
                    // text: 'เปอร์เซ็น ：100%'
                },
            }
        });
    }
});

//=========== ตำบล ============//
$('#chartDistricts').on('inview', function(event, isInView) { //画面上に入ったらグラフを描画
    if (isInView) {

        var ctx = document.getElementById("chartDistricts"); //グラフを描画したい場所のid
        var DISTRICTSum = $("#DISTRICTSum").attr("value");
        var DISTRICTYala = $("#DISTRICTYala").attr("value");
        var DISTRICTNara = $("#DISTRICTNara").attr("value");
        var DISTRICTPat = $("#DISTRICTPat").attr("value");
        var DISTRICTOther = $("#DISTRICTOther").attr("value");
        var DISTRICTYala_percent = (DISTRICTYala * 100 / DISTRICTSum).toFixed(2);
        var DISTRICTNara_percent = (DISTRICTNara * 100 / DISTRICTSum).toFixed(2);
        var DISTRICTPat_percent = (DISTRICTPat * 100 / DISTRICTSum).toFixed(2);
        var DISTRICTOther_percent = (DISTRICTOther * 100 / DISTRICTSum).toFixed(2);
        var chart = new Chart(ctx, {
            type: 'doughnut', //グラフのタイプ
            data: { //グラフのデータ
                labels: ["ยะลา (" + DISTRICTYala + " ตำบล)", "ปัตตานี (" + DISTRICTPat + " ตำบล)", "นราธิวาส (" + DISTRICTNara + " ตำบล)", "จังหวัดอื่น ๆ (" + DISTRICTOther + " ตำบล)", ], //データの名前
                datasets: [{
                    label: "ตำบล", //グラフのタイトル
                    backgroundColor: ["#fe0000", "#00af50", "#febf00", "#599ad4"], //グラフの背景色
                    data: [DISTRICTYala_percent, DISTRICTPat_percent, DISTRICTNara_percent, DISTRICTOther_percent, ] //データ
                }]
            },

            options: { //グラフのオプション
                maintainAspectRatio: false, //CSSで大きさを調整するため、自動縮小をさせない
                cutoutPercentage: 55, //中央からの空円の太さ。グラフの太さ変更
                legend: {
                    display: true //グラフの説明を表示
                },
                tooltips: { //グラフへカーソルを合わせた際の詳細表示の設定
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.labels[tooltipItem.index] + ": " + data.datasets[0].data[tooltipItem.index] + "%"; //%を最後につける
                        }
                    },
                },
                title: { //上部タイトル表示の設定
                    // display: true,
                    // fontSize:10,
                    // text: 'เปอร์เซ็น ：100%'
                },
            }
        });
    }
});

//=========== หมู่บ้าน ============//
$('#chartMubaan').on('inview', function(event, isInView) { //画面上に入ったらグラフを描画
    if (isInView) {

        var ctx = document.getElementById("chartMubaan"); //グラフを描画したい場所のid
        var MooSum = $("#MooSum").attr("value");
        var MooYala = $("#MooYala").attr("value");
        var MooNara = $("#MooNara").attr("value");
        var MooPat = $("#MooPat").attr("value");
        var MooOther = $("#MooOther").attr("value");
        var MooYala_percent = (MooYala * 100 / MooSum).toFixed(2);
        var MooNara_percent = (MooNara * 100 / MooSum).toFixed(2);
        var MooPat_percent = (MooPat * 100 / MooSum).toFixed(2);
        var MooOther_percent = (MooOther * 100 / MooSum).toFixed(2);
        var chart = new Chart(ctx, {
            type: 'doughnut', //グラフのタイプ
            data: { //グラフのデータ
                labels: ["ยะลา (" + MooYala + " หมู่บ้าน)", "ปัตตานี (" + MooPat + " หมู่บ้าน)", "นราธิวาส (" + MooNara + " หมู่บ้าน)", "จังหวัดอื่น ๆ (" + MooOther + " หมู่บ้าน)", ], //データの名前
                datasets: [{
                    label: "หมู่บ้าน", //グラフのタイトル
                    backgroundColor: ["#fe0000", "#00af50", "#febf00", "#599ad4"], //グラフの背景色
                    data: [MooYala_percent, MooNara_percent, MooPat_percent, MooOther_percent, ] //データ
                }]
            },

            options: { //グラフのオプション
                maintainAspectRatio: false, //CSSで大きさを調整するため、自動縮小をさせない
                cutoutPercentage: 55, //中央からの空円の太さ。グラフの太さ変更
                legend: {
                    display: true //グラフの説明を表示
                },
                tooltips: { //グラフへカーソルを合わせた際の詳細表示の設定
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.labels[tooltipItem.index] + ": " + data.datasets[0].data[tooltipItem.index] + "%"; //%を最後につける
                        }
                    },
                },
                title: { //上部タイトル表示の設定
                    // display: true,
                    // fontSize:10,
                    // text: 'เปอร์เซ็น ：100%'
                },
            }
        });
    }
});



// -------------------------------
//値をグラフに表示させる
Chart.plugins.register({
    afterDatasetsDraw: function(chart, easing) {
        var ctx = chart.ctx;

        chart.data.datasets.forEach(function(dataset, i) {
            var meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function(element, index) {

                    ctx.fillStyle = 'rgb(0, 0, 0,0.8)';
                    var fontSize = 12;
                    var fontStyle = 'normal';
                    var fontFamily = 'Arial';
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                    var dataString = dataset.data[index].toString();


                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';

                    var padding = 5;
                    var position = element.tooltipPosition();
                    ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);

                });
            }
        });
    }
});



$('#chartMember').on('inview', function(event, isInView) {
    if (isInView) {

        var ctx = document.getElementById("chartMember");
        var MemberSum = $("#MemberSum").attr("value");
        var MemberYala = $("#MemberYala").attr("value");
        var MemberNara = $("#MemberNara").attr("value");
        var MemberPat = $("#MemberPat").attr("value");
        var MemberOther = $("#MemberOther").attr("value");
        var MemberYala_percent = (MemberYala * 100 / MemberSum).toFixed(2);
        var MemberNara_percent = (MemberNara * 100 / MemberSum).toFixed(2);
        var MemberPat_percent = (MemberPat * 100 / MemberSum).toFixed(2);
        var MemberOther_percent = (MemberOther * 100 / MemberSum).toFixed(2);
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["ยะลา (" + MemberYala + " คน)", "ปัตตานี (" + MemberPat + " คน)", "นราธิวาส (" + MemberNara + " คน)", "จังหวัดอื่น ๆ (" + MemberOther + " คน)", ], //データの名前
                datasets: [{
                    label: "สมาชิก",
                    backgroundColor: ["#fe0000", "#00af50", "#febf00", "#599ad4"],
                    data: [MemberYala_percent, MemberPat_percent, MemberNara_percent, MemberOther_percent, ] //データ
                }]
            },

            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.labels[tooltipItem.index] + ": " + data.datasets[0].data[tooltipItem.index] + "%";
                        }
                    },
                },
                title: {
                    // display: true,
                    // fontSize:10,
                    // text: '単位：%'
                },
            }
        });

    }
});

// ---------------------------

$('#chartHousehold').on('inview', function(event, isInView) {
    if (isInView) {

        var ctx = document.getElementById("chartHousehold");
        var householdSum = $("#householdSum").attr("value");
        var householdYala = $("#householdYala").attr("value");
        var householdNara = $("#householdNara").attr("value");
        var householdPat = $("#householdPat").attr("value");
        var householdOther = $("#householdOther").attr("value");
        var householdYala_percent = (householdYala * 100 / householdSum).toFixed(2);
        var householdNara_percent = (householdNara * 100 / householdSum).toFixed(2);
        var householdPat_percent = (householdPat * 100 / householdSum).toFixed(2);
        var householdOther_percent = (householdOther * 100 / householdSum).toFixed(2);
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["ยะลา (" + householdYala + " ครัวเรือน)", "ปัตตานี (" + householdPat + " ครัวเรือน)", "นราธิวาส (" + householdNara + " ครัวเรือน)", "จังหวัดอื่น ๆ (" + householdOther + " ครัวเรือน)", ], //データの名前
                datasets: [{
                    label: "สมาชิก",
                    backgroundColor: ["#fe0000", "#00af50", "#febf00", "#599ad4"],
                    data: [householdYala_percent, householdPat_percent, householdNara_percent, householdOther_percent, ] //データ
                }]
            },

            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.labels[tooltipItem.index] + ": " + data.datasets[0].data[tooltipItem.index] + "%";
                        }
                    },
                },
                title: {
                    // display: true,
                    // fontSize:10,
                    // text: '単位：%'
                },
            }
        });

    }
});
// -------------------------