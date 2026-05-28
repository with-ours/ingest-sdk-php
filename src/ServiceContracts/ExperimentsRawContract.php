<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Experiments\ExperimentAssignmentParams;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1;
use OursPrivacy\Experiments\ExperimentPersonalizationParams;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse;
use OursPrivacy\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface ExperimentsRawContract
{
    /**
     * @api
     *
     * @param string $experimentKey The experiment's stable key. Surfaced in the dashboard under each experiment's setup tab.
     * @param array<string,mixed>|ExperimentAssignmentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1>
     *
     * @throws APIException
     */
    public function assignment(
        string $experimentKey,
        array|ExperimentAssignmentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExperimentPersonalizationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExperimentPersonalizationResponse>
     *
     * @throws APIException
     */
    public function personalization(
        array|ExperimentPersonalizationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
