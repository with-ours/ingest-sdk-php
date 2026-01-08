<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Visitor\VisitorUpsertParams;
use OursPrivacy\Visitor\VisitorUpsertResponse;

/**
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface VisitorRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VisitorUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VisitorUpsertResponse>
     *
     * @throws APIException
     */
    public function upsert(
        array|VisitorUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
