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

        $baseUrl ??= getenv(
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

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('ours-privacy/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.8.2',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->track = new TrackService($this);
        $this->visitor = new VisitorService($this);
    }
}
