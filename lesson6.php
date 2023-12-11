<?php
    CLASS ME {
        FUNCTION Behaivour() {
            $kind = false;
            $humour = false;
            $tidy = true;

            IF($kind == true) {
                echo "He was raised to become a good child";
            } else {
                IF($humour == true) {
                    echo "Atleast he has a great sense of humour";
                } else {
                    IF($tidy == true) {
                        echo "Atleast he is tidy and neat to his work";
                    } else {
                        echo "Your a waste piece of trash";
                    }
                }
            }
        }
        FUNCTION Appearance() {
            $face = false;
            $body = false;

            IF($face == true) {
                echo "He is handsome-ma";
            } else {
                IF($body == true) {
                    echo "Was he hot or sexy?"
                } else {
                    echo "Ah~ wasteland";
                }
            }
        }
        FUNCTION Mentallity() {
            $depressed = 1;
            $moral = 0;
        }
    }

    $ME = new ME();
    $ME->Appearance();
    $ME->Behaivour();
?>