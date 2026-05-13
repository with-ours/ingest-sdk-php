<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-type VisitorUpsertResponseShape = array{success: bool}
 */
final class VisitorUpsertResponse implements BaseModel
{
    /** @use SdkModel<VisitorUpsertResponseShape> */
    use SdkModel;

    #[Required]
    public bool $success;

    /**
     * `new VisitorUpsertResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VisitorUpsertResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VisitorUpsertResponse)->withSuccess(...)
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
    public static function with(bool $success): self
    {
        $self = new self;

        $self['success'] = $success;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
