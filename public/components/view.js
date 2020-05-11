"use strict";

app.component("view", {
    templateUrl: "src/components/view.html",
    controller: "viewController",
    bindings: {}
});

app.controller("viewController", function ($log, $http, GetDataService) {

    this.show = true;
    this.addRounds = true;

    this.save = () => {
        $http.post('index.php', {
            player_name: this.name,
            hole_name: this.hole_name,
            hole_number: this.hole_number,
            par_score: this.par_score
        });

        $timeout(() => {
            this.load()
        }, 500);
        this.addRounds = false;
    }

    this.load = () => {
        GetDataService
            .loadRounds()
            .then(rounds => {
                this.rounds = rounds.data;
                $log.debug("test", this.rounds);
            });
    }

});
