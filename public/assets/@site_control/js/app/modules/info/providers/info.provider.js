'use strict'

app.service("infoService", function ($http, $log, BASE_URL) {

    this.getAmphures = function (data) {
        return $http({
            method: 'POST',
            url: BASE_URL + 'household/store/amphures',
            data: data,
            dataType: 'json',
        }).then(function (response) {
            return response.data;
        }).catch(function (error) {
            $log.error('ERROR:', error);
            throw error;
        });
    }

    this.getDistricts = function (data) {
        return $http({
            method: 'POST',
            url: BASE_URL + 'household/store/districts',
            data: data,
            dataType: 'json',
        }).then(function (response) {
            return response.data;
        }).catch(function (error) {
            $log.error('ERROR:', error);
            throw error;
        });
    }
});