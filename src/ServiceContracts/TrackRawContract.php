<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventResponse;

interface TrackRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TrackEventParams $params
     *
     * @return BaseResponse<TrackEventResponse>
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
