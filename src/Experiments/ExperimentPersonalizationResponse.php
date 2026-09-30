<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\MapOf;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization;
use OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property;

/**
 * @phpstan-import-type PropertyVariants from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property
 * @phpstan-import-type PropertyShape from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Property
 * @phpstan-import-type PersonalizationShape from \OursPrivacy\Experiments\ExperimentPersonalizationResponse\Personalization
 *
 * @phpstan-type ExperimentPersonalizationResponseShape = array{
 *   properties: array<string,PropertyShape|null>,
 *   success: bool,
 *   personalizations?: list<Personalization|PersonalizationShape>|null,
 * }
 */
final class ExperimentPersonalizationResponse implements BaseModel
{
    /** @use SdkModel<ExperimentPersonalizationResponseShape> */
    use SdkModel;

    /**
     * The visitor traits accumulated by your personalization property rules, keyed by property key. Values are always scalars — a string, number, or boolean, or null when the captured field was itself empty. Empty for a visitor who has not matched any rule yet. These same values are delivered to the visitor's browser and are readable by anyone who knows the visitor_id, so never accumulate secrets, credentials, PHI, or confidential data into a property.
     *
     * @var array<string,PropertyVariants|null> $properties
     */
    #[Required(type: new MapOf(Property::class, nullable: true))]
    public array $properties;

    #[Required]
    public bool $success;

    /**
     * @deprecated
     *
     * Deprecated legacy personalization assignments. Current API responses omit this field; use properties for accumulated personalization traits. Retained in the SDK for callers using older responses.
     *
     * @var list<Personalization>|null $personalizations
     */
    #[Optional(list: Personalization::class)]
    public ?array $personalizations;

    /**
     * `new ExperimentPersonalizationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExperimentPersonalizationResponse::with(properties: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExperimentPersonalizationResponse)->withProperties(...)->withSuccess(...)
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
     * @param array<string,PropertyShape|null> $properties
     * @param list<Personalization|PersonalizationShape>|null $personalizations
     */
    public static function with(
        array $properties,
        bool $success,
        ?array $personalizations = null
    ): self {
        $self = new self;

        $self['properties'] = $properties;
        $self['success'] = $success;

        null !== $personalizations && $self['personalizations'] = $personalizations;

        return $self;
    }

    /**
     * The visitor traits accumulated by your personalization property rules, keyed by property key. Values are always scalars — a string, number, or boolean, or null when the captured field was itself empty. Empty for a visitor who has not matched any rule yet. These same values are delivered to the visitor's browser and are readable by anyone who knows the visitor_id, so never accumulate secrets, credentials, PHI, or confidential data into a property.
     *
     * @param array<string,PropertyShape|null> $properties
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

    /**
     * Deprecated legacy personalization assignments. Current API responses omit this field; use properties for accumulated personalization traits. Retained in the SDK for callers using older responses.
     *
     * @param list<Personalization|PersonalizationShape> $personalizations
     */
    public function withPersonalizations(array $personalizations): self
    {
        $self = clone $this;
        $self['personalizations'] = $personalizations;

        return $self;
    }
}
