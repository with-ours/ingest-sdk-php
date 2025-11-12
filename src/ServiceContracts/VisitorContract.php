<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Visitor\VisitorUpsertParams;
use OursPrivacy\Visitor\VisitorUpsertResponse;

interface VisitorContract
{
    /**
     * @api
     *
     * @param array<mixed>|VisitorUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        array|VisitorUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): VisitorUpsertResponse;
}
