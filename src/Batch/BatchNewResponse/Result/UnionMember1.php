<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchNewResponse\Result;

use OursPrivacy\Batch\BatchNewResponse\Result\UnionMember1\Code;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember1Shape = array{
 *   code: Code|value-of<Code>, index: int, message: string, success: bool
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    /** @var value-of<Code> $code */
    #[Required(enum: Code::class)]
    public string $code;

    #[Required]
    public int $index;

    #[Required]
    public string $message;

    #[Required]
    public bool $success;

    /**
     * `new UnionMember1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember1::with(code: ..., index: ..., message: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember1)
     *   ->withCode(...)
     *   ->withIndex(...)
     *   ->withMessage(...)
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
     * @param Code|value-of<Code> $code
     */
    public static function with(
        Code|string $code,
        int $index,
        string $message,
        bool $success
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['index'] = $index;
        $self['message'] = $message;
        $self['success'] = $success;

        return $self;
    }

    /**
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withIndex(int $index): self
    {
        $self = clone $this;
        $self['index'] = $index;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
