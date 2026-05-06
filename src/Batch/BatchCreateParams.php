<?php

declare(strict_types=1);

namespace OursPrivacy\Batch;

use OursPrivacy\Batch\BatchCreateParams\Event;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * Send multiple `/track`-shaped events in a single request. The top-level token is authorized once for the full batch. Each batch row must include `distinctId`, and mixed validation or queue outcomes are reported per row.
 *
 * @see OursPrivacy\Services\BatchService::create()
 *
 * @phpstan-import-type EventShape from \OursPrivacy\Batch\BatchCreateParams\Event
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   token: string, events: list<Event|EventShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The token for your Source. You can find this in the dashboard.
     */
    #[Required]
    public string $token;

    /**
     * A list of `/track`-shaped events to validate and enqueue together.
     *
     * @var list<Event> $events
     */
    #[Required(list: Event::class)]
    public array $events;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(token: ..., events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withToken(...)->withEvents(...)
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
     * @param list<Event|EventShape> $events
     */
    public static function with(string $token, array $events): self
    {
        $self = new self;

        $self['token'] = $token;
        $self['events'] = $events;

        return $self;
    }

    /**
     * The token for your Source. You can find this in the dashboard.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * A list of `/track`-shaped events to validate and enqueue together.
     *
     * @param list<Event|EventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }
}
