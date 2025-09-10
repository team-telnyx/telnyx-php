<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders\AuthenticationProvider;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type settings_alias = array{
 *   assertionConsumerServiceURL?: string|null,
 *   idpCertFingerprint?: string|null,
 *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   idpEntityID?: string|null,
 *   idpSSOTargetURL?: string|null,
 *   nameIdentifierFormat?: string|null,
 *   serviceProviderEntityID?: string|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<settings_alias> */
    use SdkModel;

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    #[Api('assertion_consumer_service_url', optional: true)]
    public ?string $assertionConsumerServiceURL;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Api('idp_cert_fingerprint', optional: true)]
    public ?string $idpCertFingerprint;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idpCertFingerprintAlgorithm
     */
    #[Api(
        'idp_cert_fingerprint_algorithm',
        enum: IdpCertFingerprintAlgorithm::class,
        optional: true,
    )]
    public ?string $idpCertFingerprintAlgorithm;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Api('idp_entity_id', optional: true)]
    public ?string $idpEntityID;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Api('idp_sso_target_url', optional: true)]
    public ?string $idpSSOTargetURL;

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    #[Api('name_identifier_format', optional: true)]
    public ?string $nameIdentifierFormat;

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    #[Api('service_provider_entity_id', optional: true)]
    public ?string $serviceProviderEntityID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public static function with(
        ?string $assertionConsumerServiceURL = null,
        ?string $idpCertFingerprint = null,
        IdpCertFingerprintAlgorithm|string|null $idpCertFingerprintAlgorithm = null,
        ?string $idpEntityID = null,
        ?string $idpSSOTargetURL = null,
        ?string $nameIdentifierFormat = null,
        ?string $serviceProviderEntityID = null,
    ): self {
        $obj = new self;

        null !== $assertionConsumerServiceURL && $obj->assertionConsumerServiceURL = $assertionConsumerServiceURL;
        null !== $idpCertFingerprint && $obj->idpCertFingerprint = $idpCertFingerprint;
        null !== $idpCertFingerprintAlgorithm && $obj->idpCertFingerprintAlgorithm = $idpCertFingerprintAlgorithm instanceof IdpCertFingerprintAlgorithm ? $idpCertFingerprintAlgorithm->value : $idpCertFingerprintAlgorithm;
        null !== $idpEntityID && $obj->idpEntityID = $idpEntityID;
        null !== $idpSSOTargetURL && $obj->idpSSOTargetURL = $idpSSOTargetURL;
        null !== $nameIdentifierFormat && $obj->nameIdentifierFormat = $nameIdentifierFormat;
        null !== $serviceProviderEntityID && $obj->serviceProviderEntityID = $serviceProviderEntityID;

        return $obj;
    }

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    public function withAssertionConsumerServiceURL(
        string $assertionConsumerServiceURL
    ): self {
        $obj = clone $this;
        $obj->assertionConsumerServiceURL = $assertionConsumerServiceURL;

        return $obj;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $obj = clone $this;
        $obj->idpCertFingerprint = $idpCertFingerprint;

        return $obj;
    }

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public function withIdpCertFingerprintAlgorithm(
        IdpCertFingerprintAlgorithm|string $idpCertFingerprintAlgorithm
    ): self {
        $obj = clone $this;
        $obj->idpCertFingerprintAlgorithm = $idpCertFingerprintAlgorithm instanceof IdpCertFingerprintAlgorithm ? $idpCertFingerprintAlgorithm->value : $idpCertFingerprintAlgorithm;

        return $obj;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $obj = clone $this;
        $obj->idpEntityID = $idpEntityID;

        return $obj;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $obj = clone $this;
        $obj->idpSSOTargetURL = $idpSSOTargetURL;

        return $obj;
    }

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    public function withNameIdentifierFormat(string $nameIdentifierFormat): self
    {
        $obj = clone $this;
        $obj->nameIdentifierFormat = $nameIdentifierFormat;

        return $obj;
    }

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    public function withServiceProviderEntityID(
        string $serviceProviderEntityID
    ): self {
        $obj = clone $this;
        $obj->serviceProviderEntityID = $serviceProviderEntityID;

        return $obj;
    }
}
