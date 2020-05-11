"use strict";

app.service("PassDataService", function($log, $http){
    $log.debug("GetDataService()");

    this.deleteDB = () => {
        return $http.post('deleteDB.php', {
            delete: true
        });
    }

});