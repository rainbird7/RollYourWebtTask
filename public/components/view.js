"use strict";

app.component("view", {
    templateUrl: "src/components/view.html",
    controller: "viewController",
    bindings: {
    }
});

app.controller("viewController", function ($log, $http, GetDataService, PassDataService,$timeout) {

    this.show = true;
    this.addRounds = true;
    this.count = 0;
    this.addition = 0;

    this.save = () => {
        $http.post('index.php', {
            player_name: this.name,
            score: this.score,
            hole_name: this.hole_name,
            hole_number: this.hole_number,
            par_score: this.par_score
        });

        this.score = "";
        this.hole_name = "";
        this.hole_number = "";
        this.par_score = "";

        $timeout(() => {this.load()}, 500);
        this.addRounds = false;
    }

    this.load = () => {
        GetDataService
            .loadRounds()
            .then(rounds => {
                this.rounds = rounds.data;
                $log.debug("test", this.rounds);
                this.rounds.map(round => {
                    this.count = parseInt(round.stableford_points, 10);
                })
                this.addition += this.count;
            });
    }

    this.navigateBack = () => {
        this.show = true;
        this.addRounds = true;
        this.name = "";
        this.score = "";
        this.hole_name = "";
        this.hole_number = "";
        this.par_score = "";
        this.holes_amount = "";
        this.addition = 0;
        PassDataService.deleteDB();
    }

    this.startRound = () => {
        this.show = false;
    }
});
