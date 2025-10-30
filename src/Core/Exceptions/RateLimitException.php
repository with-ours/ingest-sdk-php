<?php

namespace OursPrivacy\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Rate Limit Exception';
}
