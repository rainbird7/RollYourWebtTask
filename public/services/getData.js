"use strict";

app.service("GetDataService", function($log, $http){
    $log.debug("GetDataService()");

    this.loadRounds = () => {
        return $http
            .get(`getRounds.php`);
    };

});