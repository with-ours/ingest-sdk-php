<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor\VisitorUpsertParams;

use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * Deprecated and ignored. Accepted so existing clients keep working.
 *
 * @deprecated
 *
 * @phpstan-type IdentityContextShape = array{ip: string, userAgent: string}
 */
final class IdentityContext implements BaseModel
{
    /** @use SdkModel<IdentityContextShape> */
    use SdkModel;

    /**
     * The end-user IP address (not the server IP).
     */
    #[Required]
    public string $ip;

    /**
     * The end-user User-Agent string (not the server UA).
     */
    #[Required]
    public string $userAgent;

    /**
     * `new IdentityContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IdentityContext::with(ip: ..., userAgent: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IdentityContext)->withIP(...)->withUserAgent(...)
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
    public static function with(string $ip, string $userAgent): self
    {
        $self = new self;

        $self['ip'] = $ip;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The end-user IP address (not the server IP).
     */
    public function withIP(string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    /**
     * The end-user User-Agent string (not the server UA).
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }
}
