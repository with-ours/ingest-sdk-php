<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Experiments\ExperimentAssignmentParams;
use OursPrivacy\Experiments\ExperimentAssignmentParams\Context;
use OursPrivacy\Experiments\ExperimentAssignmentResponse;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1;
use OursPrivacy\Experiments\ExperimentPersonalizationParams;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\ExperimentsRawContract;

/**
 * @phpstan-import-type ContextShape from \OursPrivacy\Experiments\ExperimentAssignmentParams\Context
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class ExperimentsRawService implements ExperimentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the server-side variant assignment for a visitor in a single A/B or multivariate experiment, identified by its experiment key. Bucketing is deterministic on `visitor_id` and is sticky across calls. Tracking an impression is the default — pass `track_impression: false` to read without recording. The browser SDK and this endpoint converge on the same variant for the same visitor.
     *
     * @param string $experimentKey The experiment's stable key. Surfaced in the dashboard under each experiment's setup tab.
     * @param array{
     *   token: string,
     *   visitorID: string,
     *   context?: Context|ContextShape|null,
     *   trackImpression?: bool|null,
     * }|ExperimentAssignmentParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ExperimentAssignmentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this->client->baseUrlOverridden ? [
            'experiments/assignments/%1$s', $experimentKey,
        ] : [
            'https://api.oursprivacy.com/api/v1/experiments/assignments/%1$s',
            $experimentKey,
        ];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: ExperimentAssignmentResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the active personalization assignments for a visitor. Read-only and never records an impression. Personalizations are populated by the event-driven rule engine — until that ships, this endpoint returns an empty list for every visitor, which is the correct fail-closed behavior (no false positives).
     *
     * @param array{
     *   token: string, visitorID: string
     * }|ExperimentPersonalizationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExperimentPersonalizationResponse>
     *
     * @throws APIException
     */
    public function personalization(
        array|ExperimentPersonalizationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExperimentPersonalizationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'experiments/personalization' : 'https://api.oursprivacy.com/api/v1/experiments/personalization';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: ExperimentPersonalizationResponse::class,
        );
    }
}
