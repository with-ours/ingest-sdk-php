<?php

namespace OursPrivacy\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Unprocessable Entity Exception';
}
