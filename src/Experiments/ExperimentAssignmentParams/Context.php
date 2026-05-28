<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments\ExperimentAssignmentParams;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * Optional page context for URL + query-param eligibility. Variant bucketing is deterministic on `visitor_id` regardless of context.
 *
 * @phpstan-type ContextShape = array{search?: string|null, url?: string|null}
 */
final class Context implements BaseModel
{
    /** @use SdkModel<ContextShape> */
    use SdkModel;

    /**
     * The current query string (e.g. `?utm_source=meta`). When provided, the experiment's query-param conditions are evaluated for eligibility. If omitted, the query string is parsed from `url`.
     */
    #[Optional(nullable: true)]
    public ?string $search;

    /**
     * The current page URL. When provided, the experiment's URL patterns are evaluated for eligibility — visitors on non-matching URLs are returned `in_experiment: false`. Omit when the caller is pre-gating the request.
     */
    #[Optional(nullable: true)]
    public ?string $url;

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
        ?string $search = null,
        ?string $url = null
    ): self {
        $self = new self;

        null !== $search && $self['search'] = $search;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The current query string (e.g. `?utm_source=meta`). When provided, the experiment's query-param conditions are evaluated for eligibility. If omitted, the query string is parsed from `url`.
     */
    public function withSearch(?string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }

    /**
     * The current page URL. When provided, the experiment's URL patterns are evaluated for eligibility — visitors on non-matching URLs are returned `in_experiment: false`. Omit when the caller is pre-gating the request.
     */
    public function withURL(?string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
