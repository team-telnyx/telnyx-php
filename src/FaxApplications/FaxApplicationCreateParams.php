<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FaxApplicationCreateParams); // set properties as needed
 * $client->faxApplications->create(...$params->toArray());
 * ```
 * Creates a new Fax Application based on the parameters sent in the request. The application name and webhook URL are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->faxApplications->create(...$params->toArray());`
 *
 * @see Telnyx\FaxApplications->create
 *
 * @phpstan-type fax_application_create_params = array{
 *   applicationName: string,
 *   webhookEventURL: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   inbound?: Inbound,
 *   outbound?: Outbound,
 *   tags?: list<string>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class FaxApplicationCreateParams implements BaseModel
{
    /** @use SdkModel<fax_application_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Api('application_name')]
    public string $applicationName;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_url')]
    public string $webhookEventURL;

    /**
     * Specifies whether the connection can be used.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Api('anchorsite_override', enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsiteOverride;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    #[Api(optional: true)]
    public ?Outbound $outbound;

    /**
     * Tags associated with the Fax Application.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_failover_url', nullable: true, optional: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api('webhook_timeout_secs', nullable: true, optional: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new FaxApplicationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaxApplicationCreateParams::with(applicationName: ..., webhookEventURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FaxApplicationCreateParams)
     *   ->withApplicationName(...)
     *   ->withWebhookEventURL(...)
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     * @param list<string> $tags
     */
    public static function with(
        string $applicationName,
        string $webhookEventURL,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?Inbound $inbound = null,
        ?Outbound $outbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj->applicationName = $applicationName;
        $obj->webhookEventURL = $webhookEventURL;

        null !== $active && $obj->active = $active;
        null !== $anchorsiteOverride && $obj->anchorsiteOverride = $anchorsiteOverride instanceof AnchorsiteOverride ? $anchorsiteOverride->value : $anchorsiteOverride;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $tags && $obj->tags = $tags;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj->applicationName = $applicationName;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhookEventURL = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     */
    public function withAnchorsiteOverride(
        AnchorsiteOverride|string $anchorsiteOverride
    ): self {
        $obj = clone $this;
        $obj->anchorsiteOverride = $anchorsiteOverride instanceof AnchorsiteOverride ? $anchorsiteOverride->value : $anchorsiteOverride;

        return $obj;
    }

    public function withInbound(Inbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

        return $obj;
    }

    public function withOutbound(Outbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * Tags associated with the Fax Application.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhookEventFailoverURL = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }
}
