<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders\Settings;

/**
 * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
 */
enum IdpCertFingerprintAlgorithm: string
{
    case SHA1 = 'sha1';

    case SHA256 = 'sha256';

    case SHA384 = 'sha384';

    case SHA512 = 'sha512';
}
