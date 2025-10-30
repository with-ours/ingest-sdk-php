<?php

namespace OursPrivacy\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Permission Denied Exception';
}
