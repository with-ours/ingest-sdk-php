<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments\ExperimentPersonalizationResponse;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-type PersonalizationShape = array{
 *   assignedAt: float,
 *   experimentID: string,
 *   variantID: string,
 *   experimentKey?: string|null,
 *   experimentName?: string|null,
 *   variantName?: string|null,
 * }
 */
final class Personalization implements BaseModel
{
    /** @use SdkModel<PersonalizationShape> */
    use SdkModel;

    #[Required('assigned_at')]
    public float $assignedAt;

    #[Required('experiment_id')]
    public string $experimentID;

    #[Required('variant_id')]
    public string $variantID;

    #[Optional('experiment_key', nullable: true)]
    public ?string $experimentKey;

    #[Optional('experiment_name', nullable: true)]
    public ?string $experimentName;

    #[Optional('variant_name', nullable: true)]
    public ?string $variantName;

    /**
     * `new Personalization()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Personalization::with(assignedAt: ..., experimentID: ..., variantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Personalization)
     *   ->withAssignedAt(...)
     *   ->withExperimentID(...)
     *   ->withVariantID(...)
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
    public static function with(
        float $assignedAt,
        string $experimentID,
        string $variantID,
        ?string $experimentKey = null,
        ?string $experimentName = null,
        ?string $variantName = null,
    ): self {
        $self = new self;

        $self['assignedAt'] = $assignedAt;
        $self['experimentID'] = $experimentID;
        $self['variantID'] = $variantID;

        null !== $experimentKey && $self['experimentKey'] = $experimentKey;
        null !== $experimentName && $self['experimentName'] = $experimentName;
        null !== $variantName && $self['variantName'] = $variantName;

        return $self;
    }

    public function withAssignedAt(float $assignedAt): self
    {
        $self = clone $this;
        $self['assignedAt'] = $assignedAt;

        return $self;
    }

    public function withExperimentID(string $experimentID): self
    {
        $self = clone $this;
        $self['experimentID'] = $experimentID;

        return $self;
    }

    public function withVariantID(string $variantID): self
    {
        $self = clone $this;
        $self['variantID'] = $variantID;

        return $self;
    }

    public function withExperimentKey(?string $experimentKey): self
    {
        $self = clone $this;
        $self['experimentKey'] = $experimentKey;

        return $self;
    }

    public function withExperimentName(?string $experimentName): self
    {
        $self = clone $this;
        $self['experimentName'] = $experimentName;

        return $self;
    }

    public function withVariantName(?string $variantName): self
    {
        $self = clone $this;
        $self['variantName'] = $variantName;

        return $self;
    }
}
