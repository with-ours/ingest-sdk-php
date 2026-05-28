<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * Return the active personalization assignments for a visitor. Read-only and never records an impression. Personalizations are populated by the event-driven rule engine — until that ships, this endpoint returns an empty list for every visitor, which is the correct fail-closed behavior (no false positives).
 *
 * @see OursPrivacy\Services\ExperimentsService::personalization()
 *
 * @phpstan-type ExperimentPersonalizationParamsShape = array{
 *   token: string, visitorID: string
 * }
 */
final class ExperimentPersonalizationParams implements BaseModel
{
    /** @use SdkModel<ExperimentPersonalizationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The experiment token (`exp_*`).
     */
    #[Required]
    public string $token;

    #[Required('visitor_id')]
    public string $visitorID;

    /**
     * `new ExperimentPersonalizationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExperimentPersonalizationParams::with(token: ..., visitorID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExperimentPersonalizationParams)->withToken(...)->withVisitorID(...)
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
     */
    public static function with(string $token, string $visitorID): self
    {
        $self = new self;

        $self['token'] = $token;
        $self['visitorID'] = $visitorID;

        return $self;
    }

    /**
     * The experiment token (`exp_*`).
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withVisitorID(string $visitorID): self
    {
        $self = clone $this;
        $self['visitorID'] = $visitorID;

        return $self;
    }
}
