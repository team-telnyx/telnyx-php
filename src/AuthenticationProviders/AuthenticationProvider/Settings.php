<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders\AuthenticationProvider;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type SettingsShape = array{
 *   assertionConsumerServiceURL?: string|null,
 *   idpAttributeNames?: array<string,mixed>|null,
 *   idpCertFingerprint?: string|null,
 *   idpCertFingerprintAlgorithm?: null|IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm>,
 *   idpCertificate?: string|null,
 *   idpEntityID?: string|null,
 *   idpSloTargetURL?: string|null,
 *   idpSSOTargetURL?: string|null,
 *   nameIdentifierFormat?: string|null,
 *   provisionGroups?: bool|null,
 *   serviceProviderEntityID?: string|null,
 *   serviceProviderLoginURL?: string|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    #[Optional('assertion_consumer_service_url')]
    public ?string $assertionConsumerServiceURL;

    /**
     * Mapping of SAML attribute names used by the identity provider (IdP).
     *
     * @var array<string,mixed>|null $idpAttributeNames
     */
    #[Optional('idp_attribute_names', map: 'mixed')]
    public ?array $idpAttributeNames;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Optional('idp_cert_fingerprint')]
    public ?string $idpCertFingerprint;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idpCertFingerprintAlgorithm
     */
    #[Optional(
        'idp_cert_fingerprint_algorithm',
        enum: IdpCertFingerprintAlgorithm::class
    )]
    public ?string $idpCertFingerprintAlgorithm;

    /**
     * The full X.509 certificate for the identity provider (IdP).
     */
    #[Optional('idp_certificate')]
    public ?string $idpCertificate;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Optional('idp_entity_id')]
    public ?string $idpEntityID;

    /**
     * The Single Logout (SLO) target URL for the identity provider (IdP).
     */
    #[Optional('idp_slo_target_url')]
    public ?string $idpSloTargetURL;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Optional('idp_sso_target_url')]
    public ?string $idpSSOTargetURL;

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    #[Optional('name_identifier_format')]
    public ?string $nameIdentifierFormat;

    /**
     * Whether group provisioning is enabled for this authentication provider.
     */
    #[Optional('provision_groups')]
    public ?bool $provisionGroups;

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    #[Optional('service_provider_entity_id')]
    public ?string $serviceProviderEntityID;

    /**
     * The login URL for the service provider (Telnyx). Users navigate to this URL to initiate SSO login.
     */
    #[Optional('service_provider_login_url')]
    public ?string $serviceProviderLoginURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $idpAttributeNames
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm>|null $idpCertFingerprintAlgorithm
     */
    public static function with(
        ?string $assertionConsumerServiceURL = null,
        ?array $idpAttributeNames = null,
        ?string $idpCertFingerprint = null,
        IdpCertFingerprintAlgorithm|string|null $idpCertFingerprintAlgorithm = null,
        ?string $idpCertificate = null,
        ?string $idpEntityID = null,
        ?string $idpSloTargetURL = null,
        ?string $idpSSOTargetURL = null,
        ?string $nameIdentifierFormat = null,
        ?bool $provisionGroups = null,
        ?string $serviceProviderEntityID = null,
        ?string $serviceProviderLoginURL = null,
    ): self {
        $self = new self;

        null !== $assertionConsumerServiceURL && $self['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;
        null !== $idpAttributeNames && $self['idpAttributeNames'] = $idpAttributeNames;
        null !== $idpCertFingerprint && $self['idpCertFingerprint'] = $idpCertFingerprint;
        null !== $idpCertFingerprintAlgorithm && $self['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;
        null !== $idpCertificate && $self['idpCertificate'] = $idpCertificate;
        null !== $idpEntityID && $self['idpEntityID'] = $idpEntityID;
        null !== $idpSloTargetURL && $self['idpSloTargetURL'] = $idpSloTargetURL;
        null !== $idpSSOTargetURL && $self['idpSSOTargetURL'] = $idpSSOTargetURL;
        null !== $nameIdentifierFormat && $self['nameIdentifierFormat'] = $nameIdentifierFormat;
        null !== $provisionGroups && $self['provisionGroups'] = $provisionGroups;
        null !== $serviceProviderEntityID && $self['serviceProviderEntityID'] = $serviceProviderEntityID;
        null !== $serviceProviderLoginURL && $self['serviceProviderLoginURL'] = $serviceProviderLoginURL;

        return $self;
    }

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    public function withAssertionConsumerServiceURL(
        string $assertionConsumerServiceURL
    ): self {
        $self = clone $this;
        $self['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;

        return $self;
    }

    /**
     * Mapping of SAML attribute names used by the identity provider (IdP).
     *
     * @param array<string,mixed> $idpAttributeNames
     */
    public function withIdpAttributeNames(array $idpAttributeNames): self
    {
        $self = clone $this;
        $self['idpAttributeNames'] = $idpAttributeNames;

        return $self;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $self = clone $this;
        $self['idpCertFingerprint'] = $idpCertFingerprint;

        return $self;
    }

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public function withIdpCertFingerprintAlgorithm(
        IdpCertFingerprintAlgorithm|string $idpCertFingerprintAlgorithm
    ): self {
        $self = clone $this;
        $self['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;

        return $self;
    }

    /**
     * The full X.509 certificate for the identity provider (IdP).
     */
    public function withIdpCertificate(string $idpCertificate): self
    {
        $self = clone $this;
        $self['idpCertificate'] = $idpCertificate;

        return $self;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $self = clone $this;
        $self['idpEntityID'] = $idpEntityID;

        return $self;
    }

    /**
     * The Single Logout (SLO) target URL for the identity provider (IdP).
     */
    public function withIdpSloTargetURL(string $idpSloTargetURL): self
    {
        $self = clone $this;
        $self['idpSloTargetURL'] = $idpSloTargetURL;

        return $self;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $self = clone $this;
        $self['idpSSOTargetURL'] = $idpSSOTargetURL;

        return $self;
    }

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    public function withNameIdentifierFormat(string $nameIdentifierFormat): self
    {
        $self = clone $this;
        $self['nameIdentifierFormat'] = $nameIdentifierFormat;

        return $self;
    }

    /**
     * Whether group provisioning is enabled for this authentication provider.
     */
    public function withProvisionGroups(bool $provisionGroups): self
    {
        $self = clone $this;
        $self['provisionGroups'] = $provisionGroups;

        return $self;
    }

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    public function withServiceProviderEntityID(
        string $serviceProviderEntityID
    ): self {
        $self = clone $this;
        $self['serviceProviderEntityID'] = $serviceProviderEntityID;

        return $self;
    }

    /**
     * The login URL for the service provider (Telnyx). Users navigate to this URL to initiate SSO login.
     */
    public function withServiceProviderLoginURL(
        string $serviceProviderLoginURL
    ): self {
        $self = clone $this;
        $self['serviceProviderLoginURL'] = $serviceProviderLoginURL;

        return $self;
    }
}
