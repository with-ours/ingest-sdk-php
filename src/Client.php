<?php

declare(strict_types=1);

namespace OursPrivacy;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use OursPrivacy\Core\BaseClient;
use OursPrivacy\Core\Util;
use OursPrivacy\Services\TrackService;
use OursPrivacy\Services\VisitorService;

/**
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
class Client extends BaseClient
{
    public bool $baseUrlOverridden;

    /**
     * @api
     */
    public TrackService $track;

    /**
     * @api
     */
    public VisitorService $visitor;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null
    ) {
        $this->baseUrlOverridden = !is_null($baseUrl);

        $baseUrl ??= Util::getenv(
            'OURS_PRIVACY_BASE_URL'
        ) ?: 'https://api.oursprivacy.com/api/v1';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        /** @var array<string, string|null> $headers */
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => sprintf('ours-privacy/PHP %s', VERSION),
            'X-Stainless-Lang' => 'php',
            'X-Stainless-Package-Version' => '1.3.1',
            'X-Stainless-Arch' => Util::machtype(),
            'X-Stainless-OS' => Util::ostype(),
            'X-Stainless-Runtime' => php_sapi_name(),
            'X-Stainless-Runtime-Version' => phpversion(),
        ];

        $customHeadersEnv = Util::getenv('OURS_PRIVACY_CUSTOM_HEADERS');
        if (null !== $customHeadersEnv) {
            foreach (explode("\n", $customHeadersEnv) as $line) {
                $colon = strpos($line, ':');
                if (false !== $colon) {
                    $headers[trim(substr($line, 0, $colon))] = trim(substr($line, $colon + 1));
                }
            }
        }

        parent::__construct(
            headers: $headers,
            baseUrl: $baseUrl,
            options: $options
        );

        $this->track = new TrackService($this);
        $this->visitor = new VisitorService($this);
    }
}
