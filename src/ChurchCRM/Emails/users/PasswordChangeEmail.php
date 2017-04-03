<?php

namespace ChurchCRM\Emails;


class PasswordChangeEmail extends BaseUserEmail
{
    protected $password;

    public function __construct($user, $password) {
        $this->password = $password;
        parent::__construct($user);
    }

    protected function getSubSubject()
    {
        return gettext("Password Changed");
    }

    protected function buildMessageBody()
    {
        $msg = array();
        array_push($msg, gettext("We wanted to let you know that your ChurchCRM password was changed."));
        array_push($msg, "<a href='" . $this->getLink() . "'>" . gettext("Login"). "</a>");
        array_push($msg, gettext('Username') . ": " . $this->user->getUserName());
        array_push($msg, gettext('Password') . ": " . $this->password);
        return implode("<p/>", $msg);
    }
}
