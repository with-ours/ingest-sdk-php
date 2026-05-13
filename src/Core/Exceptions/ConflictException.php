<?php

namespace OursPrivacy\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Conflict Exception';
}
