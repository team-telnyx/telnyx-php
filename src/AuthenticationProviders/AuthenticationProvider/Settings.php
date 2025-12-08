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
 *   assertion_consumer_service_url?: string|null,
 *   idp_cert_fingerprint?: string|null,
 *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   idp_entity_id?: string|null,
 *   idp_sso_target_url?: string|null,
 *   name_identifier_format?: string|null,
 *   service_provider_entity_id?: string|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    #[Optional]
    public ?string $assertion_consumer_service_url;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Optional]
    public ?string $idp_cert_fingerprint;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idp_cert_fingerprint_algorithm
     */
    #[Optional(enum: IdpCertFingerprintAlgorithm::class)]
    public ?string $idp_cert_fingerprint_algorithm;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Optional]
    public ?string $idp_entity_id;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Optional]
    public ?string $idp_sso_target_url;

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    #[Optional]
    public ?string $name_identifier_format;

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    #[Optional]
    public ?string $service_provider_entity_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idp_cert_fingerprint_algorithm
     */
    public static function with(
        ?string $assertion_consumer_service_url = null,
        ?string $idp_cert_fingerprint = null,
        IdpCertFingerprintAlgorithm|string|null $idp_cert_fingerprint_algorithm = null,
        ?string $idp_entity_id = null,
        ?string $idp_sso_target_url = null,
        ?string $name_identifier_format = null,
        ?string $service_provider_entity_id = null,
    ): self {
        $obj = new self;

        null !== $assertion_consumer_service_url && $obj['assertion_consumer_service_url'] = $assertion_consumer_service_url;
        null !== $idp_cert_fingerprint && $obj['idp_cert_fingerprint'] = $idp_cert_fingerprint;
        null !== $idp_cert_fingerprint_algorithm && $obj['idp_cert_fingerprint_algorithm'] = $idp_cert_fingerprint_algorithm;
        null !== $idp_entity_id && $obj['idp_entity_id'] = $idp_entity_id;
        null !== $idp_sso_target_url && $obj['idp_sso_target_url'] = $idp_sso_target_url;
        null !== $name_identifier_format && $obj['name_identifier_format'] = $name_identifier_format;
        null !== $service_provider_entity_id && $obj['service_provider_entity_id'] = $service_provider_entity_id;

        return $obj;
    }

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    public function withAssertionConsumerServiceURL(
        string $assertionConsumerServiceURL
    ): self {
        $obj = clone $this;
        $obj['assertion_consumer_service_url'] = $assertionConsumerServiceURL;

        return $obj;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $obj = clone $this;
        $obj['idp_cert_fingerprint'] = $idpCertFingerprint;

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
        $obj['idp_cert_fingerprint_algorithm'] = $idpCertFingerprintAlgorithm;

        return $obj;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $obj = clone $this;
        $obj['idp_entity_id'] = $idpEntityID;

        return $obj;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $obj = clone $this;
        $obj['idp_sso_target_url'] = $idpSSOTargetURL;

        return $obj;
    }

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    public function withNameIdentifierFormat(string $nameIdentifierFormat): self
    {
        $obj = clone $this;
        $obj['name_identifier_format'] = $nameIdentifierFormat;

        return $obj;
    }

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    public function withServiceProviderEntityID(
        string $serviceProviderEntityID
    ): self {
        $obj = clone $this;
        $obj['service_provider_entity_id'] = $serviceProviderEntityID;

        return $obj;
    }
}
