<?php

declare(strict_types=1);

namespace OursPrivacy\Track;

use OursPrivacy\Core\Attributes\Api;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkResponse;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TrackEventResponseShape = array{success: bool}
 */
final class TrackEventResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TrackEventResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public bool $success;

    /**
     * `new TrackEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackEventResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackEventResponse)->withSuccess(...)
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
        $obj = new self;

        $obj['success'] = $success;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
