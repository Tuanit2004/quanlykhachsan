<?php
namespace App\Models;
class Date {

    public $start_date = null;
    public $end_date = null;

    public function __construct($date) {
        if ($date) {
            $this->start_date = $date['start_date'];
            $this->end_date = $date->end_date;
        }
    }

    public function addDate($std, $end) {
        $this->start_date = $std;
        $this->end_date = $end;
    }

    public function updateStart($std) {
        $this->start_date = $std;
    }

    public function updateEnd($std) {
        $this->end_date = $std;
    }
}
