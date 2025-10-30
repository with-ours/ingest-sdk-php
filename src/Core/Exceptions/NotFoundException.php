<?php

namespace OursPrivacy\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OursPrivacy Not Found Exception';
}
