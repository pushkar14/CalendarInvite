<?php

class CalendarInviteManager{
    
    private $calendarInvite;
    
    public function __construct(){
        $this->calendarInvite = new CalendarInvite();
    }
    
    public function setInterviewTime($interviewTime) {
        $this->calendarInvite->setInterviewTime($interviewTime);
    }

    public function setStartDateAndTime($startDateAndTime) {
        $this->calendarInvite->setStartDateAndTime($startDateAndTime);
    }

    public function setEndDateAndTime($endDateAndTime) {
        $this->calendarInvite->setEndDateAndTime($endDateAndTime);
    }

    public function setOrganiserName($organiserName) {
        $this->calendarInvite->setOrganiserName($organiserName);
    }

    public function setOrganiserEmail($organiserEmail) {
        $this->calendarInvite->setOrganiserEmail($organiserEmail);
    }

    public function setLocation($location) {
        $this->calendarInvite->setLocation($location);
    }

    public function setSubject($subject) {
        $this->calendarInvite->setSubject($subject);
    }

    public function setBody($body) {
        $this->calendarInvite->setBody($body);
    }

    public function setAttendee($attendeeName,$attendeeEmail) {
        $attendee = $this->calendarInvite->getAttendee();
        $attendee[] = array('name'=>$attendeeName,'email'=>$attendeeEmail);
        $this->calendarInvite->setAttendee($attendee);
    }
    
    public function getCalendarInviteAttachment() {
        
        $CalendarInviteAttachment = new CalendarInviteAttachment();
        $CalendarInviteAttachment->setFileName($this->calendarInvite->getFileName());
        
        $date = $this->calendarInvite->getInterviewTime();
        $date = $date->format('Ymd');
        $startTime = $this->calendarInvite->getStartDateAndTime();
        $endTime = $this->calendarInvite->getEndDateAndTime();
        $organizer = $this->calendarInvite->getOrganiserName();
        $organizer_email = $this->calendarInvite->getOrganiserEmail();;
        $location = $this->calendarInvite->getLocation();
        $subject = $this->calendarInvite->getSubject();
        $body = $this->calendarInvite->getBody();
        $attendees = $this->calendarInvite->getAttendees();
        $message = "BEGIN:VCALENDAR
            
PRODID:-//Yahoo//Calendar//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:REQUEST
BEGIN:VTIMEZONE
TZID:India Standard Time
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:+0530
TZOFFSETTO:+0530
END:STANDARD
BEGIN:DAYLIGHT
DTSTART:16010101T000000
TZOFFSETFROM:+0530
TZOFFSETTO:+0530
END:DAYLIGHT
END:VTIMEZONE
BEGIN:VEVENT
UID:" . md5(uniqid(mt_rand(), true)) . "@Service Provider
DTSTAMP:" . date('Ymd') . 'T' . date('His') . "
DTSTART;TZID=India Standard Time:" . $startTime->format('Ymd') . "T" . $startTime->format('His') . "
DTEND;TZID=India Standard Time:" . $endTime->format('Ymd') . "T" . $endTime->format('His') . "
SUMMARY:" . $subject . "
ORGANIZER;CN=" . $organizer . ":mailto:" . $organizer_email . "
LOCATION:" . $location . "
DESCRIPTION:" . $body . "\n";
        foreach ($attendees as $attendee) {
            $message.="ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN=" . $attendee['name'] . ";X-NUM-GUESTS=0:MAILTO:" . $attendee['email'] . "\n";
        }
        $message = $message . "END:VEVENT
END:VCALENDAR";
        
        $CalendarInviteAttachment->setMessageBody($message);
        return $CalendarInviteAttachment;
    }

}
