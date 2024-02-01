'use strict'

app.controller("infoController", function ($scope, $window, infoService) {
    $scope.getAmphures = function (province_id) {
        infoService.getAmphures({
            province_id: province_id
        }).then(function (res) {
            $scope.amphures = res;
        });
    }

    $scope.getDistricts = function (amphure_id) {
        infoService.getDistricts({
            amphure_id: amphure_id
        }).then(function (res) {
            $scope.districts = res;
        });
    }
});