<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventResponse;

interface TrackContract
{
    /**
     * @api
     *
     * @param array<mixed>|TrackEventParams $params
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        ?RequestOptions $requestOptions = null
    ): TrackEventResponse;
}
