<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property;

/**
 * @phpstan-import-type PropertyVariants from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property
 * @phpstan-import-type PersonalizationShape from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization
 * @phpstan-import-type PropertyShape from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property
 *
 * @phpstan-type ExperimentPersonalizationResponseShape = array{
 *   personalizations: list<Personalization|PersonalizationShape>,
 *   properties: array<string,PropertyShape>,
 *   success: bool,
 * }
 */
final class ExperimentPersonalizationResponse implements BaseModel
{
    /** @use SdkModel<ExperimentPersonalizationResponseShape> */
    use SdkModel;

    /** @var list<Personalization> $personalizations */
    #[Required(list: Personalization::class)]
    public array $personalizations;

    /**
     * The visitor traits accumulated by your personalization property rules, keyed by property key. Values are always scalars — a string, number, or boolean, or null when the captured field was itself empty. Empty for a visitor who has not matched any rule yet. These same values are delivered to the visitor's browser and are readable by anyone who knows the visitor_id, so never accumulate secrets, credentials, PHI, or confidential data into a property.
     *
     * @var array<string,PropertyVariants> $properties
     */
    #[Required(map: Property::class)]
    public array $properties;

    #[Required]
    public bool $success;

    /**
     * `new ExperimentPersonalizationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExperimentPersonalizationResponse::with(
     *   personalizations: ..., properties: ..., success: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExperimentPersonalizationResponse)
     *   ->withPersonalizations(...)
     *   ->withProperties(...)
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
     * @param array<string,PropertyShape> $properties
     */
    public static function with(
        array $personalizations,
        array $properties,
        bool $success
    ): self {
        $self = new self;

        $self['personalizations'] = $personalizations;
        $self['properties'] = $properties;
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

    /**
     * The visitor traits accumulated by your personalization property rules, keyed by property key. Values are always scalars — a string, number, or boolean, or null when the captured field was itself empty. Empty for a visitor who has not matched any rule yet. These same values are delivered to the visitor's browser and are readable by anyone who knows the visitor_id, so never accumulate secrets, credentials, PHI, or confidential data into a property.
     *
     * @param array<string,PropertyShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
