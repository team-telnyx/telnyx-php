<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type SettingsShape = array{
 *   idp_cert_fingerprint: string,
 *   idp_entity_id: string,
 *   idp_sso_target_url: string,
 *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Api]
    public string $idp_cert_fingerprint;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Api]
    public string $idp_entity_id;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Api]
    public string $idp_sso_target_url;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idp_cert_fingerprint_algorithm
     */
    #[Api(enum: IdpCertFingerprintAlgorithm::class, optional: true)]
    public ?string $idp_cert_fingerprint_algorithm;

    /**
     * `new Settings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Settings::with(
     *   idp_cert_fingerprint: ..., idp_entity_id: ..., idp_sso_target_url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Settings)
     *   ->withIdpCertFingerprint(...)
     *   ->withIdpEntityID(...)
     *   ->withIdpSSOTargetURL(...)
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
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idp_cert_fingerprint_algorithm
     */
    public static function with(
        string $idp_cert_fingerprint,
        string $idp_entity_id,
        string $idp_sso_target_url,
        IdpCertFingerprintAlgorithm|string|null $idp_cert_fingerprint_algorithm = null,
    ): self {
        $obj = new self;

        $obj['idp_cert_fingerprint'] = $idp_cert_fingerprint;
        $obj['idp_entity_id'] = $idp_entity_id;
        $obj['idp_sso_target_url'] = $idp_sso_target_url;

        null !== $idp_cert_fingerprint_algorithm && $obj['idp_cert_fingerprint_algorithm'] = $idp_cert_fingerprint_algorithm;

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
}
