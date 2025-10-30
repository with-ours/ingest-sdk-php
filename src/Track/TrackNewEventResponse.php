<?php

declare(strict_types=1);

namespace OursPrivacy\Track;

use OursPrivacy\Core\Attributes\Api;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkResponse;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TrackNewEventResponseShape = array{success: bool}
 */
final class TrackNewEventResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TrackNewEventResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public bool $success;

    /**
     * `new TrackNewEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackNewEventResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackNewEventResponse)->withSuccess(...)
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

        $obj->success = $success;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
