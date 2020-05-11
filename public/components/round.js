"use strict";

app.component("round", {
    templateUrl: "public/components/round.html",
    controller: "roundController",
    bindings: {
        rounds: "<",
        maxPoints : "<"
    }
});

app.controller("roundController", function ($log, $http) {
});
