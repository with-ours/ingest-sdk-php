<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchNewResponse\Result\UnionMember1;

enum Code: string
{
    case INVALID_EVENT = 'invalid_event';

    case QUEUE_FAILED = 'queue_failed';
}
