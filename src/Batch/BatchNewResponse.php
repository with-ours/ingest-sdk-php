<?php

declare(strict_types=1);

namespace OursPrivacy\Batch;

use OursPrivacy\Batch\BatchNewResponse\Result;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ResultVariants from \OursPrivacy\Batch\BatchNewResponse\Result
 * @phpstan-import-type ResultShape from \OursPrivacy\Batch\BatchNewResponse\Result
 *
 * @phpstan-type BatchNewResponseShape = array{
 *   accepted: int, failed: int, results: list<ResultShape>, success: bool
 * }
 */
final class BatchNewResponse implements BaseModel
{
    /** @use SdkModel<BatchNewResponseShape> */
    use SdkModel;

    #[Required]
    public int $accepted;

    #[Required]
    public int $failed;

    /** @var list<ResultVariants> $results */
    #[Required(list: Result::class)]
    public array $results;

    #[Required]
    public bool $success;

    /**
     * `new BatchNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchNewResponse::with(accepted: ..., failed: ..., results: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchNewResponse)
     *   ->withAccepted(...)
     *   ->withFailed(...)
     *   ->withResults(...)
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
     * @param list<ResultShape> $results
     */
    public static function with(
        int $accepted,
        int $failed,
        array $results,
        bool $success
    ): self {
        $self = new self;

        $self['accepted'] = $accepted;
        $self['failed'] = $failed;
        $self['results'] = $results;
        $self['success'] = $success;

        return $self;
    }

    public function withAccepted(int $accepted): self
    {
        $self = clone $this;
        $self['accepted'] = $accepted;

        return $self;
    }

    public function withFailed(int $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }

    /**
     * @param list<ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
