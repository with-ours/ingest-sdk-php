<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Visitor\VisitorUpsertParams;
use OursPrivacy\Visitor\VisitorUpsertResponse;

interface VisitorRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VisitorUpsertParams $params
     *
     * @return BaseResponse<VisitorUpsertResponse>
     *
     * @throws APIException
     */
    public function upsert(
        array|VisitorUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
