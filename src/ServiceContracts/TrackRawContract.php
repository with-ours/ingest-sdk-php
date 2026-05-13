<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventResponse;

/**
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface TrackRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TrackEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackEventResponse>
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
