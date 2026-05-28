<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Experiments\ExperimentAssignmentParams\Context;

/**
 * Return the server-side variant assignment for a visitor in a single A/B or multivariate experiment, identified by its experiment key. Bucketing is deterministic on `visitor_id` and is sticky across calls. Tracking an impression is the default — pass `track_impression: false` to read without recording. The browser SDK and this endpoint converge on the same variant for the same visitor.
 *
 * @see OursPrivacy\Services\ExperimentsService::assignment()
 *
 * @phpstan-import-type ContextShape from \OursPrivacy\Experiments\ExperimentAssignmentParams\Context
 *
 * @phpstan-type ExperimentAssignmentParamsShape = array{
 *   token: string,
 *   visitorID: string,
 *   context?: null|Context|ContextShape,
 *   trackImpression?: bool|null,
 * }
 */
final class ExperimentAssignmentParams implements BaseModel
{
    /** @use SdkModel<ExperimentAssignmentParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The experiment token (`exp_*`) for the experiment settings holding this experiment. Available from the dashboard.
     */
    #[Required]
    public string $token;

    /**
     * Stable identifier for the visitor — typically the Ours visitor id from your browser cookie, or your own server-side user id if you keep the same id consistent across browser and server.
     */
    #[Required('visitor_id')]
    public string $visitorID;

    /**
     * Optional page context for URL + query-param eligibility. Variant bucketing is deterministic on `visitor_id` regardless of context.
     */
    #[Optional(nullable: true)]
    public ?Context $context;

    /**
     * When true (default), an `$experiment_impression` event is enqueued and the visitor's `experiment_assignments` map is updated. Set to false to read the assignment without recording an impression — useful for in-test diagnostics.
     */
    #[Optional('track_impression', nullable: true)]
    public ?bool $trackImpression;

    /**
     * `new ExperimentAssignmentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExperimentAssignmentParams::with(token: ..., visitorID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExperimentAssignmentParams)->withToken(...)->withVisitorID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Context|ContextShape|null $context
     */
    public static function with(
        string $token,
        string $visitorID,
        Context|array|null $context = null,
        ?bool $trackImpression = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['visitorID'] = $visitorID;

        null !== $context && $self['context'] = $context;
        null !== $trackImpression && $self['trackImpression'] = $trackImpression;

        return $self;
    }

    /**
     * The experiment token (`exp_*`) for the experiment settings holding this experiment. Available from the dashboard.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * Stable identifier for the visitor — typically the Ours visitor id from your browser cookie, or your own server-side user id if you keep the same id consistent across browser and server.
     */
    public function withVisitorID(string $visitorID): self
    {
        $self = clone $this;
        $self['visitorID'] = $visitorID;

        return $self;
    }

    /**
     * Optional page context for URL + query-param eligibility. Variant bucketing is deterministic on `visitor_id` regardless of context.
     *
     * @param Context|ContextShape|null $context
     */
    public function withContext(Context|array|null $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * When true (default), an `$experiment_impression` event is enqueued and the visitor's `experiment_assignments` map is updated. Set to false to read the assignment without recording an impression — useful for in-test diagnostics.
     */
    public function withTrackImpression(?bool $trackImpression): self
    {
        $self = clone $this;
        $self['trackImpression'] = $trackImpression;

        return $self;
    }
}
