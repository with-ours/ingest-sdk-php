<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization;

/**
 * @phpstan-import-type PersonalizationShape from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization
 *
 * @phpstan-type ExperimentPersonalizationResponseShape = array{
 *   personalizations: list<Personalization|PersonalizationShape>, success: bool
 * }
 */
final class ExperimentPersonalizationResponse implements BaseModel
{
    /** @use SdkModel<ExperimentPersonalizationResponseShape> */
    use SdkModel;

    /** @var list<Personalization> $personalizations */
    #[Required(list: Personalization::class)]
    public array $personalizations;

    #[Required]
    public bool $success;

    /**
     * `new ExperimentPersonalizationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExperimentPersonalizationResponse::with(personalizations: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExperimentPersonalizationResponse)
     *   ->withPersonalizations(...)
     *   ->withSuccess(...)
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
     * @param list<Personalization|PersonalizationShape> $personalizations
     */
    public static function with(array $personalizations, bool $success): self
    {
        $self = new self;

        $self['personalizations'] = $personalizations;
        $self['success'] = $success;

        return $self;
    }

    /**
     * @param list<Personalization|PersonalizationShape> $personalizations
     */
    public function withPersonalizations(array $personalizations): self
    {
        $self = clone $this;
        $self['personalizations'] = $personalizations;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
