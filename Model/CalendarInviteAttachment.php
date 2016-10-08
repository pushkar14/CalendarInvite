<?php

class CalendarInviteAttachment{
    
    private $messageBody;
    private $fileName;
    private $contentType = 'text/calendar';
    
    const FILE_EXTENSION = 'ics';
    
    function getMessageBody() {
        return $this->messageBody;
    }

    function getFileName() {
        return $this->fileName;
    }

    function getContentType() {
        return $this->contentType;
    }

    function setMessageBody($messageBody) {
        $this->messageBody = $messageBody;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName.FILE_EXTENSION;
    }

    function setContentType($contentType) {
        $this->contentType = $contentType;
    }


}
