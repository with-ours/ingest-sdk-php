<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments\ExperimentAssignmentResponse;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember0Shape = array{
 *   experimentID: string,
 *   inExperiment: bool,
 *   success: bool,
 *   variantID: string,
 *   experimentKey?: string|null,
 *   experimentName?: string|null,
 *   isControl?: bool|null,
 *   redirect?: string|null,
 *   type?: string|null,
 *   variantName?: string|null,
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
    use SdkModel;

    #[Required('experiment_id')]
    public string $experimentID;

    #[Required('in_experiment')]
    public bool $inExperiment;

    #[Required]
    public bool $success;

    #[Required('variant_id')]
    public string $variantID;

    #[Optional('experiment_key', nullable: true)]
    public ?string $experimentKey;

    #[Optional('experiment_name', nullable: true)]
    public ?string $experimentName;

    #[Optional('is_control', nullable: true)]
    public ?bool $isControl;

    /**
     * Redirect destination for redirect (split-URL) variants — a same-domain relative path or an absolute https:// URL. Present only when the assigned variant is a redirect; absent for on-page (DOM-modification) variants. Read it straight off the payload and issue the redirect server-side.
     */
    #[Optional(nullable: true)]
    public ?string $redirect;

    #[Optional(nullable: true)]
    public ?string $type;

    #[Optional('variant_name', nullable: true)]
    public ?string $variantName;

    /**
     * `new UnionMember0()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember0::with(
     *   experimentID: ..., inExperiment: ..., success: ..., variantID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember0)
     *   ->withExperimentID(...)
     *   ->withInExperiment(...)
     *   ->withSuccess(...)
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
        string $experimentID,
        bool $inExperiment,
        bool $success,
        string $variantID,
        ?string $experimentKey = null,
        ?string $experimentName = null,
        ?bool $isControl = null,
        ?string $redirect = null,
        ?string $type = null,
        ?string $variantName = null,
    ): self {
        $self = new self;

        $self['experimentID'] = $experimentID;
        $self['inExperiment'] = $inExperiment;
        $self['success'] = $success;
        $self['variantID'] = $variantID;

        null !== $experimentKey && $self['experimentKey'] = $experimentKey;
        null !== $experimentName && $self['experimentName'] = $experimentName;
        null !== $isControl && $self['isControl'] = $isControl;
        null !== $redirect && $self['redirect'] = $redirect;
        null !== $type && $self['type'] = $type;
        null !== $variantName && $self['variantName'] = $variantName;

        return $self;
    }

    public function withExperimentID(string $experimentID): self
    {
        $self = clone $this;
        $self['experimentID'] = $experimentID;

        return $self;
    }

    public function withInExperiment(bool $inExperiment): self
    {
        $self = clone $this;
        $self['inExperiment'] = $inExperiment;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

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

    public function withIsControl(?bool $isControl): self
    {
        $self = clone $this;
        $self['isControl'] = $isControl;

        return $self;
    }

    /**
     * Redirect destination for redirect (split-URL) variants — a same-domain relative path or an absolute https:// URL. Present only when the assigned variant is a redirect; absent for on-page (DOM-modification) variants. Read it straight off the payload and issue the redirect server-side.
     */
    public function withRedirect(?string $redirect): self
    {
        $self = clone $this;
        $self['redirect'] = $redirect;

        return $self;
    }

    public function withType(?string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withVariantName(?string $variantName): self
    {
        $self = clone $this;
        $self['variantName'] = $variantName;

        return $self;
    }
}
