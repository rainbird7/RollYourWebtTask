"use strict";

app.component("round", {
    templateUrl: "src/components/round.html",
    controller: "roundController",
    bindings: {
        rounds: "<",
        maxPoints : "<"
    }
});

app.controller("roundController", function ($log, $http) {
});
