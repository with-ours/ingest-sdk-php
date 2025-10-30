<?php

namespace OursPrivacy\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Internal Server Exception';
}
