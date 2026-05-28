<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\Experiments\ExperimentAssignmentParams\Context;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\ExperimentsContract;

/**
 * @phpstan-import-type ContextShape from \OursPrivacy\Experiments\ExperimentAssignmentParams\Context
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class ExperimentsService implements ExperimentsContract
{
    /**
     * @api
     */
    public ExperimentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExperimentsRawService($client);
    }

    /**
     * @api
     *
     * Return the server-side variant assignment for a visitor in a single A/B or multivariate experiment, identified by its experiment key. Bucketing is deterministic on `visitor_id` and is sticky across calls. Tracking an impression is the default — pass `track_impression: false` to read without recording. The browser SDK and this endpoint converge on the same variant for the same visitor.
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
    ): UnionMember0|UnionMember1 {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'visitorID' => $visitorID,
                'context' => $context,
                'trackImpression' => $trackImpression,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->assignment($experimentKey, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the active personalization assignments for a visitor. Read-only and never records an impression. Personalizations are populated by the event-driven rule engine — until that ships, this endpoint returns an empty list for every visitor, which is the correct fail-closed behavior (no false positives).
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
    ): ExperimentPersonalizationResponse {
        $params = Util::removeNulls(['token' => $token, 'visitorID' => $visitorID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->personalization(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
