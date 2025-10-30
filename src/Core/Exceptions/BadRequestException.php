<?php

namespace OursPrivacy\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Bad Request Exception';
}
