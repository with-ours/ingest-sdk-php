<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Experiments\ExperimentAssignmentParams\Context;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse;
use OursPrivacy\RequestOptions;

/**
 * @phpstan-import-type ContextShape from \OursPrivacy\Experiments\ExperimentAssignmentParams\Context
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface ExperimentsContract
{
    /**
     * @api
     *
     * @param string $experimentKey The experiment's stable key. Surfaced in the dashboard under each experiment's setup tab.
     * @param string $token The experiment token (`exp_*`) for the experiment settings holding this experiment. Available from the dashboard.
     * @param string $visitorID stable identifier for the visitor — typically the Ours visitor id from your browser cookie, or your own server-side user id if you keep the same id consistent across browser and server
     * @param Context|ContextShape|null $context Optional page context for URL + query-param eligibility. Variant bucketing is deterministic on `visitor_id` regardless of context.
     * @param bool|null $trackImpression When true (default), an `$experiment_impression` event is enqueued and the visitor's `experiment_assignments` map is updated. Set to false to read the assignment without recording an impression — useful for in-test diagnostics.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function assignment(
        string $experimentKey,
        string $token,
        string $visitorID,
        Context|array|null $context = null,
        ?bool $trackImpression = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1;

    /**
     * @api
     *
     * @param string $token the experiment token (`exp_*`)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function personalization(
        string $token,
        string $visitorID,
        RequestOptions|array|null $requestOptions = null,
    ): ExperimentPersonalizationResponse;
}
