<?php

class CalendarInvite{
    
    private $interviewTime;
    private $startDateAndTime;
    private $endDateAndTime;
    private $organiserName;
    private $organiserEmail;
    private $location;
    private $subject;
    private $body;
    private $attendee;
    
    public function getInterviewTime() {
        return $this->interviewTime;
    }

    public function getStartDateAndTime() {
        return $this->startDateAndTime;
    }

    public function getEndDateAndTime() {
        return $this->endDateAndTime;
    }

    public function getOrganiserName() {
        return $this->organiserName;
    }

    public function getOrganiserEmail() {
        return $this->organiserEmail;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getBody() {
        return $this->body;
    }

    public function getAttendee() {
        return $this->attendee;
    }

    public function setInterviewTime($interviewTime) {
        $this->interviewTime = $interviewTime;
    }

    public function setStartDateAndTime($startDateAndTime) {
        $this->startDateAndTime = $startDateAndTime;
    }

    public function setEndDateAndTime($endDateAndTime) {
        $this->endDateAndTime = $endDateAndTime;
    }

    public function setOrganiserName($organiserName) {
        $this->organiserName = $organiserName;
    }

    public function setOrganiserEmail($organiserEmail) {
        $this->organiserEmail = $organiserEmail;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setAttendee($attendee) {
        $this->attendee = $attendee;
    }


}

