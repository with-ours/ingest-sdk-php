<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments\ExperimentAssignmentResponse;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember1Shape = array{inExperiment: bool, success: bool}
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    #[Required('in_experiment')]
    public bool $inExperiment;

    #[Required]
    public bool $success;

    /**
     * `new UnionMember1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember1::with(inExperiment: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember1)->withInExperiment(...)->withSuccess(...)
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
    public static function with(bool $inExperiment, bool $success): self
    {
        $self = new self;

        $self['inExperiment'] = $inExperiment;
        $self['success'] = $success;

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
}
