<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\FqdnAuthentication;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\FqdnOutboundAuthentication;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\IPAuthenticationMethod;

/**
 * Updates the FQDN authentication strategy for a specific FQDN connection.
 *
 * @see Telnyx\Services\FqdnConnections\FqdnAuthenticationService::patchAll()
 *
 * @phpstan-type FqdnAuthenticationPatchAllParamsShape = array{
 *   failoverURL?: string|null,
 *   fqdnOutboundAuthentication?: null|FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication>,
 *   ipAuthenticationMethod?: null|IPAuthenticationMethod|value-of<IPAuthenticationMethod>,
 *   password?: string|null,
 *   txtName?: string|null,
 *   txtTtl?: int|null,
 *   txtValue?: string|null,
 *   userName?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class FqdnAuthenticationPatchAllParams implements BaseModel
{
    /** @use SdkModel<FqdnAuthenticationPatchAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The failover webhook URL.
     */
    #[Optional('failover_url')]
    public ?string $failoverURL;

    /**
     * The outbound authentication type.
     *
     * @var value-of<FqdnOutboundAuthentication>|null $fqdnOutboundAuthentication
     */
    #[Optional(
        'fqdn_outbound_authentication',
        enum: FqdnOutboundAuthentication::class
    )]
    public ?string $fqdnOutboundAuthentication;

    /**
     * The IP authentication method.
     *
     * @var value-of<IPAuthenticationMethod>|null $ipAuthenticationMethod
     */
    #[Optional('ip_authentication_method', enum: IPAuthenticationMethod::class)]
    public ?string $ipAuthenticationMethod;

    /**
     * The password for authentication.
     */
    #[Optional]
    public ?string $password;

    /**
     * The TXT record name for Microsoft Teams SBC DNS verification.
     */
    #[Optional('txt_name')]
    public ?string $txtName;

    /**
     * The TTL for the TXT record.
     */
    #[Optional('txt_ttl')]
    public ?int $txtTtl;

    /**
     * The TXT record value for Microsoft Teams SBC DNS verification.
     */
    #[Optional('txt_value')]
    public ?string $txtValue;

    /**
     * The username for authentication.
     */
    #[Optional('user_name')]
    public ?string $userName;

    /**
     * The webhook URL for authentication events.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication>|null $fqdnOutboundAuthentication
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod>|null $ipAuthenticationMethod
     */
    public static function with(
        ?string $failoverURL = null,
        FqdnOutboundAuthentication|string|null $fqdnOutboundAuthentication = null,
        IPAuthenticationMethod|string|null $ipAuthenticationMethod = null,
        ?string $password = null,
        ?string $txtName = null,
        ?int $txtTtl = null,
        ?string $txtValue = null,
        ?string $userName = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $failoverURL && $self['failoverURL'] = $failoverURL;
        null !== $fqdnOutboundAuthentication && $self['fqdnOutboundAuthentication'] = $fqdnOutboundAuthentication;
        null !== $ipAuthenticationMethod && $self['ipAuthenticationMethod'] = $ipAuthenticationMethod;
        null !== $password && $self['password'] = $password;
        null !== $txtName && $self['txtName'] = $txtName;
        null !== $txtTtl && $self['txtTtl'] = $txtTtl;
        null !== $txtValue && $self['txtValue'] = $txtValue;
        null !== $userName && $self['userName'] = $userName;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * The failover webhook URL.
     */
    public function withFailoverURL(string $failoverURL): self
    {
        $self = clone $this;
        $self['failoverURL'] = $failoverURL;

        return $self;
    }

    /**
     * The outbound authentication type.
     *
     * @param FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication> $fqdnOutboundAuthentication
     */
    public function withFqdnOutboundAuthentication(
        FqdnOutboundAuthentication|string $fqdnOutboundAuthentication
    ): self {
        $self = clone $this;
        $self['fqdnOutboundAuthentication'] = $fqdnOutboundAuthentication;

        return $self;
    }

    /**
     * The IP authentication method.
     *
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     */
    public function withIPAuthenticationMethod(
        IPAuthenticationMethod|string $ipAuthenticationMethod
    ): self {
        $self = clone $this;
        $self['ipAuthenticationMethod'] = $ipAuthenticationMethod;

        return $self;
    }

    /**
     * The password for authentication.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The TXT record name for Microsoft Teams SBC DNS verification.
     */
    public function withTxtName(string $txtName): self
    {
        $self = clone $this;
        $self['txtName'] = $txtName;

        return $self;
    }

    /**
     * The TTL for the TXT record.
     */
    public function withTxtTtl(int $txtTtl): self
    {
        $self = clone $this;
        $self['txtTtl'] = $txtTtl;

        return $self;
    }

    /**
     * The TXT record value for Microsoft Teams SBC DNS verification.
     */
    public function withTxtValue(string $txtValue): self
    {
        $self = clone $this;
        $self['txtValue'] = $txtValue;

        return $self;
    }

    /**
     * The username for authentication.
     */
    public function withUserName(string $userName): self
    {
        $self = clone $this;
        $self['userName'] = $userName;

        return $self;
    }

    /**
     * The webhook URL for authentication events.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
